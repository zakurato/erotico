<?php

namespace App\Http\Controllers;

use App\Models\Categoria;
use App\Models\Cliente;
use App\Models\Color;
use App\Models\Compra;
use App\Models\Compra2;
use App\Models\Compras2s;
use App\Models\CreateSeccionProductoCategory;
use App\Models\Foto;
use App\Models\Producto;
use App\Models\Tamano;
use GuzzleHttp\Handler\Proxy;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Date;
use DateTime;
use Illuminate\Pagination\LengthAwarePaginator;
use Illuminate\Support\Facades\DB;

use function PHPUnit\Framework\isEmpty;
use function PHPUnit\Framework\returnSelf;

class HomeController extends Controller
{

    public function index(){
        return view("paginaPrincipal.index");
    }
    public function index2(Request $request){
        $productoTemporada = "";

        $productosTemporada = Producto::all();
        $existeProductoTemporadaTablaTemporada = 0;
        foreach($productosTemporada as $item){
            if($item->temporada == 1){
                $existeProductoTemporadaTablaTemporada = 1;
                break;
            }
        }

        if($existeProductoTemporadaTablaTemporada == 1){
            //el producto con temporada esta en la tabla de productos
            $productoTemporada = Producto::where([["temporada","=","1"]])->first();

        }else{
            //el producto con temporada esta en la tabla de fotos
            $fotoEncontrada = Foto::where("temporada", "=", "1")->first(["imagen", "color","idFK","tamaño"]);
            if($fotoEncontrada != ""){
                $fotoEncontradaSoloTamaño = Foto::where("idFK", "=", $fotoEncontrada->idFK)
            ->where("tamaño", "!=", "formImagenes")
            ->where("color", "=", $fotoEncontrada->color)
            ->first(["tamaño"]);
            
               
            $atributosProducto = Producto::where([["id", "=", $fotoEncontrada->idFK]])
            ->first(["nombre", "categoria", "precio", "descripcion","id"]);
                    
            $productoTemporada2 = [
                "id" => $atributosProducto->id,
                "imagen" => $fotoEncontrada->imagen,
                "nombre" => $atributosProducto->nombre,
                "categoria" => $atributosProducto->categoria,
                "color" => $fotoEncontrada->color,
                "tamaño" => $fotoEncontradaSoloTamaño->tamaño,
                "precio" => $atributosProducto->precio,
                "descripcion" => $atributosProducto->descripcion,
            ];
            
            $productoTemporada = json_decode(json_encode($productoTemporada2), false);
            }       
        }


        //return $request;
        if(Empty($request) || $request->txtBuscar == "" && $request->categoria == ""){
            $fechaActual = Date::now();
            $fechaObjeto = new DateTime($fechaActual);
            $fechaFormateada = $fechaObjeto->format('Y-m-d H:i:s');
            $clienteSession = Compra::where([["nombreClienteSession","=",session('nombre')]])->first();
            $top5IdProductosMasVendidos = Compras2s::select('idFKProducto')
            ->groupBy('idFKProducto')
            ->orderByDesc(DB::raw('COUNT(*)'))
            ->limit(5)
            ->pluck('idFKProducto');
            $top5ProductosMasActuales = Producto::orderByDesc('created_at')->limit(4)->get();

            $productosSeccionCategoria = CreateSeccionProductoCategory::all();
            

            if (isset($top5IdProductosMasVendidos[0]) && isset($top5IdProductosMasVendidos[1]) &&
                isset($top5IdProductosMasVendidos[2]) && isset($top5IdProductosMasVendidos[3])) {
                             
                $productosMasVendidos = Producto::whereIn('id', [
                                     $top5IdProductosMasVendidos[0],
                                     $top5IdProductosMasVendidos[1],
                                     $top5IdProductosMasVendidos[2],
                                     $top5IdProductosMasVendidos[3]
                                    ])->get();
                }else{
                    $productosMasVendidos = [];  // Inicializar como un array vacío
                }


        
            if($clienteSession == ""){
                //return "estoy aqui si no hay compras de esta session en la tabla de comppras";
                //return session("nombre");
                $existe = 0;
                $clientes = Cliente::all();
        
                foreach($clientes as $item){
                    if(session('nombre') == $item->nombre){
                        $existe = 1;
                        break;
                    }
                }
        
                if($existe == 0){
                    $cliente = new Cliente();
                    //return session('nombre');
                    $cliente->nombre = session('nombre');
                    $cliente->contadorCarrito = 0;
                    $cliente->save();
        
                    $contadorCarrito = Cliente::where("nombre",session('nombre'))->first();
                    $categorias = Categoria::all();
                    $productos = Producto::paginate(12);
                    $fotos = Foto::all();
                    $sessionCliente = session('nombre');

            
        
                    return view("paginaPrincipal.index2",compact("productos","categorias","contadorCarrito","fotos","sessionCliente","productosMasVendidos","productosSeccionCategoria","top5ProductosMasActuales","productoTemporada"));
                }else{
                    $sessionCliente = session('nombre');
                    $contadorCarrito = Cliente::where("nombre",session('nombre'))->first();
                    $categorias = Categoria::all();
                    $productos = Producto::paginate(12);
                    $fotos = Foto::all();
                    //return $productos;
                    return view("paginaPrincipal.index2",compact("productos","categorias","contadorCarrito","fotos","sessionCliente","productosMasVendidos","productosSeccionCategoria","top5ProductosMasActuales","productoTemporada"));
                }
            }else if($fechaFormateada >= $clienteSession->expiracion && session('nombre') == $clienteSession->nombreClienteSession){
                //return "estoy aqui para devolver los productos al inventario";
                //devolver los productos a la tabla de productos
                $clienteSession = Compra::where([["nombreClienteSession","=",session('nombre')]])->get();
                $productos2 = Producto::all();
                foreach($clienteSession as $item){
                    foreach($productos2 as $item2){
                        if($item->idFKProducto == $item2->id && $item->colorSeleccionado == $item2->color && $item->tamañoSeleccionado == $item2->tamaño && $item->nombreClienteSession == session("nombre")){
                            $item2->cantidad = $item2->cantidad + $item->cantidad;
                            $item2->save();
                            break;
                        }
                    }
                }
                //devolver los productos a la tabla de fotos
                $clienteSession = Compra::where([["nombreClienteSession","=",session('nombre')]])->get();
                $fotos2 = Foto::all();
                foreach($clienteSession as $item){
                    foreach($fotos2 as $item2){
                        if($item->idFKProducto == $item2->idFK && $item->colorSeleccionado == $item2->color && $item->tamañoSeleccionado == $item2->tamaño && $item->nombreClienteSession == session("nombre")){
                            $item2->cantidad = $item2->cantidad + $item->cantidad;
                            $item2->save();
                            break;
                        }
                    }
                }
    
    
    
    
                $clienteSession = Compra::where([["nombreClienteSession","=",session('nombre')]])->delete();
                //colocar de la tabla de clientes el contador carrito en 0 de la session que esta iniciada
                $clienteSession = Cliente::where([["nombre","=", session("nombre")]])->first();
                $clienteSession->contadorCarrito = 0;
                $clienteSession->save();
    
    
                    $sessionCliente = session('nombre');
                    $contadorCarrito = Cliente::where("nombre",session('nombre'))->first();
                    $categorias = Categoria::all();
                    $productos = Producto::paginate(12);
                    $fotos = Foto::all();
                return view("paginaPrincipal.index2",compact("productos","categorias","contadorCarrito","fotos","sessionCliente","productosMasVendidos","productosSeccionCategoria","top5ProductosMasActuales","productoTemporada"));
    
    
            }else{
                //return "estoy aqui si no hay compras de esta session en la tabla de comppras";
                //return session("nombre");
                $existe = 0;
                $clientes = Cliente::all();
        
                foreach($clientes as $item){
                    if(session('nombre') == $item->nombre){
                        $existe = 1;
                        break;
                    }
                }
        
                if($existe == 0){
                    $cliente = new Cliente();
                    //return session('nombre');
                    $cliente->nombre = session('nombre');
                    $cliente->contadorCarrito = 0;
                    $cliente->save();
        
                    $contadorCarrito = Cliente::where("nombre",session('nombre'))->first();
                    $categorias = Categoria::all();
                    $productos = Producto::paginate(12);
                    $fotos = Foto::all();
                    $sessionCliente = session('nombre');
        
        
                    return view("paginaPrincipal.index2",compact("productos","categorias","contadorCarrito","fotos","sessionCliente","productosMasVendidos","productosSeccionCategoria","top5ProductosMasActuales","productoTemporada"));
                }else{
                    $sessionCliente = session('nombre');
                    $contadorCarrito = Cliente::where("nombre",session('nombre'))->first();
                    $categorias = Categoria::all();
                    $productos = Producto::paginate(12);
                    $fotos = Foto::all();
                    return view("paginaPrincipal.index2",compact("productos","categorias","contadorCarrito","fotos","sessionCliente","productosMasVendidos","productosSeccionCategoria","top5ProductosMasActuales","productoTemporada"));
                }
            }
        }else{
            $productosSeccionCategoria = CreateSeccionProductoCategory::all();
            $fechaActual = Date::now();
            $fechaObjeto = new DateTime($fechaActual);
            $fechaFormateada = $fechaObjeto->format('Y-m-d H:i:s');
            $clienteSession = Compra::where([["nombreClienteSession","=",session('nombre')]])->first();
            $top5ProductosMasActuales = Producto::orderByDesc('created_at')->limit(4)->get();
            $top5IdProductosMasVendidos = Compras2s::select('idFKProducto')
            ->groupBy('idFKProducto')
            ->orderByDesc(DB::raw('COUNT(*)'))
            ->limit(5)
            ->pluck('idFKProducto');
            $productosMasVendidos = Producto::whereIn('id', 
                                [$top5IdProductosMasVendidos[0],
                                 $top5IdProductosMasVendidos[1],
                                 $top5IdProductosMasVendidos[2],
                                 $top5IdProductosMasVendidos[3],
                                 ]
                                 )
                                 ->get();
            
            if($clienteSession == ""){
                $existe = 0;
                $clientes = Cliente::all();
                foreach($clientes as $item){
                    if(session('nombre') == $item->nombre){
                        $existe = 1;
                        break;
                    }
                }
        
                if($existe == 0){
                    $cliente = new Cliente();
                    $cliente->nombre = session('nombre');
                    $cliente->contadorCarrito = 0;
                    $cliente->save();
        
                    $contadorCarrito = Cliente::where("nombre",session('nombre'))->first();
                    $categorias = Categoria::all();
                    //aqui
                    if($request->categoria != ""){
                        $productos = Producto::where([["categoria","=",$request->categoria]])->paginate(12);
                    }
                    if($request->txtBuscar != ""){
                        $productos2 = Producto::leftJoin('fotos', 'productos.id', '=', 'fotos.idFK')
                        ->where(function($query) use ($request) {
                            $query->where('productos.color', 'LIKE', '%' . $request->txtBuscar . '%')
                                ->orWhere('productos.tamaño', 'LIKE', '%' . $request->txtBuscar . '%');
                        })
                        ->orWhere(function($subquery) use ($request) {
                            $subquery->where('fotos.color', 'LIKE', '%' . $request->txtBuscar . '%')
                                ->where('fotos.tamaño', '!=', 'formImagenes');
                        })
                        ->orWhere(function($subquery) use ($request) {
                            $subquery->where('fotos.tamaño', 'LIKE', '%' . $request->txtBuscar . '%')
                                ->where('fotos.tamaño', '!=', 'formImagenes');
                        })
                        ->select('productos.*')
                        ->distinct() // Obtener resultados únicos
                        ->paginate(12);

                                            //para que no se repitan los productos
                    $productos = [];
                    foreach ($productos2 as $producto) {
                        $id = $producto->id;
                    
                        if (!array_key_exists($id, $productos)) {
                            $productos[$id] = $producto;
                        }
                    }
                    //paginacion de los productos
                    $productos = new \Illuminate\Pagination\LengthAwarePaginator(
                        collect(array_values($productos)),
                        count($productos),
                        12
                    );

                    }
                    $fotos = Foto::all();
                    $sessionCliente = session('nombre');
                    return view("paginaPrincipal.index2",compact("productos","categorias","contadorCarrito","fotos","sessionCliente","productosMasVendidos","productosSeccionCategoria","top5ProductosMasActuales","productoTemporada"));
                }else{
                    $sessionCliente = session('nombre');
                    $contadorCarrito = Cliente::where("nombre",session('nombre'))->first();
                    $categorias = Categoria::all();
                    //aqui
                    if($request->categoria != ""){
                        $productos = Producto::where([["categoria","=",$request->categoria]])->paginate(12);
                    }
                    if($request->txtBuscar != ""){
                        $productos2 = Producto::leftJoin('fotos', 'productos.id', '=', 'fotos.idFK')
                        ->where(function($query) use ($request) {
                            $query->where('productos.color', 'LIKE', '%' . $request->txtBuscar . '%')
                                ->orWhere('productos.tamaño', 'LIKE', '%' . $request->txtBuscar . '%')
                                ->orWhere('productos.nombre', 'LIKE', '%' . $request->txtBuscar . '%');
                        })
                        ->orWhere(function($subquery) use ($request) {
                            $subquery->where('fotos.color', 'LIKE', '%' . $request->txtBuscar . '%')
                                ->where('fotos.tamaño', '!=', 'formImagenes');
                        })
                        ->orWhere(function($subquery) use ($request) {
                            $subquery->where('fotos.tamaño', 'LIKE', '%' . $request->txtBuscar . '%')
                                ->where('fotos.tamaño', '!=', 'formImagenes');
                        })
                        ->select('productos.*')
                        ->distinct() // Obtener resultados únicos
                        ->paginate(12);

                                            //para que no se repitan los productos
                    $productos = [];
                    foreach ($productos2 as $producto) {
                        $id = $producto->id;
                    
                        if (!array_key_exists($id, $productos)) {
                            $productos[$id] = $producto;
                        }
                    }
                    //paginacion de los productos
                    $productos = new \Illuminate\Pagination\LengthAwarePaginator(
                        collect(array_values($productos)),
                        count($productos),
                        12
                    );

                    }
                    $fotos = Foto::all();
                    return view("paginaPrincipal.index2",compact("productos","categorias","contadorCarrito","fotos","sessionCliente","productosMasVendidos","productosSeccionCategoria","top5ProductosMasActuales","productoTemporada"));
                }
            }else if($fechaFormateada >= $clienteSession->expiracion && session('nombre') == $clienteSession->nombreClienteSession){
                
                $clienteSession = Compra::where([["nombreClienteSession","=",session('nombre')]])->get();
                $productos2 = Producto::all();
                foreach($clienteSession as $item){
                    foreach($productos2 as $item2){
                        if($item->idFKProducto == $item2->id && $item->colorSeleccionado == $item2->color && $item->tamañoSeleccionado == $item2->tamaño && $item->nombreClienteSession == session("nombre")){
                            $item2->cantidad = $item2->cantidad + $item->cantidad;
                            $item2->save();
                            break;
                        }
                    }
                }
                $clienteSession = Compra::where([["nombreClienteSession","=",session('nombre')]])->get();
                $fotos2 = Foto::all();
                foreach($clienteSession as $item){
                    foreach($fotos2 as $item2){
                        if($item->idFKProducto == $item2->idFK && $item->colorSeleccionado == $item2->color && $item->tamañoSeleccionado == $item2->tamaño && $item->nombreClienteSession == session("nombre")){
                            $item2->cantidad = $item2->cantidad + $item->cantidad;
                            $item2->save();
                            break;
                        }
                    }
                }
    
    
    
    
                $clienteSession = Compra::where([["nombreClienteSession","=",session('nombre')]])->delete();
                $clienteSession = Cliente::where([["nombre","=", session("nombre")]])->first();
                $clienteSession->contadorCarrito = 0;
                $clienteSession->save();
    
    
                    $sessionCliente = session('nombre');
                    $contadorCarrito = Cliente::where("nombre",session('nombre'))->first();
                    $categorias = Categoria::all();
                    //aqui
                    if($request->categoria != ""){
                        $productos = Producto::where([["categoria","=",$request->categoria]])->paginate(12);
                    }
                    if($request->txtBuscar != ""){
                        $productos2 = Producto::leftJoin('fotos', 'productos.id', '=', 'fotos.idFK')
                        ->where(function($query) use ($request) {
                            $query->where('productos.color', 'LIKE', '%' . $request->txtBuscar . '%')
                            ->orWhere('productos.tamaño', 'LIKE', '%' . $request->txtBuscar . '%')
                            ->orWhere('productos.nombre', 'LIKE', '%' . $request->txtBuscar . '%');
                        })
                        ->orWhere(function($subquery) use ($request) {
                            $subquery->where('fotos.color', 'LIKE', '%' . $request->txtBuscar . '%')
                                ->where('fotos.tamaño', '!=', 'formImagenes');
                        })
                        ->orWhere(function($subquery) use ($request) {
                            $subquery->where('fotos.tamaño', 'LIKE', '%' . $request->txtBuscar . '%')
                                ->where('fotos.tamaño', '!=', 'formImagenes');
                        })
                        ->select('productos.*')
                        ->distinct() // Obtener resultados únicos
                        ->paginate(12);

                                            //para que no se repitan los productos
                    $productos = [];
                    foreach ($productos2 as $producto) {
                        $id = $producto->id;
                    
                        if (!array_key_exists($id, $productos)) {
                            $productos[$id] = $producto;
                        }
                    }
                    //paginacion de los productos
                    $productos = new \Illuminate\Pagination\LengthAwarePaginator(
                        collect(array_values($productos)),
                        count($productos),
                        12
                    );

                    }
                    $fotos = Foto::all();
                return view("paginaPrincipal.index2",compact("productos","categorias","contadorCarrito","fotos","sessionCliente","productosMasVendidos","productosSeccionCategoria","top5ProductosMasActuales","productoTemporada"));
    
    
            }else{
                $existe = 0;
                $clientes = Cliente::all();
        
                foreach($clientes as $item){
                    if(session('nombre') == $item->nombre){
                        $existe = 1;
                        break;
                    }
                }
        
                if($existe == 0){
                    $cliente = new Cliente();
                    $cliente->nombre = session('nombre');
                    $cliente->contadorCarrito = 0;
                    $cliente->save();
        
                    $contadorCarrito = Cliente::where("nombre",session('nombre'))->first();
                    $categorias = Categoria::all();
                    //aqui
                    if($request->categoria != ""){
                        $productos = Producto::where([["categoria","=",$request->categoria]])->paginate(12);
                    }
                    if($request->txtBuscar != ""){
                        $productos2 = Producto::leftJoin('fotos', 'productos.id', '=', 'fotos.idFK')
                        ->where(function($query) use ($request) {
                            $query->where('productos.color', 'LIKE', '%' . $request->txtBuscar . '%')
                            ->orWhere('productos.tamaño', 'LIKE', '%' . $request->txtBuscar . '%')
                            ->orWhere('productos.nombre', 'LIKE', '%' . $request->txtBuscar . '%');
                        })
                        ->orWhere(function($subquery) use ($request) {
                            $subquery->where('fotos.color', 'LIKE', '%' . $request->txtBuscar . '%')
                                ->where('fotos.tamaño', '!=', 'formImagenes');
                        })
                        ->orWhere(function($subquery) use ($request) {
                            $subquery->where('fotos.tamaño', 'LIKE', '%' . $request->txtBuscar . '%')
                                ->where('fotos.tamaño', '!=', 'formImagenes');
                        })
                        ->select('productos.*')
                        ->distinct() // Obtener resultados únicos
                        ->paginate(12);

                                            //para que no se repitan los productos
                    $productos = [];
                    foreach ($productos2 as $producto) {
                        $id = $producto->id;
                    
                        if (!array_key_exists($id, $productos)) {
                            $productos[$id] = $producto;
                        }
                    }
                    //paginacion de los productos
                    $productos = new \Illuminate\Pagination\LengthAwarePaginator(
                        collect(array_values($productos)),
                        count($productos),
                        12
                    );

                    }
                    $fotos = Foto::all();
                    $sessionCliente = session('nombre');
        
        
                    return view("paginaPrincipal.index2",compact("productos","categorias","contadorCarrito","fotos","sessionCliente","productosMasVendidos","productosSeccionCategoria","top5ProductosMasActuales","productoTemporada"));
                }else{
                    $sessionCliente = session('nombre');
                    $contadorCarrito = Cliente::where("nombre",session('nombre'))->first();
                    $categorias = Categoria::all();
                    //aqui
                    if($request->categoria != ""){
                        $productos = Producto::where([["categoria","=",$request->categoria]])->paginate(12);
                    }
                    if($request->txtBuscar != ""){
                        $productos2 = Producto::leftJoin('fotos', 'productos.id', '=', 'fotos.idFK')
                        ->where(function($query) use ($request) {
                            $query->where('productos.color', 'LIKE', '%' . $request->txtBuscar . '%')
                            ->orWhere('productos.tamaño', 'LIKE', '%' . $request->txtBuscar . '%')
                            ->orWhere('productos.nombre', 'LIKE', '%' . $request->txtBuscar . '%');
                        })
                        ->orWhere(function($subquery) use ($request) {
                            $subquery->where('fotos.color', 'LIKE', '%' . $request->txtBuscar . '%')
                                ->where('fotos.tamaño', '!=', 'formImagenes');
                        })
                        ->orWhere(function($subquery) use ($request) {
                            $subquery->where('fotos.tamaño', 'LIKE', '%' . $request->txtBuscar . '%')
                                ->where('fotos.tamaño', '!=', 'formImagenes');
                        })
                        ->select('productos.*')
                        ->distinct() // Obtener resultados únicos
                        ->paginate(12);

                                            //para que no se repitan los productos
                    $productos = [];
                    foreach ($productos2 as $producto) {
                        $id = $producto->id;
                    
                        if (!array_key_exists($id, $productos)) {
                            $productos[$id] = $producto;
                        }
                    }
                    //paginacion de los productos
                    $productos = new \Illuminate\Pagination\LengthAwarePaginator(
                        collect(array_values($productos)),
                        count($productos),
                        12
                    );

                    }
                    $fotos = Foto::all();
                    return view("paginaPrincipal.index2",compact("productos","categorias","contadorCarrito","fotos","sessionCliente","productosMasVendidos","productosSeccionCategoria","top5ProductosMasActuales","productoTemporada"));
                }
            }
        }
        
    }

