<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">

    <link rel="stylesheet" href="{{ asset('carrito/carritoForm.Css') }}?v={{ time() }}" type="text/css"
        media="all">
    <link rel="stylesheet" href="{{ asset('index/styles.Css') }}?v={{ time() }}">
    <link rel="stylesheet" href="{{ asset('login/loginAdentro.Css') }}?v={{ time() }}">

    <title>Factura</title>
</head>

<body>

    <div class="navbar">
        <ul>
            <li><a href="{{ route('vistaReporteFacturas') }}">Inicio</a></li>
            <!-- Agrega aquí más elementos del navbar si es necesario -->
        </ul>
    </div>

    <table class="table" style="background-color: white">
        <tbody>
            <tr>
                <th scope="row" style="text-align:">
                    Fecha:
                    @foreach ($facturas as $item)
                        <?php
                        $created_at = $item->created_at; // Suponiendo que $item->created_at contiene un objeto Carbon
                        
                        // Formatear la fecha en formato "YYYY-MM-DD"
                        $fecha = $created_at->format('Y-m-d');
                        
                        echo $fecha; // Esto mostrará la fecha en formato "YYYY-MM-DD"
                        ?>
                    @break
                @endforeach
            </th>
            </tr>


        <tr>
            <th scope="row">
                Número de factura:
                @foreach ($facturas as $item)
                    #{{ $item->nFactura }}
                @break
            @endforeach
            </th>
        </tr>

    <tr>
        <th scope="row">
            Estado de la factura:
            @foreach ($facturas as $item)
                {{ $item->estatus }}
            @break
        @endforeach
        </th>
    </tr>
<tr>
    <th scope="row">Nombre del cliente:
        @foreach ($facturas as $item)
                {{ $item->nombre }}
            @break
        @endforeach
    </th>
</tr>
<tr>
    <th scope="row">Teléfono: 
        @foreach ($facturas as $item)
                {{ $item->telefono }}
            @break
        @endforeach
    </th>
</tr>
<tr>
    <th scope="row">Direccion: 
        @foreach ($facturas as $item)
                {{ $item->direccion }}
            @break
        @endforeach
    </th>
</tr>
<tr>
    <th scope="row">

        @php
            $imagenComprobante = "";
        @endphp
        @foreach ($facturas as $item)
            @php
                $imagenComprobante = $item->imagen
            @endphp
        @break
    @endforeach



        <button class="btn btn-primary btn-lg" onclick="showImage('imagesComprobantes/{{$imagenComprobante}}')">
            Ver imagen del comprobante
        </button>
    </th>
</tr>
<tr>
    <th scope="row" style="text-align: right">Total de artículos: 
        {{$suma}}
    </th>
</tr>
<tr>
    <th scope="row" style="text-align: right">TOTAL: 
        @foreach ($facturas as $item)
        ₡{{ $item->sumaTotal }}
            @break
        @endforeach
    </th>
</tr>

</tbody>
</table>

<div id="lightbox" onclick="hideImage()">
    <img id="lightbox-image">
</div>
</body>

<script>
    //script para mostrar la imagen en grande
        function showImage(imageSrc) {
            var lightbox = document.getElementById('lightbox');
            var lightboxImage = document.getElementById('lightbox-image');
            lightboxImage.src = imageSrc;
            lightbox.style.display = 'flex';
        }

    function hideImage() {
        var lightbox = document.getElementById('lightbox');
        lightbox.style.display = 'none';
    }
</script>

</html>
