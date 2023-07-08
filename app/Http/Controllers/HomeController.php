<?php

namespace App\Http\Controllers;

use App\Models\Categoria;
use App\Models\Cliente;
use App\Models\Color;
use App\Models\Compra;
use App\Models\Foto;
use App\Models\Producto;
use App\Models\Tamano;
use GuzzleHttp\Handler\Proxy;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

use function PHPUnit\Framework\isEmpty;

class HomeController extends Controller
{

    public function index(){
        return view("paginaPrincipal.index");
    }
    public function index2(){

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
                $restarCantidadProductoTablaFoto = Foto::where([["idFK","=",$productId],["imagen","=","formTamañosCantidades"],["color","=",$selectedColor],["tamaño","=",$selectedTamaño]])->first();
                $restarCantidadProductoTablaFoto->cantidad = $restarCantidadProductoTablaFoto->cantidad - 1;
                $restarCantidadProductoTablaFoto->save();

                return response()->json($clienteSession->contadorCarrito);

            }
        }
    }

    public function carritoCompras(){

        $sessionCache = session('nombre');
        
        //debo traer las compras del usuario que esta en la session de cache
        $comprasDeClienteCache = Compra::where("nombreClienteSession",$sessionCache)->get();

        //Traer los productos
        $productos = Producto::all();

        return view("carrito.carritoCompras",compact("comprasDeClienteCache","productos","sessionCache"));
    }
}