    public function formLogin(){
        return view("login.formLogin");
    }

    public function authLogin(Request $request){
        
        $request =  request()->only("email","password");
        if(Auth::attempt($request)){
            request()->session()->regenerate();
            //return "logeado correctamente";
            return redirect()->route("loginDentro");
        }else{
            session()->flash("errorLogueo","Correo o contraseña incorrecto");
            return redirect()->route("formLogin");
        }
    }

    public function loginDentro(){
        $productos = Producto::all();
        return view("login.loginDentro",compact("productos"));
    }
    public function logout()
    {
        Auth::logout();
        return redirect()->route('index2');
    }
    
    public function formCrearProducto(){
        $categorias = Categoria::all();
        $colores = Color::all();
        $tamaños = Tamano::all();
        return view("productos.formCrearProducto",compact("categorias","colores","tamaños"));
    }

    public function storeProducto(Request $request){
        // return "imagen","nombre","categoria","color,"tamaño","precio","cantidad","descripcion","temporada"}
        // database "imagen","nombre","categoria","color,"tamaño","precio","cantidad","descripcion","temporada"}

        $tamaño = $request->tamaño; // Valor original: "30mm"
        $tamaño = str_replace('mm', '', $tamaño); // Eliminar "mm"

        $imageName = time().'.'.$request->imagen->extension();  

        $request->imagen->move(public_path('imagesProductos'), $imageName);


        $producto = new Producto();

        $producto->imagen = $imageName;
        $producto->nombre = $request->nombre;
        $producto->categoria = $request->categoria;
        $producto->color = $request->color;
        $producto->tamaño = $request->tamaño;
        $producto->precio = $request->precio;
        $producto->cantidad = $request->cantidad;
        $producto->descripcion = $request->descripcion;
        $producto->temporada = 0;
        $producto->save();

        session()->flash("correcto","Producto creado correctamente");
        return redirect()->route("formCrearProducto");
    }

