<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use App\Models\Cliente;
use App\Models\Compra;
use App\Models\Foto;
use App\Models\Producto;
use DateTime;
use Illuminate\Support\Facades\Cache;
use Illuminate\Support\Facades\Date;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Storage;
use Illuminate\Http\Request;

class EliminarDevolver extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'app:eliminar-devolver';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Command description';

    /**
     * Execute the console command.
     */
    public function handle(Request $request)
    {
        /*
        Storage::append("archivo.txt", $request);
        if (Session::has('nombre')) {
            Storage::append("archivo.txt", $request);
        } else {
            Storage::append("archivo.txt", "no hay session en cache");
        }
        




*/

        
         //logica sin colocar el tiempo
        //obtener la fecha y hora actual
        $fechaActual = Date::now();
        $fechaObjeto = new DateTime($fechaActual);
        $fechaFormateada = $fechaObjeto->format('Y-m-d H:i:s');

         //devolver los productos a la tabla de productos
         $ProductosFechaExpiraciones = Compra::all();
         $productos2 = Producto::all();
         foreach($ProductosFechaExpiraciones as $item){
            foreach($productos2 as $item2){
                if($item->idFKProducto == $item2->id && $item->colorSeleccionado == $item2->color && $item->tamañoSeleccionado == $item2->tamaño && $item->expiracion <= $fechaFormateada){
                    $item2->cantidad = $item2->cantidad + $item->cantidad;
                    $item2->save();
                    break;
                }
            }
         }

          //devolver los productos a la tabla de fotos
          $ProductosFechaExpiraciones = Compra::all();
          $fotos = Foto::all();
          foreach($ProductosFechaExpiraciones as $item){
             foreach($fotos as $item2){
                 if($item->idFKProducto == $item2->idFK && $item->colorSeleccionado == $item2->color && $item->tamañoSeleccionado == $item2->tamaño && $item->expiracion <= $fechaFormateada){
                     $item2->cantidad = $item2->cantidad + $item->cantidad;
                     $item2->save();
                     break;
                 }
             }
          }        

          //debo colocar la session de cache que esta iniciada en 0 esto me falta
          
          //Storage::append("archivo.txt", $fechaFormateada);

        
          //eliminar las fechas expiradas
         $FechaExpiraciones = Compra::all();
         foreach($FechaExpiraciones as $item){
            if($fechaFormateada >= $item->expiracion){
                $delete = Compra::where('expiracion', '<=', $item->expiracion)->delete();
            }
         }
        
    }
}
