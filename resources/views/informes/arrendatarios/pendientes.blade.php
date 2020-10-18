<table style="font-size: 0.8rem">
    <thead class="">
        <tr>
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
        @foreach ($arrendatarios as $arrendatario)
        <tr>

            <td style="word-wrap:break-word ; text-align:center;">{{$arrendatario->nombre}}</td>
            <td style="word-wrap:break-word ; text-align:center;">{{$arrendatario->apellido}}</td>
            <td style="word-wrap:break-word ; text-align:center;">{{$arrendatario->email}}</td>
            <td style="word-wrap:break-word ; text-align:center;">
                {{number_format($arrendatario->identificacion, '0','','.')}}</td>
            <td style="word-wrap:break-word ; text-align:center;">{{$arrendatario->telefono}}</td>
            <td style="word-wrap:break-word ; text-align:center;">

                @if (count($arrendatario->contratos) > 0)
                @foreach ($arrendatario->contratos as $contrato)
                <br style="mso-data-placement:same-cell; text-align:center;" />
                {{$contrato['codigo']}}
                @endforeach
                @endif

            </td>
            <td style="word-wrap:break-word ; text-align:center;">

                @if (count($arrendatario->contratos) > 0)
                @foreach ($arrendatario->contratos as $contrato)
                <br style="mso-data-placement:same-cell; text-align:center;" />
                {{$contrato['inmueble']['codigo']}}
                @endforeach
                @endif

            </td>
            <td style="word-wrap:break-word ; text-align:center;">

                @if (count($arrendatario->contratos) > 0)
                @foreach ($arrendatario->contratos as $contrato)
                <br style="mso-data-placement:same-cell; text-align:center;" />
                {{number_format($contrato['inmueble']['canon'], '2', ',', '.')}}
                @endforeach
                @endif

            </td>

            <td style="word-wrap:break-word ; text-align:center;">

                @if (count($arrendatario->contratos) > 0)
                @foreach ($arrendatario->contratos as $contrato)
                <br style="mso-data-placement:same-cell; text-align:center;" />
                {{number_format($contrato['inmueble']['administracion'], '2', ',', '.')}}
                @endforeach
                @endif

            </td>


        </tr>
        @endforeach
    </tbody>
</table>