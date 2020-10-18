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
        @foreach ($arrendatarios as $arrendatario)
        <tr>

            <td style="word-wrap:break-word ; text-align:center;">{{$arrendatario->created_at}}</td>
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

{{-- td
	{mso-style-parent:style0;
	padding-top:1px;
	padding-right:1px;
	padding-left:1px;
	mso-ignore:padding;
	color:windowtext;
	font-size:10.0pt;
	font-weight:400;
	font-style:normal;
	text-decoration:none;
	font-family:Verdana;
	mso-generic-font-family:auto;
	mso-font-charset:0;
	mso-number-format:General;
	text-align:general;
	vertical-align:bottom;
	border:none;
	mso-background-source:auto;
	mso-pattern:auto;
	mso-protection:locked visible;
	white-space:nowrap;
	mso-rotate:0;} --}}