    public function eliminarProducto(Request $request){


        $ProductosEliminadosTablaFotos = Foto::where("idFK", $request->id)->get();
        //return $fotosEliminadas;
        foreach($ProductosEliminadosTablaFotos as $item){

            if($item->imagen == "formTamañosCantidades"){
                $id = $item->id;
                $delete=Foto::where('id',$id)->delete();
            }else{
                $fotoAEliminar = $item->imagen;//nombre de la imagen
                $id = $item->id;
                unlink(public_path('imagesProductos/'.$fotoAEliminar));
                $delete=Foto::where('id',$id)->delete();
            }
        }

        $imagenEliminar = Producto::find($request->id);
        $imagenEliminar = $imagenEliminar->imagen;
        
        unlink(public_path('imagesProductos/'.$imagenEliminar));
        $delete=Producto::where('id',$request->id)->delete();

        session()->flash("eliminarProducto","EL producto se elimino correctamente");
        return redirect()->route("loginDentro");
    }


    public function actualizarProducto(Request $request){

        $producto = Producto::where("id", $request->id)->first();
        $categorias = Categoria::all();
        $colores = Color::all();
        $tamaños = Tamano::all();
        $fotos = Foto::where("idFK",$request->id)->get();
        return view("productos.formActualizarProducto",compact("producto","categorias","colores","tamaños","fotos"));
    }

    public function storeActualizarProducto(Request $request){


        
    if(Empty($request->color)){
        $color = "NINGUNO";
    }else{
        $color = $request->color;
    }

    if(Empty($request->tamaño)){
        $tamaño = "NINGUNO";
    }else{
        $tamaño = $request->tamaño;
        $tamaño = str_replace('mm', '', $tamaño); // Eliminar "mm"
    }

         // Verifica si el check box esta marcado
    if ($request->has('temporada')) {
        $temporada = 1;

        
    } else {
        $temporada = 0;
    }

        $productos = Producto::all();
        $producto = Producto::where("id",$request->id)->first();
        
        foreach($productos as $item){
            $item->temporada = 0;
            $item->save();
        }
        $fotos = Foto::all();        
        foreach($fotos as $item){
            $item->temporada = 0;
            $item->save();
        }
        

        $producto->nombre = $request->nombre;
        $producto->categoria = $request->categoria;
        $producto->color = $color;
        $producto->tamaño = $tamaño;
        $producto->precio = $request->precio;
        $producto->cantidad =  $producto->cantidad + $request->cantidad;
        if($producto->cantidad < 0){
            $producto->cantidad = 0;
        }
        $producto->descripcion = $request->descripcion;
        $producto->temporada = $temporada;

        $producto->save();

        session()->flash("correctoActualizarProducto","El producto se actualizo correctamente");
        $productos = Producto::all();
        return redirect()->route("loginDentro");
    }

    public function formCrearCategoria(){
        $categorias = Categoria::all();
        return view("categorias.formCrearCategoria",compact("categorias"));
    }
    public function storeCategoria(Request $request){

        $existe = 0;
        $categorias = Categoria::all();
        foreach($categorias as $item){
            if($item->nombreCategoria == $request->nombreCategoria){
                $existe = 1;
                break;
            }
        }

        if($existe == 0){
            $categoria = new Categoria();
            $categoria->nombreCategoria = $request->nombreCategoria;
            $categoria->save();
            session()->flash("correctoCategoria","Categoria creada correctamente");
            return redirect()->route("formCrearCategoria");
        }else{
            session()->flash("errorCategoria","La categoria que intento crear ya existe");
            return redirect()->route("formCrearCategoria");
        }
    }

    public function eliminarCategoria(Request $request){
        $delete=Categoria::where('id',$request->id)->delete();
        session()->flash("eliminarCategoria","La categoria se elimino correctamente");
        return redirect()->route("formCrearCategoria");
    }
    public function actualizarCategoria(Request $request){
        $categoriaEditar = Categoria::where("id",$request->id)->first();
        
        return view("categorias.formEditarCategoria",compact("categoriaEditar"));
    }

    public function storeActualizarCategoria(Request $request){
        
        if($request->oldNombreCategoria == $request->nombreCategoria){
            session()->flash("actualizarCorrectoCategoria","La categoria se actualizo correctamente");
            return redirect()->route("formCrearCategoria");        
        }else{
            $existe = 0;
            $categorias = Categoria::all();

            foreach($categorias as $item){
                if($item->nombreCategoria == $request->nombreCategoria){
                    $existe = 1;
                    break;
                }
            }

            if($existe == 1){
                session()->flash("actualizarExisteCategoria","La categoria ya existe");
                return redirect()->route("formCrearCategoria");        
            }else{
                $categoria = Categoria::where("id", $request->id)->first();
                $categoria->nombreCategoria = $request->nombreCategoria;
                $categoria->save();
                session()->flash("correctoCategoria","Categoria editada correctamente");
                return redirect()->route("formCrearCategoria");
            }
        }
    }

    public function formCrearColores(){
        $colores = Color::all();
        return view("colores.formCrearColores",compact("colores"));
    }

    public function storeColores(Request $request){

        $existe = 0;
        $colores = Color::all();
        foreach($colores as $item){
            if($item->nombreColor == $request->nombreColor){
                $existe = 1;
                break;
            }
        }

        if($existe == 0){
            $color = new Color();
            $color->nombreColor = $request->nombreColor;
            $color->save();
            session()->flash("correctoColores","Color creado correctamente");
            return redirect()->route("formCrearColores");
        }else{
            session()->flash("errorColores","El color que intento crear ya existe");
            return redirect()->route("formCrearColores");
        }
    }
    public function eliminarColor(Request $request){
        $delete=Color::where('id',$request->id)->delete();
        session()->flash("eliminarColores","El color se elimino correctamente");
        return redirect()->route("formCrearColores");
    }

    public function actualizarColor(Request $request){
        $colorEditar = Color::where("id",$request->id)->first();
        
        return view("colores.formEditarColor",compact("colorEditar"));
    }

    public function storeActualizarColor(Request $request){
        
        if($request->oldNombreColor == $request->nombreColor){
            session()->flash("actualizarCorrectoColores","El color se actualizo correctamente");
            return redirect()->route("formCrearColores");        
        }else{
            $existe = 0;
            $colores = Color::all();

            foreach($colores as $item){
                if($item->nombreColor == $request->nombreColor){
                    $existe = 1;
                    break;
                }
            }

            if($existe == 1){
                session()->flash("actualizarExisteColores","El color ya existe");
                return redirect()->route("formCrearColores");        
            }else{
                $color = Color::where("id",$request->id)->first();
                $color->nombreColor = $request->nombreColor;
                $color->save();
                session()->flash("correctoColores","Color editado correctamente");
                return redirect()->route("formCrearColores");
            }
        }
    }

//--------------------Tamaños------------------------------------------------------------------------------
    public function formCrearTamaños(){
        $tamaños = Tamano::all();
        return view("tamaños.formCrearTamaños",compact("tamaños"));
    }

    public function storeTamaños(Request $request){
        $existe = 0;
        $tamaños = Tamano::all();
        foreach($tamaños as $item){
            if($item->tamaño == $request->tamaño){
                $existe = 1;
                break;
            }
        }

        if($existe == 0){
            $tamaño = new Tamano();
            $tamaño->tamaño = $request->tamaño;
            $tamaño->save();
            session()->flash("correctoTamaños","Tamaño creado correctamente");
            return redirect()->route("formCrearTamaños");
        }else{
            session()->flash("errorTamaños","El tamaño que intento crear ya existe");
            return redirect()->route("formCrearTamaños");
        }
    }

    public function eliminarTamaño(Request $request){
        $delete=Tamano::where('id',$request->id)->delete();
        session()->flash("eliminarTamaños","El tamaño se elimino correctamente");
        return redirect()->route("formCrearTamaños");
    }
    public function actualizarTamaño(Request $request){
        $tamañoEditar = Tamano::where("id",$request->id)->first();
        
        return view("tamaños.formEditarTamaño",compact("tamañoEditar"));
    }

    public function storeActualizarTamaño(Request $request){
        
        if($request->oldTamaño == $request->tamaño){
            session()->flash("actualizarCorrectoTamaños","El tamaño se actualizo correctamente");
            return redirect()->route("formCrearTamaños");        
        }else{
            $existe = 0;
            $tamaños = Tamano::all();

            foreach($tamaños as $item){
                if($item->tamaño == $request->tamaño){
                    $existe = 1;
                    break;
                }
            }

            if($existe == 1){
                session()->flash("actualizarExisteTamaños","El tamaño ya existe");
                return redirect()->route("formCrearTamaños");        
            }else{
                $tamaño = Tamano::where("id",$request->id)->first();
                $tamaño->tamaño = $request->tamaño;
                $tamaño->save();
                session()->flash("correctoTamaños","tamaño editado correctamente");
                return redirect()->route("formCrearTamaños");
            }
        }
    }

