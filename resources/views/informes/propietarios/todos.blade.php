<table style="font-size: 0.8rem">
    <thead class="">
        <tr>
            <th style="width: 20px">Ingreso</th>
            <th style="width: 20px">Nombre</th>
            <th style="width: 20px">Apellido</th>
            <th style="width: 20px">Email</th>
            <th style="width: 20px">Identificacion</th>
            <th style="width: 20px">Telefono</th>
            <th style="width: 20px">Contrato</th>
            <th style="width: 20px">Inmueble</th>
            <th style="width: 20px">Canon</th>
            <th style="width: 20px">Administracion</th>
        </tr>
    </thead>
    <tbody style="background: #c4c4c4;">
        @foreach ($propietarios as $propietario)
        <tr>

            <td style="word-wrap:break-word ; text-align:center;">{{$propietario->created_at}}</td>
            <td style="word-wrap:break-word ; text-align:center;">{{$propietario->nombre}}</td>
            <td style="word-wrap:break-word ; text-align:center;">{{$propietario->apellido}}</td>
            <td style="word-wrap:break-word ; text-align:center;">{{$propietario->email}}</td>
            <td style="word-wrap:break-word ; text-align:center;">
                {{number_format($propietario->identificacion, '0','','.')}}</td>
            <td style="word-wrap:break-word ; text-align:center;">{{$propietario->telefono}}</td>
            <td style="word-wrap:break-word ; text-align:center;">

                @if (count($propietario->contratos) > 0)
                @foreach ($propietario->contratos as $contrato)
                <br style="mso-data-placement:same-cell; text-align:center;" />
                {{$contrato['codigo']}}
                @endforeach
                @endif

            </td>
            <td style="word-wrap:break-word ; text-align:center;">

                @if (count($propietario->contratos) > 0)
                @foreach ($propietario->contratos as $contrato)
                <br style="mso-data-placement:same-cell; text-align:center;" />
                {{$contrato['inmueble']['codigo']}}
                @endforeach
                @endif

            </td>
            <td style="word-wrap:break-word ; text-align:center;">

                @if (count($propietario->contratos) > 0)
                @foreach ($propietario->contratos as $contrato)
                <br style="mso-data-placement:same-cell; text-align:center;" />
                {{number_format($contrato['inmueble']['canon'], '2', ',', '.')}}
                @endforeach
                @endif

            </td>

            <td style="word-wrap:break-word ; text-align:center;">

                @if (count($propietario->contratos) > 0)
                @foreach ($propietario->contratos as $contrato)
                <br style="mso-data-placement:same-cell; text-align:center;" />
                {{number_format($contrato['inmueble']['administracion'], '2', ',', '.')}}
                @endforeach
                @endif

            </td>

        </tr>
        @endforeach
    </tbody>
</table>