<?php

namespace App\Http\Controllers;

use App\Models\Categoria;
use App\Models\Cliente;
use App\Models\Color;
use App\Models\Producto;
use App\Models\Tamano;
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
            $cliente->save();
        }

    
        $categorias = Categoria::all();
        $productos = Producto::paginate(5);
        return view("paginaPrincipal.index2",compact("productos","categorias"));
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
        return view("productos.formActualizarProducto",compact("producto","categorias","colores","tamaños"));
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
        $producto->cantidad = $request->cantidad;
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
}
