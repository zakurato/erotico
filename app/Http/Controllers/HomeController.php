<?php

namespace App\Http\Controllers;

use App\Models\Categoria;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class HomeController extends Controller
{
    public function index(){
        return view("paginaPrincipal.index");
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
        return view("login.loginDentro");
    }
    public function logout()
    {
        Auth::logout();
        return redirect()->route('index');
    }
    
    public function formCrear(){
        return view("productos.formCrearProducto");
    }

    public function formCrearCategoria(){
        $categorias = Categoria::all();
        return view("productos.formCrearCategoria",compact("categorias"));
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
        
        return view("productos.formEditarCategoria",compact("categoriaEditar"));
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
                $categoria = new Categoria();
                $categoria->nombreCategoria = $request->nombreCategoria;
                $categoria->save();
                session()->flash("correctoCategoria","Categoria creada correctamente");
                return redirect()->route("formCrearCategoria");
            }
        }
    }
}