    public function formAñadirImagenes(Request $request){
        $producto = Producto::where("id",$request->id)->first();
        $colores = Color::all();
        $tamaños = Tamano::all();
        return view("productos.formAñadirImagenes",compact("producto","colores","tamaños"));
    }
    public function colorSeleccionado(Request $request){

        //return $request;

            $existeColorTablaProducto = 0;
            $productos = Producto::all();

            foreach($productos as $item){
                if($item->id == $request->id && $item->color == $request->color){
                    $existeColorTablaProducto = 1;
                    break;
                }
            }

            if($existeColorTablaProducto == 1){
                //redireccionar a la vista donde solo va estar para agregar imagenes o solo agregar tamaños y cantidades
                    $color = $request->color;
                    $producto = Producto::where("id",$request->id)->first();
                    $colores = Color::all();
                    $tamaños = Tamano::all();
                    $fotos = Foto::all();
                    $fotoColor = Foto::where([["color", $request->color],["idFK","=",$producto->id]])->first();
                    return view("productos.formAñadirImagenes3",compact("producto","colores","tamaños","color","fotos","fotoColor"));
            }else{
                $existeColorTablafotos = 0;
                $fotos = Foto::all();
    
                foreach($fotos as $item){
                    if($item->idFK == $request->id && $item->color == $request->color){
                        $existeColorTablafotos = 1;
                        break;
                    }
                }

                if($existeColorTablafotos == 1){
                    //redireccionar a la vista donde solo va estar para agregar imagenes o solo agregar tamaños y cantidades
                    $color = $request->color;
                    $producto = Producto::where("id",$request->id)->first();
                    $colores = Color::all();
                    $tamaños = Tamano::all();
                    $fotos = Foto::all();
                    $fotoColor = Foto::where([["color", $request->color],["idFK","=",$producto->id]])->first();

                    return view("productos.formAñadirImagenes3",compact("producto","colores","tamaños","color","fotos","fotoColor"));
                }else{
                    //redireccionar a la vista donde se crea el producto en la parte de fotos osea uno nuevo
                    $color = $request->color;
                    $producto = Producto::where("id",$request->id)->first();
                    $colores = Color::all();
                    $tamaños = Tamano::all();

                    //este form es llenar un producto nuevo sin la categoria ni el nombre ni descripcion ya que lleva el idFK del producto
                    return view("productos.formAñadirImagenes2",compact("producto","colores","tamaños","color"));
                }

            }
    }

    public function storeProductoFotos(Request $request){//la primera vez que se guarda un color nuevo
       $contador = 0;

        foreach ($request->file('image') as $image) {

            if($contador == 0){//este contador es para que solo me guarde 1 vez el tamaño y la cantidad no importa las imagenes que metan
                // Genera un nombre único para cada imagen
                $imageName = uniqid().'.'.$image->extension();
                // Mueve la imagen a la carpeta "public/images"
                $image->move(public_path('imagesProductos'), $imageName);
            
                $nuevoProductoFotos = new Foto();
                $nuevoProductoFotos->imagen = $imageName;
                $nuevoProductoFotos->color = $request->color;
                $nuevoProductoFotos->tamaño = $request->tamaño;
                $nuevoProductoFotos->cantidad = $request->cantidad;
                $nuevoProductoFotos->idFK = $request->id;
                $nuevoProductoFotos->temporada = "0";
                $nuevoProductoFotos->save();
                $contador = 1;
                }else{
                    // Genera un nombre único para cada imagen
                    $imageName = uniqid().'.'.$image->extension();
                    // Mueve la imagen a la carpeta "public/images"
                    $image->move(public_path('imagesProductos'), $imageName);
                
                    $nuevoProductoFotos = new Foto();
                    $nuevoProductoFotos->imagen = $imageName;
                    $nuevoProductoFotos->color = $request->color;
                    $nuevoProductoFotos->tamaño = "formImagenes";
                    $nuevoProductoFotos->cantidad = "formImagenes";
                    $nuevoProductoFotos->idFK = $request->id;
                    $nuevoProductoFotos->temporada = "0";
                    $nuevoProductoFotos->save();
                }

        }
        session()->flash("productoCreadoCorrectamenteFotos","El producto se creo correctamente");

        $producto = Producto::where("id",$request->id)->first();
        return redirect()->route("formAñadirImagenes", ['id' => $request->id]);

    }

    public function storeProductoFotosImagenes(Request $request){//para guardar solo imagenes
        foreach ($request->file('image') as $image) {
            // Genera un nombre único para cada imagen
            $imageName = uniqid().'.'.$image->extension();
            // Mueve la imagen a la carpeta "public/images"
            $image->move(public_path('imagesProductos'), $imageName);
            
            $nuevoProductoFotos = new Foto();
            $nuevoProductoFotos->imagen = $imageName;
            $nuevoProductoFotos->color = $request->color;
            $nuevoProductoFotos->tamaño = "formImagenes";
            $nuevoProductoFotos->cantidad = "formImagenes";
            $nuevoProductoFotos->idFK = $request->id;
            $nuevoProductoFotos->temporada = "0";
            $nuevoProductoFotos->save();
        }
        session()->flash("productoCreadoCorrectamenteFotosImagenes","Imagenes guardadas para el color ".$request->color." correctamente");

        $producto = Producto::where("id",$request->id)->first();
        return redirect()->route("colorSeleccionado", ['id' => $request->id, 'color' => $request->color]);
    }

    public function storeProductoFotosTamañoCantidad(Request $request){//para guardar solo tamaños


            $existeTamañoTablaProducto = 0;
            $productos = Producto::all();
            $id = 0;

            foreach($productos as $item){
                if($request->tamaño == $item->tamaño && $request->color == $item->color){
                    $existeTamañoTablaProducto = 1;
                    $id = $item->id;
                    break;
                }
            }

            if($existeTamañoTablaProducto == 1){//tablaProductos
                // guarda la cantidad del tamaño que se digito que esta en la tabla de productos con el color indicado
                $productoRepiteTamañoEncontradoTablaProducto = Producto::where("id", $id)->first();
                $productoRepiteTamañoEncontradoTablaProducto->cantidad = $productoRepiteTamañoEncontradoTablaProducto->cantidad + $request->cantidad;
                if($productoRepiteTamañoEncontradoTablaProducto->cantidad < 0){
                    $productoRepiteTamañoEncontradoTablaProducto->cantidad = 0;
                }

                $productoRepiteTamañoEncontradoTablaProducto->save();
                session()->flash("productoCreadoCorrectamenteFotosTamaño","Tamaño y cantidad guardadas para el color ".$request->color." correctamente");

                $producto = Producto::where("id",$request->id)->first();
                return redirect()->route("colorSeleccionado", ['id' => $request->id, 'color' => $request->color]);
            }else{

                //verificar si el tamaño existe en la tabla de fotos

                $existeTamañoTablaFotos = 0;
                $productosTablaFotos = Foto::all();
                $id = 0;

                foreach($productosTablaFotos as $item){
                    if($request->tamaño == $item->tamaño && $request->color == $item->color){
                        $existeTamañoTablaFotos = 1;
                        $id = $item->id;
                        break;
                    }
                }


                if($existeTamañoTablaFotos == 1){//tablaFotos
                    // guarda la cantidad del tamaño que se digito que esta en la tabla de fotos con el color indicado
                    $productoRepiteTamañoEncontradoTablaFotos = Foto::where("id", $id)->first();
                    $productoRepiteTamañoEncontradoTablaFotos->cantidad = $productoRepiteTamañoEncontradoTablaFotos->cantidad + $request->cantidad;
                    if($productoRepiteTamañoEncontradoTablaFotos->cantidad < 0){
                        $productoRepiteTamañoEncontradoTablaFotos->cantidad = 0;
                    }

                    $productoRepiteTamañoEncontradoTablaFotos->save();
                    session()->flash("productoCreadoCorrectamenteFotosTamaño","Tamaño y cantidad guardadas para el color ".$request->color." correctamente");
    
                    $producto = Producto::where("id",$request->id)->first();
                    return redirect()->route("colorSeleccionado", ['id' => $request->id, 'color' => $request->color]);
                }else{

                    // guarda el tamaño que se digito no esta en la tabla de fotos con el color indicado
                    $nuevoProductoFotos = new Foto();
                    $nuevoProductoFotos->imagen = "formTamañosCantidades";
                    $nuevoProductoFotos->color = $request->color;
                    $nuevoProductoFotos->tamaño = $request->tamaño;
                    $nuevoProductoFotos->cantidad = $request->cantidad;
                    if($nuevoProductoFotos->cantidad < 0){
                        $nuevoProductoFotos->cantidad = 0;
                    }
                    $nuevoProductoFotos->idFK = $request->id;
                    $nuevoProductoFotos->save();

                    session()->flash("productoCreadoCorrectamenteFotosTamaño","Tamaño y cantidad guardadas para el color ".$request->color." correctamente");

                    $producto = Producto::where("id",$request->id)->first();
                    return redirect()->route("colorSeleccionado", ['id' => $request->id, 'color' => $request->color]);
                }
            }
    }

    public function eliminarProductoTablaFotos(Request $request){
        //return $request;
        $ProductosEliminadoTablaFotos = Foto::where("id", $request->id)->first();
        

        if($ProductosEliminadoTablaFotos->imagen == "formTamañosCantidades"){
            $delete=Foto::where('id',$request->id)->delete();
            session()->flash("eliminarProducto","EL producto se elimino correctamente");
            return redirect()->route("loginDentro");
    
        }else if($ProductosEliminadoTablaFotos->tamaño == "formImagenes"){
            unlink(public_path('imagesProductos/'.$ProductosEliminadoTablaFotos->imagen));
            $delete=Foto::where('id',$request->id)->delete();

            session()->flash("eliminarProducto","EL producto se elimino correctamente");
            return redirect()->route("colorSeleccionado", ['id' => $ProductosEliminadoTablaFotos->idFK, 'color' => $ProductosEliminadoTablaFotos->color]);
        }
        else{
            unlink(public_path('imagesProductos/'.$ProductosEliminadoTablaFotos->imagen));
            $delete=Foto::where('id',$request->id)->delete();

            session()->flash("eliminarProducto","EL producto se elimino correctamente");
            return redirect()->route("colorSeleccionado", ['id' => $ProductosEliminadoTablaFotos->idFK, 'color' => $ProductosEliminadoTablaFotos->color]);
        }

    }


    public function jqTamaños(Request $request)
    {
        if ($request->ajax()) {
            $productId = $request->input('productId');
            $selectedColor = $request->input('selectedColor');
    
            $tamañosSelectColorFotos = Foto::where("idFK", $productId)->where("color", $selectedColor)->get();
            $tamañosSelectColorProducto = Producto::where("id", $productId)->where("color", $selectedColor)->get();
            
            $respuesta = $tamañosSelectColorProducto->concat($tamañosSelectColorFotos);
            
            $colores = $respuesta->pluck('tamaño')->unique(); // Obtiene los tamanos únicos
            return response()->json($colores);
        }
    }

    public function jqImagenes(Request $request)
    {
        if ($request->ajax()) {
            $productId = $request->input('productId');
            $selectedColor = $request->input('selectedColor');
    
            $imagenesSelectColorFotos = Foto::where("idFK", $productId)->where("color", $selectedColor)->get();
            $imagenesSelectColorProducto = Producto::where("id", $productId)->where("color", $selectedColor)->get();
            
            $respuesta = $imagenesSelectColorProducto->concat($imagenesSelectColorFotos);
            
            $imagenes = $respuesta->pluck('imagen')->unique(); // Obtiene las imagenes nada mas
            return response()->json($imagenes);
        }
    }

