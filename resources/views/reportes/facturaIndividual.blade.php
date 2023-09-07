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
    <br>
    @if ($estatus != 'Rechazada' )
        <form action="{{ route('cambiarEstadoFactura') }}" method="GET" id="miFormulario">

            @foreach ($facturas as $item)
                <input type="hidden" name="nFactura" value="{{ $item->nFactura }}">
            @break
        @endforeach
            <select id="selectMiFormulario" name="estatus" class="form-select" aria-label="Default select example"
                onchange="enviarFormulario()">
                <option selected>Cambiar el estado de la factura</option>
                <option value="En proceso">En proceso</option>
                <option value="Aceptada">Aceptada</option>
                <option value="Rechazada">Rechazada</option>
            </select>
        </form>
    @endif
<script>
    function enviarFormulario() {

        var estado = document.getElementById('selectMiFormulario');
        var estadoValue = estado.value;
        console.log(estadoValue);

        if (estadoValue == "Rechazada") {
            //preguntar si de verdad quiero devolver los productos al inventario
            var respuesta = confirm("¿Estás seguro de que deseas devolver los productos al inventario?");

            if (respuesta) {
                document.getElementById('miFormulario').submit();
            }
        } else {
            document.getElementById('miFormulario').submit();

        }
    }
</script>

<table class="table" style="background-color: white">
    <tbody>
        <tr>
            <th scope="row" style="font: 30px Arial">
                FitFusion Store
            </th>
        </tr>
        <tr>
            <th scope="row">
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
        <th scope="row" id="nFacturaDevolver">
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
    $imagenComprobante = '';
@endphp
@foreach ($facturas as $item)
@php
    $imagenComprobante = $item->imagen;
@endphp
@break
@endforeach



<button class="btn btn-primary btn-lg"
onclick="showImage('imagesComprobantes/{{ $imagenComprobante }}')">
Ver imagen del comprobante
</button>
</th>
</tr>
<tr>
<th scope="row" style="text-align: left">Total de artículos:
{{ $suma }}
</th>
</tr>
<tr>
<th scope="row" style="text-align: left">TOTAL:
@foreach ($facturas as $item)
₡{{ $item->sumaTotal }}
@break
@endforeach
</th>
</tr>

<tr>
<th scope="row">
Los artículos de bateria tienen 15 días de garantía, o tengan daños de fabrica
,los artículos recargables tienen 30 días de garantía, o tengan daños de fabrica
</th>
</tr>
<tr>
<th scope="row">
Gracias por preferirnos
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
