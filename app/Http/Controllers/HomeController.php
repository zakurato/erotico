<?php

namespace App\Http\Controllers;

use App\Models\Categoria;
use App\Models\Cliente;
use App\Models\Color;
use App\Models\Compra;
use App\Models\Compra2;
use App\Models\Compras2s;
use App\Models\Foto;
use App\Models\Producto;
use App\Models\Tamano;
use GuzzleHttp\Handler\Proxy;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Date;
use DateTime;


use function PHPUnit\Framework\isEmpty;

class HomeController extends Controller
{

    public function index(){
        return view("paginaPrincipal.index");
    }
    public function index2(){

        $fechaActual = Date::now();
        $fechaObjeto = new DateTime($fechaActual);
        $fechaFormateada = $fechaObjeto->format('Y-m-d H:i:s');
    
        $clienteSession = Compra::where([["nombreClienteSession","=",session('nombre')]])->first();
        
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
                $productos = Producto::paginate(5);
                $fotos = Foto::all();
                $sessionCliente = session('nombre');
    
    
                return view("paginaPrincipal.index2",compact("productos","categorias","contadorCarrito","fotos","sessionCliente"));
            }else{
                $sessionCliente = session('nombre');
                $contadorCarrito = Cliente::where("nombre",session('nombre'))->first();
                $categorias = Categoria::all();
                $productos = Producto::paginate(5);
                $fotos = Foto::all();
                return view("paginaPrincipal.index2",compact("productos","categorias","contadorCarrito","fotos","sessionCliente"));
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
                $productos = Producto::paginate(5);
                $fotos = Foto::all();
            return view("paginaPrincipal.index2",compact("productos","categorias","contadorCarrito","fotos","sessionCliente"));


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
                $productos = Producto::paginate(5);
                $fotos = Foto::all();
                $sessionCliente = session('nombre');
    
    
                return view("paginaPrincipal.index2",compact("productos","categorias","contadorCarrito","fotos","sessionCliente"));
            }else{
                $sessionCliente = session('nombre');
                $contadorCarrito = Cliente::where("nombre",session('nombre'))->first();
                $categorias = Categoria::all();
                $productos = Producto::paginate(5);
                $fotos = Foto::all();
                return view("paginaPrincipal.index2",compact("productos","categorias","contadorCarrito","fotos","sessionCliente"));
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
                    $fotoColor = Foto::where("color", $request->color)->first();
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
                    $fotoColor = Foto::where("color", $request->color)->first();

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
       // return $request;

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
            $nuevoProductoFotos->save();
        }
        session()->flash("productoCreadoCorrectamenteFotosImagenes","Imagenes guardadas para el color ".$request->color." correctamente");

        $producto = Producto::where("id",$request->id)->first();
        return redirect()->route("colorSeleccionado", ['id' => $request->id, 'color' => $request->color]);
    }

    public function storeProductoFotosTamañoCantidad(Request $request){//para guardar solo tamaños

            //return $request;

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
                ->value('cantidad');
        
            $cantidadActualProductoElegidoTablaFotos = Foto::where("idFK", $productId)
                ->where("tamaño", $selectedTamaño)
                ->where("cantidad", "!=", "formImagenes")
                ->value('cantidad');
        
                return response()->json([
                    'producto' => [
                        'cantidad' => $cantidadActualProductoElegidoTablaProducto,
                        'tamaño' => $selectedTamaño
                    ],
                    'foto' => [
                        'cantidad' => $cantidadActualProductoElegidoTablaFotos,
                        'tamaño' => $selectedTamaño
                    ]
                ]);
        }
    }

    public function carritoCompraTablaProducto(Request $request){
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
                    $color = $request->input('color');//color producto seleccionado
                    $obtenerIdFKTablaCompra = Compra::where("id",$productIdTablaCompras)->first();//obtengo el producto completo de la tabla compra
                    
                    //primero verificar si el producto esta en la tabla de productos para poder restarle la cantidad
                    $productoTablaProducto = Producto::where([["id","=",$obtenerIdFKTablaCompra->idFKProducto],["color","=",$color]])->first();
                    //dd($productoTablaProducto);
    
                    if($productoTablaProducto != null){
                        //estoy en la tabla de productos

                        if($productoTablaProducto->cantidad >= 0){
                            $productorEncontrado = Compra::where("id",$productIdTablaCompras)->first();
                            if($productoTablaProducto->cantidad != 0){
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
                        }
                    }elseif($productoTablaProducto == null){

                        
                        $productoTablaFoto = Foto::where([["idFK","=",$obtenerIdFKTablaCompra->idFKProducto],["color","=",$color]])->first();
                        if($productoTablaFoto->cantidad != 0){
                            $productorEncontrado = Compra::where("id",$productIdTablaCompras)->first();
                            if($productorEncontrado->cantidad >= 0){
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
                            ["color","=",$obtengoColor]
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
                                ["color","=",$obtengoColor]
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


                return $request;
                //obtener las compras del del usuario que esta en session de cache
                $comprasUserCache = Compra::where([["nombreClienteSession","=",session("nombre")]])->get();

                
                
                return view();
            }
        

    }