    public function carritoCompraVerificarCantidad(Request $request){
        if ($request->ajax()) {
            $productId = $request->input('productId');
            $selectedColor = $request->input('selectedColor');
            $selectedTamaño = $request->input('selectedTamaño');
            $sessionCliente = $request->input('sessionCliente');

            //dd($productId);
        
            $cantidadActualProductoElegidoTablaProducto = Producto::where("id", $productId)
                ->where("tamaño", $selectedTamaño)
                ->where("color", $selectedColor)
                ->value('cantidad');
        
            $cantidadActualProductoElegidoTablaFotos = Foto::where("idFK", $productId)
                ->where("tamaño", $selectedTamaño)
                ->where("color", $selectedColor)
                ->where("cantidad", "!=", "formImagenes")
                ->value('cantidad');
        
                return response()->json([
                    'producto' => [
                        'cantidad' => $cantidadActualProductoElegidoTablaProducto,
                        'tamaño' => $selectedTamaño
                    ],
                    'foto' => ['cantidad' => $cantidadActualProductoElegidoTablaFotos,
                    'tamaño' => $selectedTamaño
                ]
            ]);
    }
}


public function carritoCompraTablaProducto(Request $request){
    if ($request->ajax()) {

        //dd("estoy aqui");
        $productId = $request->input('productId');
        $selectedColor = $request->input('selectedColor');
        $selectedTamaño = $request->input('selectedTamaño');
        $sessionCliente = $request->input('sessionCliente');

        
        $existeCompraProductoDelSessionCliente = 0;

        //Añadir compra con a la tabla de compra y comprar si ya existe esa compra
        $compras = Compra::all();
        foreach($compras as $item){
            if($item->nombreClienteSession == $sessionCliente && $item->idFKProducto == $productId && $item->colorSeleccionado == $selectedColor && $item->tamañoSeleccionado == $selectedTamaño){
                $existeCompraProductoDelSessionCliente = 1; 
                break;
            }
        }
        
        if($existeCompraProductoDelSessionCliente == 1){
            return response()->json("Si desea sumar mas de este producto entrar al carrito de compra");
        }else{
            //dd("estoy aqui");
            //añadir los datos a la tabla de compras
            $añadirCompra = new Compra();
            $añadirCompra->nombreClienteSession = $sessionCliente;
            $añadirCompra->idFKProducto = $productId;
            $añadirCompra->colorSeleccionado = $selectedColor;
            $añadirCompra->tamañoSeleccionado = $selectedTamaño;
            $añadirCompra->cantidad = 1;
            $añadirCompra->save();

            //Aumenta el carrito del cliente
            $clienteSession = Cliente::where("nombre", $sessionCliente)->first();
            $clienteSession->contadorCarrito = $clienteSession->contadorCarrito + 1;
            $clienteSession->save();

        
            //restar la cantidad del producto de la tabla  de productos
            $restarCantidadProductoTablaProducto = Producto::where([["id","=",$productId],["tamaño","=",$selectedTamaño]])->first();
            $restarCantidadProductoTablaProducto->cantidad = $restarCantidadProductoTablaProducto->cantidad - 1;
            $restarCantidadProductoTablaProducto->save();

            //colocar la hora de expiracion por si nunca realiza la compra
            //$sessionCache = session('nombre');
            $obtenerPrimeraCompraClienteSession = Compra::where([["id","=",$añadirCompra->id]])->first();

            //crear la fecha de expiracion para eliminar los productos del carrito de esta session
            $fechaCreacionPrimerItem = $obtenerPrimeraCompraClienteSession->created_at;
            //$fechaExpiracion = date('Y-m-d H:i:s', strtotime($fechaCreacionPrimerItem) + (01 * 60));

            $fechaExpiracion = date('Y-m-d H:i:s', strtotime($fechaCreacionPrimerItem) + (2 * 60 * 60));
            $obtenerPrimeraCompraClienteSession->expiracion = $fechaExpiracion;
            $obtenerPrimeraCompraClienteSession->save();


            return response()->json($clienteSession->contadorCarrito);
        }

    }
}



public function carritoCompraTablaProducto2(Request $request){
    if ($request->ajax()) {

        //dd("estoy aqui");
        $productId = $request->input('productId');
        $sessionCliente = session('nombre');


        $productoTablaProducto = Producto::where([["id","=",$productId]])->first();

        
        $existeCompraProductoDelSessionCliente = 0;

        //Añadir compra con a la tabla de compra y comprar si ya existe esa compra
        $compras = Compra::all();
        foreach($compras as $item){
            if($item->nombreClienteSession == $sessionCliente && $item->idFKProducto == $productId && $item->colorSeleccionado == $productoTablaProducto->color && $item->tamañoSeleccionado == $productoTablaProducto->tamaño){
                $existeCompraProductoDelSessionCliente = 1; 
                break;
            }
        }
        
        if($existeCompraProductoDelSessionCliente == 1){
            return response()->json("Si desea sumar mas de este producto entrar al carrito de compra");
        }else{
            //dd("estoy aqui");
            //añadir los datos a la tabla de compras
            $añadirCompra = new Compra();
            $añadirCompra->nombreClienteSession = $sessionCliente;
            $añadirCompra->idFKProducto = $productId;
            $añadirCompra->colorSeleccionado = $productoTablaProducto->color;
            $añadirCompra->tamañoSeleccionado = $productoTablaProducto->tamaño;
            $añadirCompra->cantidad = 1;
            $añadirCompra->save();

            //Aumenta el carrito del cliente
            $clienteSession = Cliente::where("nombre", $sessionCliente)->first();
            $clienteSession->contadorCarrito = $clienteSession->contadorCarrito + 1;
            $clienteSession->save();

        
            //restar la cantidad del producto de la tabla  de productos
            $restarCantidadProductoTablaProducto = Producto::where([["id","=",$productId],["tamaño","=",$productoTablaProducto->tamaño]])->first();
            $restarCantidadProductoTablaProducto->cantidad = $restarCantidadProductoTablaProducto->cantidad - 1;
            $restarCantidadProductoTablaProducto->save();

            //colocar la hora de expiracion por si nunca realiza la compra
            //$sessionCache = session('nombre');
            $obtenerPrimeraCompraClienteSession = Compra::where([["id","=",$añadirCompra->id]])->first();

            //crear la fecha de expiracion para eliminar los productos del carrito de esta session
            $fechaCreacionPrimerItem = $obtenerPrimeraCompraClienteSession->created_at;
            //$fechaExpiracion = date('Y-m-d H:i:s', strtotime($fechaCreacionPrimerItem) + (01 * 60));

            $fechaExpiracion = date('Y-m-d H:i:s', strtotime($fechaCreacionPrimerItem) + (2 * 60 * 60));
            $obtenerPrimeraCompraClienteSession->expiracion = $fechaExpiracion;
            $obtenerPrimeraCompraClienteSession->save();


            return response()->json($clienteSession->contadorCarrito);
        }

    }
}


public function carritoCompraTablaFotos(Request $request){
    if ($request->ajax()) {
        $productId = $request->input('productId');
        $selectedColor = $request->input('selectedColor');
        $selectedTamaño = $request->input('selectedTamaño');
        $sessionCliente = $request->input('sessionCliente');
        $existeCompraProductoDelSessionCliente = 0;

        //Añadir compra con a la tabla de compra y comprar si ya existe esa compra
        $compras = Compra::all();
        foreach($compras as $item){
            if($item->nombreClienteSession == $sessionCliente && $item->idFKProducto == $productId && $item->colorSeleccionado == $selectedColor && $item->tamañoSeleccionado == $selectedTamaño){
                $existeCompraProductoDelSessionCliente = 1; 
                break;
            }
        }

        if($existeCompraProductoDelSessionCliente == 1){
            return response()->json("Si desea sumar mas de este producto entrar al carrito de compra");
        }else{

            //añadir los datos a la tabla de compras
            $añadirCompra = new Compra();
            $añadirCompra->nombreClienteSession = $sessionCliente;
            $añadirCompra->idFKProducto = $productId;
            $añadirCompra->colorSeleccionado = $selectedColor;
            $añadirCompra->tamañoSeleccionado = $selectedTamaño;
            $añadirCompra->cantidad = 1;
            $añadirCompra->save();


            //Aumenta el carrito del cliente
            $clienteSession = Cliente::where("nombre", $sessionCliente)->first();
            $clienteSession->contadorCarrito = $clienteSession->contadorCarrito + 1;
            $clienteSession->save();

            //restar la cantidad del producto de la tabla  de fotos
            $restarCantidadProductoTablaFoto = Foto::where([["idFK","=",$productId],["color","=",$selectedColor],["tamaño","=",$selectedTamaño]])->first();
            $restarCantidadProductoTablaFoto->cantidad = $restarCantidadProductoTablaFoto->cantidad - 1;
            $restarCantidadProductoTablaFoto->save();

            //colocar la hora de expiracion por si nunca realiza la compra
            //$sessionCache = session('nombre');
            $obtenerPrimeraCompraClienteSession = Compra::where([["id","=",$añadirCompra->id]])->first();

            //crear la fecha de expiracion para eliminar los productos del carrito de esta session
            $fechaCreacionPrimerItem = $obtenerPrimeraCompraClienteSession->created_at;
            //$fechaExpiracion = date('Y-m-d H:i:s', strtotime($fechaCreacionPrimerItem) + (01 * 60));

            $fechaExpiracion = date('Y-m-d H:i:s', strtotime($fechaCreacionPrimerItem) + (2 * 60 * 60));
            $obtenerPrimeraCompraClienteSession->expiracion = $fechaExpiracion;
            $obtenerPrimeraCompraClienteSession->save();

            return response()->json($clienteSession->contadorCarrito);

        }
    }
}

public function carritoCompras(){


    $fechaActual = Date::now();
    $fechaObjeto = new DateTime($fechaActual);
    $fechaFormateada = $fechaObjeto->format('Y-m-d H:i:s');

    $clienteSession = Compra::where([["nombreClienteSession","=",session('nombre')]])->first();
    
    if($clienteSession == ""){
        //return "estoy aqui si no hay compras de esta session en la tabla de comppras";
        $sessionCache = session('nombre');
        //debo traer las compras del usuario que esta en la session de cache
        $comprasDeClienteCache = Compra::where("nombreClienteSession",$sessionCache)->get();
        //Traer los productos
        $productos = Producto::all();
        //traer todas las fotos
        $fotos = Foto::all();

        return view("carrito.carritoCompras",compact("comprasDeClienteCache","productos","sessionCache","fotos"));

    }else if($fechaFormateada >= $clienteSession->expiracion && session('nombre') == $clienteSession->nombreClienteSession){
        //return "estoy aqui para devolver los productos al inventario";
        //devolver los productos a la tabla de productos
        $clienteSession = Compra::where([["nombreClienteSession","=",session('nombre')]])->get();
        $productos2 = Producto::all();
        foreach($clienteSession as $item){
            foreach($productos2 as $item2){
                if($item->idFKProducto == $item2->id && $item->colorSeleccionado == $item2->color && $item->tamañoSeleccionado == $item2->tamaño && $item->nombreClienteSession == session("nombre")){
                    $item2->cantidad = $item2->cantidad + $item->cantidad;
                    $item2->save();
                    break;
                }
            }
        }
        //devolver los productos a la tabla de fotos
        $clienteSession = Compra::where([["nombreClienteSession","=",session('nombre')]])->get();
        $fotos2 = Foto::all();
        foreach($clienteSession as $item){
            foreach($fotos2 as $item2){
                if($item->idFKProducto == $item2->idFK && $item->colorSeleccionado == $item2->color && $item->tamañoSeleccionado == $item2->tamaño && $item->nombreClienteSession == session("nombre")){
                    $item2->cantidad = $item2->cantidad + $item->cantidad;
                    $item2->save();
                    break;
                }
            }
        }




        $clienteSession = Compra::where([["nombreClienteSession","=",session('nombre')]])->delete();
        //colocar de la tabla de clientes el contador carrito en 0 de la session que esta iniciada
        $clienteSession = Cliente::where([["nombre","=", session("nombre")]])->first();
        $clienteSession->contadorCarrito = 0;
        $clienteSession->save();

        $sessionCache = session('nombre');
        //debo traer las compras del usuario que esta en la session de cache
        $comprasDeClienteCache = Compra::where("nombreClienteSession",$sessionCache)->get();
        //Traer los productos
        $productos = Producto::all();
        //traer todas las fotos
        $fotos = Foto::all();
        return view("carrito.carritoCompras",compact("comprasDeClienteCache","productos","sessionCache","fotos"));
        
    }else{
        $sessionCache = session('nombre');
        //debo traer las compras del usuario que esta en la session de cache
        $comprasDeClienteCache = Compra::where("nombreClienteSession",$sessionCache)->get();
        //Traer los productos
        $productos = Producto::all();
        //traer todas las fotos
        $fotos = Foto::all();
        return view("carrito.carritoCompras",compact("comprasDeClienteCache","productos","sessionCache","fotos"));
    }


}


public function primeraVezPaginaCarrito(Request $request){
    if ($request->ajax()) {

        $sessionCache = session('nombre');

        //SumatotalPrecioProductos
        $productosTablaCompras = Compra::all();
        $todosProductos = Producto::all();
        $suma = 0;
        foreach($productosTablaCompras as $item){
            foreach($todosProductos as $item2){
                if($item2->id == $item->idFKProducto && $item->nombreClienteSession == session("nombre")){
                    $suma = $suma + $item2->precio * $item->cantidad;
                }
            }
        }


        //SumatotalArticulos
        $sumaArticulos = 0;
        foreach($productosTablaCompras as $item2){
            if($item2->nombreClienteSession == $sessionCache){
                $sumaArticulos = $sumaArticulos + $item2->cantidad;
            }
        }


        $response = [
            'suma' => $suma,
            'sumaTotalArticulos' =>  $sumaArticulos
        ];

        return response()->json($response);


        }
    }

public function restarCambioInputCambioTotalIva(Request $request){
    if ($request->ajax()) {
            $productIdTablaCompras = $request->input('id');
            $color = $request->input('color');
            $obtenerIdFKTablaCompra = Compra::where("id",$productIdTablaCompras)->first();
            
            //primero verificar si el producto esta en la tabla de productos para poder restarle la cantidad
            $productoTablaProducto = Producto::where([["id","=",$obtenerIdFKTablaCompra->idFKProducto],["color","=",$color]])->first();
            //dd($productoTablaProducto);

            if($productoTablaProducto != null){
                //dd("rebajar en la tabla de producto");
                if($productoTablaProducto->cantidad >= 0){
                    $productorEncontrado = Compra::where("id",$productIdTablaCompras)->first();
                    //dd($productorEncontrado);
                    if($productorEncontrado->cantidad > 1){
                    //rebajar en la tabla de producto la cantidad
                    $productoTablaProducto->cantidad = $productoTablaProducto->cantidad + 1;
                    $productoTablaProducto->save();

                    //rebajar en la tabla de compra
                    $productorEncontrado->cantidad = $productorEncontrado->cantidad - 1;
                    $productorEncontrado->save();


                    //sumaTotalPrecioProductos 

                    $productosTablaCompras = Compra::all();
                    $todosProductos = Producto::all();
                    $suma = 0;
                    foreach($productosTablaCompras as $item){
                        foreach($todosProductos as $item2){
                            if($item2->id == $item->idFKProducto && $item->nombreClienteSession == session("nombre")){
                                $suma = $suma + $item2->precio * $item->cantidad;
                            }
                        }
                    }



                    //SumatotalArticulos
                    $sumaArticulos = 0;
                    foreach($productosTablaCompras as $item2){
                        if($item2->nombreClienteSession == session('nombre')){
                            $sumaArticulos = $sumaArticulos + $item2->cantidad;
                        }
                    }


                    $response = [
                        'cantidad' => $productorEncontrado->cantidad,
                        'suma' => $suma,
                        'sumaTotalArticulos' => $sumaArticulos,
                    ];

                    return response()->json($response);
                    }
                }
            }elseif($productoTablaProducto == null){
                //dd("rebajar en la tabla de fotos");
                $productoTablaFoto = Foto::where([["idFK","=",$obtenerIdFKTablaCompra->idFKProducto],["color","=",$color]])->first();
                
                if($productoTablaFoto->cantidad >= 0){
                    $productorEncontrado = Compra::where("id",$productIdTablaCompras)->first();
                    if($productorEncontrado->cantidad > 1){
                    //rebajar en la tabla de producto la cantidad
                    $productoTablaFoto->cantidad = $productoTablaFoto->cantidad + 1;
                    $productoTablaFoto->save();

                    //rebajar en la tabla de compra
                    $productorEncontrado->cantidad = $productorEncontrado->cantidad - 1;
                    $productorEncontrado->save();

                    //sumaTotalPrecioProductos
                    $productosTablaCompras = Compra::all();
                    $todosProductos = Producto::all();
                    $suma = 0;
                    foreach($productosTablaCompras as $item){
                        foreach($todosProductos as $item2){
                            if($item2->id == $item->idFKProducto && $item->nombreClienteSession == session("nombre")){
                                $suma = $suma + $item2->precio * $item->cantidad;
                            }
                        }
                    }

                    //SumatotalArticulos
                    $sumaArticulos = 0;
                    foreach($productosTablaCompras as $item2){
                        if($item2->nombreClienteSession == session('nombre')){
                            $sumaArticulos = $sumaArticulos + $item2->cantidad;
                        }
                    }


                    $response = [
                        'cantidad' => $productorEncontrado->cantidad,
                        'suma' => $suma,
                        'sumaTotalArticulos' => $sumaArticulos,
                    ];
                    

                    return response()->json($response);
                    }
                }
                
            }
        }
    }





