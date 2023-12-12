<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Cache;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Storage;
use Symfony\Component\HttpFoundation\Response;

class Check
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next): Response
    {
        
        //OBTENGO el id session 
        $sessionId = $request->session()->getId();

        //Storage::append("archivo.txt",  $sessionId);
        //obtener el valor de la session para imprimirlo en pantalla
        Session::put('nombre', $sessionId); 


        if ($request->input('valor') == "1" && Cache::has('session:' . $sessionId)) { //verifico si le dio al boton aceptar y tiene session
            return $next($request);        
        }
         if ($request->input('valor') == "1" && !Cache::has('session:' . $sessionId)) { //verifico si le dio al boton aceptar y si no tiene session
            // La sesión no está en caché, guardarla en caché
            $sessionData = $request->session()->all();

            Cache::put('session:' . $sessionId, $sessionData); // Guardar en caché por 60 segundos
            //dd("verifico si le dio al boton aceptar y si no tiene session");
            return $next($request);        
        }
        if ($request->input('valor') != "1" && Cache::has('session:' . $sessionId)) { //No le dio al boton aceptar y si ya tiene session
            return $next($request);
    }
        else{
            // Cerrar la sesión de la caché
            Cache::flush();
            return redirect()->route("index");
        }
        
    }
}
