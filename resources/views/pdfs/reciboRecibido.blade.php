<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <title>Certificado de recibo de pago</title>
    <style>
        h5 {
            text-align: center;
            text-transform: uppercase;
        }

        .contenido {
            font-size: 14px;
        }

        #segundo {
            color: #333;
        }

        footer {
            position: fixed;
            left: 0px;
            bottom: -50px;
            right: 0px;
            height: 40px;
            border-bottom: 2px solid #ddd;
        }
    </style>
</head>

<body>

    <img src="{{public_path('/images/header.jpg')}}" alt="" srcset=""
        style="width: 100%; height: 5em; margin-bottom: 10px">

    <div style="justify-content: center">

        <h5>INMOBILIARIA M&G PROPIEDAD RAIZ SAS</h5>
        <h5>NIT. 901056139-4</h5>
        <h5>RECIBO DE PAGO</h5>

    </div>

    <div class="contenido" style="padding: 0px 50px">

        <p id="segundo" style="text-align: justify; font-family: 'calibri' , 'Comic Sans'">
            EL (LA) SEÑOR (A): <b> {{strtoupper($PagoRecibido['contrato']['arrendatario']['full_name'])}},
            </b>IDENTIFICADO CON
            {{$PagoRecibido['contrato']['arrendatario']['tipo_identificacion']}} NUMERO
            <b>{{$PagoRecibido['contrato']['arrendatario']['identificacion']}}. </b>
            CANCELÓ A LA <b> INMOBILIARIA M&G PROPIEDAD RAIZ SAS. </b> LA SUMA DE <b> {{ $varloCanon }} MCTE
                (${{number_format($PagoRecibido['valor'], 2 , '.' , ',')}}) </b> POR LOS SIGUIENTES CONCEPTOS:<br> PAGO
            DEL CANON DE ARRIENDO COMPRENDIDO
            DEL {{$PagoRecibido['desde']}} A {{$PagoRecibido['hasta']}} POR ${{number_format($PagoRecibido['canon'], 2 , '.' , ',')}}.

            @if ($PagoRecibido['administracion'] != 0)

            PAGO
            DE ADMINISTRACIÓN POR ${{number_format($PagoRecibido['valor'], 2 , '.' , ',')}}.

            @endif

            SOBRE EL INMUEBLE UBICADO EN {{ strtoupper($PagoRecibido['contrato']['inmueble']['direccion'])}}
            {{strtoupper($PagoRecibido['contrato']['inmueble']['barrio'])}},
            {{strtoupper($PagoRecibido['contrato']['inmueble']['ciudad'])}}.
            <br>
            <br>
            SE EXPIDE EN BARRANCABERMEJA, A LOS {{\Carbon\Carbon::now()->format('d')}} DIAS DEL MES DE OCTUBRE DE DOS MIL VEINTE (2.020).
        </p>

        <br>

        <p>
            <b>NOHORA ISABEL PATERNINA MEZA</b>
            <br>
            Gerente
        </p>
        <footer>
            Generado por INMOBILIARIA M&G PROPIEDAD RAIZ SAS.
        </footer>
    </div>
</body>

</html>