    public function sumarCambioInputCambioTotalIva(Request $request){
        if ($request->ajax()) {
           
                $productIdTablaCompras = $request->input('id');//id tabla compras

            
                $obtenerIdFKTablaCompra = Compra::where("id",$productIdTablaCompras)->first();//obtengo el producto completo de la tabla compra
                //primero verificar si el producto esta en la tabla de productos para poder restarle la cantidad
                $productoTablaProducto = Producto::where([["id","=",$obtenerIdFKTablaCompra->idFKProducto],["color","=",$obtenerIdFKTablaCompra->colorSeleccionado],["tamaño","=",$obtenerIdFKTablaCompra->tamañoSeleccionado]])->first();
                //dd($productoTablaProducto);

                if($productoTablaProducto != null){
                    //estoy en la tabla de productos

                    if($productoTablaProducto->cantidad > 0){
                        $productorEncontrado = Compra::where("id",$productIdTablaCompras)->first();
                        //rebajar en la tabla de producto la cantidad
                        $productoTablaProducto->cantidad = $productoTablaProducto->cantidad - 1;
                        $productoTablaProducto->save();

                        //aumentar en la tabla de compra
                        $productorEncontrado->cantidad = $productorEncontrado->cantidad + 1;
                        $productorEncontrado->save();


                        //sumaTotalPrecioProductos 
                        $productosTablaCompras = Compra::all();
                        $todosProductos = Producto::all();
                        $suma = 0;
                        foreach($productosTablaCompras as $item){
                            foreach($todosProductos as $item2){
                                if($item2->id == $item->idFKProducto && $item->nombreClienteSession == session("nombre")){
                                    $suma = $suma + $item2->precio * $item->cantidad;
                                }
                            }
                        }



                        //SumatotalArticulos
                        $sumaArticulos = 0;
                        foreach($productosTablaCompras as $item2){
                            if($item2->nombreClienteSession == session('nombre')){
                                $sumaArticulos = $sumaArticulos + $item2->cantidad;
                            }
                        }


                        $response = [
                            'cantidad' => $productorEncontrado->cantidad,
                            'suma' => $suma,
                            'sumaTotalArticulos' => $sumaArticulos,
                        ];

                        return response()->json($response);
                        
                    }
                }elseif($productoTablaProducto == null){
                    $productorEncontrado = Compra::where("id",$productIdTablaCompras)->first();
                    //dd($productorEncontrado)
                    $productoTablaFoto = Foto::where([["idFK","=",$productorEncontrado->idFKProducto],["color","=",$productorEncontrado->colorSeleccionado],["tamaño","=",$productorEncontrado->tamañoSeleccionado]])->first();

                    //dd($productoTablaFoto);
                    
                    if($productoTablaFoto->cantidad > 0){
                        $productorEncontrado = Compra::where("id",$productIdTablaCompras)->first();
                        //rebajar en la tabla de producto la cantidad

                        $productoTablaFoto->cantidad = $productoTablaFoto->cantidad - 1;
                        $productoTablaFoto->save();

                        //aumentar en la tabla de compra
                        $productorEncontrado->cantidad = $productorEncontrado->cantidad + 1;
                        $productorEncontrado->save();


                        //sumaTotalPrecioProductos

                        $productosTablaCompras = Compra::all();
                        $todosProductos = Producto::all();
                        $suma = 0;
                        foreach($productosTablaCompras as $item){
                            foreach($todosProductos as $item2){
                                if($item2->id == $item->idFKProducto && $item->nombreClienteSession == session("nombre")){
                                    $suma = $suma + $item2->precio * $item->cantidad;
                                }
                            }
                        }

                        //SumatotalArticulos
                        $sumaArticulos = 0;
                        foreach($productosTablaCompras as $item2){
                            if($item2->nombreClienteSession == session('nombre')){
                                $sumaArticulos = $sumaArticulos + $item2->cantidad;
                            }
                        }


                        $response = [
                            'cantidad' => $productorEncontrado->cantidad,
                            'suma' => $suma,
                            'sumaTotalArticulos' => $sumaArticulos,
                        ];
                        

                        return response()->json($response);
                        
                    }
                    
                }
            }
        }

