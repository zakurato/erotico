<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="{{ asset('login/loginAdentro.Css') }}?v={{ time() }}">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/css/bootstrap.min.css"
        integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
    <title>Reportes de las facturas</title>
</head>

<body>

    <div class="navbar">
        <ul>
            <li><a href="{{ route('loginDentro') }}">Inicio</a></li>
            <li style="padding-left: 20px">
                <form action="{{ route('vistaReporteFacturas') }}" method="GET">
                    <div class="input-group">
                        <div class="form-outline">
                            <input style="width: 320px" name="txtBuscar" class="form-control"
                                placeholder="#Factura/Nombre/Teléfono/Estado/Fecha" />
                            <label class="form-label" for="form1">Search</label>
                        </div>
                        <button type="submit" class="btn btn-primary"
                            style="width: 80px !important; height: 40px !important;">Buscar
                        </button>
                    </div>
                </form>
            </li>
            <!-- Agrega aquí más elementos del navbar si es necesario -->
        </ul>
    </div>



    <table class="table">
        <tbody>
            @php
                $prevNumFactura = null;
                $suma = 0;
            @endphp
            @foreach ($compras2 as $index => $item)
                @if ($item->metodoPago == 'SINPE' && $item->estatus == 'Aceptada' && $prevNumFactura !== $item->nFactura)
                    @php
                        $suma = $suma + $item->sumaTotal;
                    @endphp
                @endif
                @php
                    $prevNumFactura = $item->nFactura;
                @endphp
            @endforeach
            @if ($suma > 0)
                <tr>
                    <th scope="row" style="background-color: black; color: white">Total Sinpes:</th>
                    <th style="background-color: black; color: white">₡{{ $suma }}</th>
                </tr>
            @endif
        </tbody>

    </table>

    <br>
    <table class="table">
        <thead>
            <tr>
                <th style="width: 12%">N° de factura</th>
                <th style="width: 18%">Nombre</th>
                <th>Teléfono</th>
                <th>Estado</th>
                <th>Fecha</th>
                <th>Acción</th>
            </tr>
        </thead>
        <tbody>
            @php
                $prevNumFactura = null;
            @endphp
            @foreach ($compras2 as $index => $item)
                @if ($prevNumFactura !== $item->nFactura)
                    <tr>
                        <th scope="row">#{{ $item->nFactura }}</th>
                        <th scope="row">{{ $item->nombre }}</th>
                        <th scope="row">{{ $item->telefono }}</th>
                        <th scope="row">{{ $item->estatus }}</th>
                        <th scope="row">
                            @php
                                $dateString = $item->created_at; //fecha y hora
                                $fecha = date('Y-m-d', strtotime($dateString)); // solo fecha
                            @endphp
                            {{ $fecha }}
                        </th>
                        <td>
                            <form action="verFacturaIndividual" method="GET">
                                @csrf
                                <input type="hidden" value="{{ $item->nFactura }}" name="nFactura">
                                <button class="btn btn-primary" type="submit">Ver factura</button>
                            </form>
                        </td>
                    </tr>
                @endif
                @php
                    $prevNumFactura = $item->nFactura;
                @endphp
            @endforeach
        </tbody>
    </table>

</body>

</html>
