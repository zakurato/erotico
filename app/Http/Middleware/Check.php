<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Cache;
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
         if ($request->input('valor') == "1") {

            //OBTENGO el id session 
            $sessionId = $request->session()->getId();
            // Verificar si la sesión ya está en caché
            if (!Cache::has('session:' . $sessionId)) {
                // La sesión no está en caché, guardarla en caché
                $sessionData = $request->session()->all();
                Cache::put('session:' . $sessionId, $sessionData, 60); // Guardar en caché por 60 minutos
                return $next($request);
            }else{
                return $next($request);
            }

        } else {
            return redirect()->route("index");
        }
    }
}