        public function eliminarTablaCompras(Request $request){
            if ($request->ajax()) {
    
                $productIdTablaCompras = $request->input('id');//id tabla compras
                $color = $request->input('color');//id tabla compras

                //obtener el producto que se va a eliminar
                $productoTablaComprasEliminado = Compra::where([["id","=",$productIdTablaCompras]])->first();

                $obtengoidFK = $productoTablaComprasEliminado->idFKProducto;
                $obtengoCantidad = $productoTablaComprasEliminado->cantidad;
                $obtengoColor = $productoTablaComprasEliminado->colorSeleccionado;
                $obtengoTamaño = $productoTablaComprasEliminado->tamañoSeleccionado;


                //restar el contadorCarrito de la tabla cliente
                $cliente = Cliente::where([["nombre", session("nombre")]])->first();
                $cliente->contadorCarrito = $cliente->contadorCarrito -1;
                $cliente->save();



                /*Buscar en la tabla de productos a ver si esos datos se encontraron 
                $obtengoidFK = $productoTablaComprasEliminado->idFKProducto;
                $obtengoCantidad = $productoTablaComprasEliminado->cantidad; // este seria para sumarselo
                $obtengoColor = $productoTablaComprasEliminado->colorSeleccionado;*/

                $productoTablaProductos = Producto::where(
                    [
                        ["id","=",$obtengoidFK],
                        ["color","=",$obtengoColor],
                        ["tamaño","=",$obtengoTamaño]
                    ]
                )->first();

                

                if($productoTablaProductos != null){
                    //Esta en la tabla de productos ahora debo sumarle la cantidad
                    $productoTablaProductos->cantidad = $productoTablaProductos->cantidad + $obtengoCantidad;
                    $productoTablaProductos->save();

                    //eliminar el producto ahora si
                    $productoTablaComprasEliminado = Compra::where([["id","=",$productIdTablaCompras]])->delete();

                    return response()->json("Se elimino correctamente");
                }else if($productoTablaProductos == null){
                    //Esta en la tabla de fotos ahora debo sumarle la cantidad
                    $productoTablaFotos = Foto::where(
                        [
                            ["idFK","=",$obtengoidFK],
                            ["color","=",$obtengoColor],
                            ["tamaño","=",$obtengoTamaño]
                        ]
                    )->first();

                    
                    $productoTablaFotos->cantidad = $productoTablaFotos->cantidad + $obtengoCantidad;
                    $productoTablaFotos->save();

                    //eliminar el producto ahora si
                    $productoTablaComprasEliminado = Compra::where([["id","=",$productIdTablaCompras]])->delete();

                    return response()->json("Se elimino correctamente");
                }

    
                }
        }

        public function WA(Request $request){

            if($request->sumaTotal == null){//si le doy finalizar compra sin tener nada agregado al carrito
                return redirect()->route("index2");
            }else{
                //obtener imagen de comprobante y guardarla en la carpeta de comprobantes
                $imageName = time().'.'.$request->imagen->extension();
                $request->imagen->move(public_path('imagesComprobantes'), $imageName);

                //obtener las compras del del usuario que esta en session de cache
                $comprasUserCache = Compra::where([["nombreClienteSession","=",session("nombre")]])->get();


                //obtener el ultimo numero de factura
                $ultimoIDTablaCompras2s = Compras2s::max('id');

                $ultimaCompraTablaCompras2s = Compras2s::where([["id","=", $ultimoIDTablaCompras2s]])->first();
                //return $ultimaCompraTablaCompras2s->nFactura;


                //$ultimoNumFactura = $ultimoIDTablaCompras2s->nFactura;

                if($ultimoIDTablaCompras2s == ""){
                    //aqui debo guardar el numero de factura en 1";
                    //crear nuevo objeto de compras2
                    foreach($comprasUserCache as $item){
                        $compras2 = new Compras2s();
                        $compras2->nombreClienteSession = $item->nombreClienteSession;
                        $compras2->idFKProducto = $item->idFKProducto;
                        $compras2->colorSeleccionado = $item->colorSeleccionado;
                        $compras2->tamañoSeleccionado = $item->tamañoSeleccionado;
                        $compras2->cantidad = $item->cantidad;
                        $compras2->nombre = $request->nombre;
                        $compras2->telefono = $request->telefono;
                        $compras2->imagen = $imageName;
                        $compras2->direccion = $request->direccion;
                        $compras2->sumaTotal = $request->sumaTotal;
                        $compras2->nFactura = "1";
                        $compras2->estatus = "En proceso";
                        $compras2->metodoPago = "SINPE";
                        $compras2->save();
                    }

                    //quitar de la tabla de compras los productos
                    foreach($comprasUserCache as $item){
                        $itemDelete = Compra::where([["id","=",$item->id]])->delete();
                    }

                    //colocar el carrito del cliente en 0
                    $cliente = Cliente::where([["nombre","=", session("nombre")]])->first();
                    $cliente->contadorCarrito = 0;
                    $cliente->save();

                    $factura = 1;

                    // Construir la URL con los datos de compra
                        $url = 'https://api.whatsapp.com/send?phone=50687249099&text='
                        . urlencode("DATOS DE COMPRA:\n\nNumero de Factura: ".$factura .
                        "\nNombre: ".$request->nombre.
                        "\nTelefono:".$request->telefono.
                        "\nDireccion: ".$request->direccion.
                        "\nLink: http://54.89.124.204/factura/".$factura."/".$request->telefono);

                    // Redireccionar al enlace de WhatsApp
                    return redirect($url);



                }else{
                    //aqui debo guardar en nFactura el ultimo nFactura +1";
                    //crear nuevo objeto de compras2
                    foreach($comprasUserCache as $item){
                        $compras2 = new Compras2s();
                        $compras2->nombreClienteSession = $item->nombreClienteSession;
                        $compras2->idFKProducto = $item->idFKProducto;
                        $compras2->colorSeleccionado = $item->colorSeleccionado;
                        $compras2->tamañoSeleccionado = $item->tamañoSeleccionado;
                        $compras2->cantidad = $item->cantidad;
                        $compras2->nombre = $request->nombre;
                        $compras2->telefono = $request->telefono;
                        $compras2->imagen = $imageName;
                        $compras2->direccion = $request->direccion;
                        $compras2->sumaTotal = $request->sumaTotal;
                        $compras2->nFactura = $ultimaCompraTablaCompras2s->nFactura +1;
                        $compras2->estatus = "En proceso";
                        $compras2->metodoPago = "SINPE";
                        $compras2->save();
                    }


                                        //quitar de la tabla de compras los productos
                    foreach($comprasUserCache as $item){
                        $itemDelete = Compra::where([["id","=",$item->id]])->delete();
                    }

                    //colocar el carrito del cliente en 0
                    $cliente = Cliente::where([["nombre","=", session("nombre")]])->first();
                    $cliente->contadorCarrito = 0;
                    $cliente->save();

                    $factura = $ultimaCompraTablaCompras2s->nFactura +1;

                    // Construir la URL con los datos de compra
                        $url = 'https://api.whatsapp.com/send?phone=50687249099&text='
                        . urlencode("DATOS DE COMPRA:\n\nNumero de Factura: ".$ultimaCompraTablaCompras2s->nFactura +1 .
                        "\nNombre: ".$request->nombre.
                        "\nTelefono:".$request->telefono.
                        "\nDireccion: ".$request->direccion.
                        "\nLink: http://54.89.124.204/factura/".$factura."/".$request->telefono);

                    // Redireccionar al enlace de WhatsApp
                    return redirect($url);
                }
            }
        }

        public function factura(){
            $compras2 = Compras2s::all();
            return view("carrito.factura",compact("compras2"));
        }




        
        public function traerNombreCliente(Request $request){
            if ($request->ajax()) {
                
                
                $nFactura = $request->input('nFactura');
                $telefono = $request->input('telefono');
                //dd($telefono);  
                $nombreCliente = Compras2s::where([["nFactura","=",$nFactura],["telefono","=",$telefono]])->first();
                //dd($nombreCliente);

                return response()->json($nombreCliente);
            }
        }

        public function verFactura(Request $request){

            $facturasCompras = Compras2s::where([["nFactura","=",$request->nFactura],["telefono","=",$request->telefono]])->get();
    
            if($facturasCompras->isEmpty()){
                return redirect()->route("index2");
            }else{

                $productos = Producto::all();
                $fotos = Foto::all();
                $suma = 0;
                
                foreach($facturasCompras as $item){
                    $suma = $suma + $item->cantidad;
                }
                return view("carrito.mostrarFactura",compact("facturasCompras","productos","fotos","suma"));
            }
           
        }


        public function vistaReporteFacturas(Request $request){
           

            $txtBuscar = $request->txtBuscar;


            if(Empty($request->txtBuscar)){
                $compras2 = Compras2s::all();
                return view("reportes.reportesFacturas",compact("compras2"));
               
            }else{
                if (strpos($request->txtBuscar, '#') !== false) {
                    $txtBuscar = str_replace('#', '', $txtBuscar); // Eliminar "#"
                }
                $compras2 = Compras2s::where("nFactura", "like", "%" . $txtBuscar . "%")
                     ->orWhere("nombre", "like", "%" . $txtBuscar . "%")
                     ->orWhere("telefono", "like", "%" . $txtBuscar . "%")
                     ->orWhere("estatus", "like", "%" . $txtBuscar . "%")
                     ->orWhere("created_at", "like", "%" . $txtBuscar . "%")
                     ->get();

                return view("reportes.reportesFacturas",compact("compras2"));
            }
            
        }

        public function verFacturaIndividual(Request $request){

            $facturas = Compras2s::where([["nFactura","=",$request->nFactura]])->get();

            $estatus = "";

            foreach( $facturas as $item){
                if($item->estatus == "Rechazada"){
                    $estatus = "Rechazada";
                }
            }


            $suma = 0;
                
            foreach($facturas as $item){
                $suma = $suma + $item->cantidad;
            }
            return view("reportes.facturaIndividual",compact("facturas","suma","estatus"));
        }



        public function cambiarEstadoFactura(Request $request){

            //return $request;

            if($request->estatus == "Rechazada"){
                $comprasDevueltas = Compras2s::where("nFactura","=",$request->nFactura)->get();

                //primero buscar si los articulos estan en la tabla de Productos
                $productos = Producto::all();

                foreach($comprasDevueltas as $item){
                    foreach($productos as $item2){
                        if($item->idFKProducto == $item2->id && $item->colorSeleccionado == $item2->color && $item->tamañoSeleccionado == $item2->tamaño){
                            $item2->cantidad = $item2->cantidad + $item->cantidad;
                            $item2->save();
                        }
                    }
                }

                //primero buscar si los articulos estan en la tabla de Fotos
                $fotos = Foto::all();
                foreach($comprasDevueltas as $item){
                    foreach($fotos as $item2){
                        if($item->idFKProducto == $item2->idFK && $item->colorSeleccionado == $item2->color && $item->tamañoSeleccionado == $item2->tamaño){
                            $item2->cantidad = $item2->cantidad + $item->cantidad;
                            $item2->save();
                        }
                    }
                }

                //coloca las facturas en estado rechazado 
                $nfactura = $request->nFactura;
                $cambioStatus = Compras2s::where([["nFactura","=",$request->nFactura]])->get();

                foreach($cambioStatus as $item){
                    if($item->nFactura == $request->nFactura){
                        $item->estatus = $request->estatus;
                        $item->save();
                    }
                }

                return redirect()->route("verFacturaIndividual", ['nFactura' => $nfactura]);

            }else{
                $nfactura = $request->nFactura;
                $cambioStatus = Compras2s::where([["nFactura","=",$request->nFactura]])->get();

                foreach($cambioStatus as $item){
                    if($item->nFactura == $request->nFactura){
                        $item->estatus = $request->estatus;
                        $item->save();
                    }
                }

                return redirect()->route("verFacturaIndividual", ['nFactura' => $nfactura]);
            }
            
        }

        public function descriccionProducto(Request $request){
            //return $request;
            /*aqui debo buscar el producto en la tabla de productos con esa imagen y tambien el color y guardarla en un
            arreglo debo hacer lo mismo con la tabla de Fotos
            */
            $sessionCliente = session('nombre');
            $contadorCarrito = Cliente::where("nombre",session('nombre'))->first();




            //primero busco la imagen en la tabla de productos y la guardo en una coleccion
            $productoImagen = Producto::where([["imagen","=",$request->imagen]])->first();

            if(Empty($productoImagen)){
                //return "estoy aqui por que el producto NO esta en la tabla de productos";
                //No esta la foto en la tabla de productos
                //busco la foto en la tabla de fotos
                 $producto2Imagen = Foto::where([["imagen","=",$request->imagen]])->first();
                 $fotos = Foto::where([["idFK","=",$producto2Imagen->idFK],["color","=",$producto2Imagen->color]])->get();
                 $productos = Producto::where([["id","=",$producto2Imagen->idFK],["color","=",$producto2Imagen->color]])->get();
                 $combinadosImages = $productos->concat($fotos);//aqui van los productos del color seleccionado

                //return "estoy aqui";

                 //buscar los colores que tiene ese id y guardarlos en una coleccion
                 $coloresDiferentesAProductoSeleccionadoTablaFotos = Foto::where([
                    ["idFK", "=", $producto2Imagen->idFK],
                ])->distinct()->pluck('color');   


                $coloresDiferentesAProductoSeleccionadoTablaProductos = Producto::where([
                    ["id", "=", $producto2Imagen->idFK],
                ])->distinct()->pluck('color'); 

                
                
                //colores direfentes al color del producto que se selecciono
                $coloresDiferentesAProductoSeleccionado = $coloresDiferentesAProductoSeleccionadoTablaFotos->concat($coloresDiferentesAProductoSeleccionadoTablaProductos)->unique();

                //obtener todos los tamaños del id de la imagen seleccionada
                $tamañosTablaFotos = Foto::where([
                    ["idFK", "=", $producto2Imagen->idFK],
                    ["color", "=", $producto2Imagen->color],
                    ["tamaño", "!=", "formImagenes"]
                ])->distinct()->pluck('tamaño');   

                $tamañosTablaProductos = Producto::where([
                    ["id", "=", $producto2Imagen->idFK],
                    ["color", "=", $producto2Imagen->color],
                    ["tamaño", "!=", "formImagenes"]
                ])->distinct()->pluck('tamaño'); 

                $tamañosCombinados = $tamañosTablaFotos->concat($tamañosTablaProductos);


                //todos los tamaños del color seleccionado 
                // $tamañosCombinados;
        
                //colores del producto seleccionado menos la del la imagen del producto 
                //return $coloresDiferentesAProductoSeleccionado; 

                //imagenes del producto seleccionado y el color seleccionado
                // $combinadosImages;

                $idFK = "";
                foreach($combinadosImages as $item){
                    $idFK = $item->idFK;
                    break;
                }

                //traer el producto para luego pasar la descripcion y el precio
                $producto = Producto::where([["id","=",$idFK]])->first();
                $descripcion = "";
                $precio = "";
                $nombre = "";
                $color = "";
                $id = "";
                //return $producto;
                if($producto != ""){
                    $descripcion = $producto->descripcion;
                    $precio = $producto->precio;
                    $nombre = $producto->nombre;
                    $color = $item->color;
                    $id = $item->idFK;
                }else{
                foreach($combinadosImages as $item){
                    $descripcion = $item->descripcion;
                    $precio = $item->precio;
                    $nombre = $item->nombre;
                    $color = $item->color;
                    $id = $item->id;
                    break;
                }
                }



                //idFK de la tabla de fotos
                //return $id;

                return view("paginaPrincipal.index3",compact("combinadosImages","descripcion","precio","nombre","color","coloresDiferentesAProductoSeleccionado","tamañosCombinados","id","sessionCliente","contadorCarrito"));
                }
                else{
                    //return "estoy aqui por que el producto SI esta en la tabla de productos";
                    //Si esta la foto en la tabla de productos
                    $productos = Producto::where([["id","=",$productoImagen->id],["color","=",$productoImagen->color]])->get();
                    $fotos = Foto::where([["idFK","=",$productoImagen->id],["color","=",$productoImagen->color]])->get();
                    $combinadosImages = $productos->concat($fotos);//aqui van los productos del color seleccionado


                    //buscar los colores que tiene ese id y guardarlos en una coleccion
                    $coloresDiferentesAProductoSeleccionadoTablaFotos = Foto::where([
                        ["idFK", "=", $productoImagen->id],
                    ])->distinct()->pluck('color');   

                    $coloresDiferentesAProductoSeleccionadoTablaProductos = Producto::where([
                        ["id", "=", $productoImagen->id],
                    ])->distinct()->pluck('color'); 



                    //colores direfentes al color del producto que se selecciono
                    $coloresDiferentesAProductoSeleccionado = $coloresDiferentesAProductoSeleccionadoTablaFotos->concat($coloresDiferentesAProductoSeleccionadoTablaProductos)->unique();


                    //obtener todos los tamaños del id de la imagen seleccionada
                    $tamañosTablaFotos = Foto::where([
                        ["idFK", "=", $productoImagen->id],
                        ["color", "=", $productoImagen->color],
                        ["tamaño", "!=", "formImagenes"]
                    ])->distinct()->pluck('tamaño');   
                    
                    $tamañosTablaProductos = Producto::where([
                        ["id", "=", $productoImagen->id],
                        ["color", "=", $productoImagen->color],
                        ["tamaño", "!=", "formImagenes"]
                    ])->distinct()->pluck('tamaño'); 
                    
                    $tamañosCombinados = $tamañosTablaFotos->concat($tamañosTablaProductos);
                
                    $descripcion = "";
                    $precio = "";
                    $nombre = "";
                    $color = "";
                    $id = "";
                    foreach($combinadosImages as $item){
                        $descripcion = $item->descripcion;
                        $precio = $item->precio;
                        $nombre = $item->nombre;
                        $color = $item->color;
                        $id = $item->id;
                        break;
                    }

                    //productosConLaMismaCategoriaTablaProductos
                    $productosCategoriaTablaProductos = Producto::where([["id","=",$id]])->first();
                    $productosCategoriaTablaProductos = Producto::where('categoria', $productosCategoriaTablaProductos->categoria)
                    ->take(5)
                    ->get();

        
                    //todos los tamaños del color seleccionado 
                    // $tamañosCombinados;

                    //imagenes del producto seleccionado y el color seleccionado
                    // $combinadosImages;
                    //return $combinadosImages;
                    return view("paginaPrincipal.index3",compact("combinadosImages","descripcion","precio","nombre","color","coloresDiferentesAProductoSeleccionado","tamañosCombinados","id","sessionCliente","contadorCarrito","productosCategoriaTablaProductos"));


                }


        }

        public function descriccionProducto2(Request $request){

            $imagen = Producto::where([["id","=",$request->id],["color","=",$request->color]])->first();

            if(Empty($imagen)){
                $imagen = Foto::where([["idFK","=",$request->id],["color","=",$request->color],["imagen","!=","formTamañosCantidades"]])->first();
                return redirect()->route("descriccionProducto",["imagen"=>$imagen->imagen]);
            }else{
                return redirect()->route("descriccionProducto",["imagen"=>$imagen->imagen]);
            }
        }

        public function seccionImagenesCategoria(){
            $seccionProductoCategories = CreateSeccionProductoCategory::all();
            return view("productos.seccionImagenesCategoria",compact("seccionProductoCategories"));
        }

        public function crearProducto(){
            $productos = Producto::all();
            return view("login.crearProducto",compact("productos"));
        }

        public function formCrearProductoSeccionCategoria(){
            
            $categorias = Categoria::all();
            return view("productos.formCrearProductoSeccionCategoria",compact("categorias"));
        }

        public function storeSeccionCrearProductoCategoria(Request $request){
            //traer la cantidad de seccion_producto_categories para ver si es menor a 5 o si esta vacio
            $seccionProductoCategories = CreateSeccionProductoCategory::count();

            if($seccionProductoCategories < 5){
                $imageName = time().'.'.$request->imagen->extension();  
                $request->imagen->move(public_path('imagesSeccionProductoCategoria'), $imageName);

                $storeSeccionProductoCategoria = new CreateSeccionProductoCategory();
    
                $storeSeccionProductoCategoria->imagenName = $imageName;
                $storeSeccionProductoCategoria->categoria = $request->categoria;
                $storeSeccionProductoCategoria->save();

                session()->flash("creadoCorrectamente","Se creo correctamente");

                return redirect()->route("formCrearProductoSeccionCategoria");
            }else{
                //returnar un session flash que me diga que no se puede meter mas de 5 
                session()->flash("max","No se puede crear mas de 5");
                return redirect()->route("formCrearProductoSeccionCategoria");
            }
        }


        public function eliminarSeccionCategoria(Request $request){
            $eliminarSeccionCategoria2 = CreateSeccionProductoCategory::where([
                ["id","=",$request->idEliminar]
                ])->first();  
            $eliminarSeccionCategoria = CreateSeccionProductoCategory::where([
                ["id","=",$request->idEliminar]
                ])->delete();
            unlink(public_path('imagesSeccionProductoCategoria/'.$eliminarSeccionCategoria2->imagenName));
            return redirect()->route("seccionImagenesCategoria");
        }

        public function editarSeccionCategoria(Request $request){
            $editarSeccionCategoria = CreateSeccionProductoCategory::where([
                ["id","=",$request->idEditar]
                ])->first();
            $categorias = Categoria::all();
            return view("productos.formEditarSeccionCategoria",compact("editarSeccionCategoria","categorias"));
        }
        public function storeEditarSeccionCrearProductoCategoria(Request $request){
            //return $request; 
            //"imagenAntigua":"1692894051.jpg",
            //"id":"20",
            //"categoria":"MONTERO",
            //"imagen":{}}
            $seccionEditar = CreateSeccionProductoCategory::where([
                ["id","=",$request->id]])->first();

            if($request->imagen == ""){
            //solo se cambio la categoria
                $seccionEditar->categoria = $request->categoria;
                $seccionEditar->save();

            }else{
                //si se cambio la imagen
                $imageName = time().'.'.$request->imagen->extension();  //nombre de la imagen
                //meto la nueva imagen a la carpeta 
                $request->imagen->move(public_path('imagesSeccionProductoCategoria'), $imageName);
                //elimino la imagen antigua
                unlink(public_path('imagesSeccionProductoCategoria/'.$seccionEditar->imagenName));

                $seccionEditar->imagenName = $imageName;
                $seccionEditar->categoria = $request->categoria;
                $seccionEditar->save();


            }
            return redirect()->route("seccionImagenesCategoria");
        }

        public function cambiarTemporadaFotos(Request $request){

            //pasar todos los productos en la temporada a 0

            $productos = Producto::all();
            foreach($productos as $item){
                $item->temporada = 0;
                $item->save();
            }
            //pasar todos las fotos en la temporada a 0
            $fotos = Foto::all();        
            foreach($fotos as $item2){
                $item2->temporada = 0;
                $item2->save();
            }

            $productId = $request->input('id');

            $fotoEncontrada = Foto::where([["id","=",$productId]])->first();    
            $fotoEncontrada->temporada = "1";
            $fotoEncontrada->save();
            
            
        }







        







        public function niki(){
            return view("niki");
        }


}