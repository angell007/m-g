@extends('layouts.app')
@section('content')


<div class="ml-auto d-flex align-items-center secondary-menu text-center m-2">

    <a href="javascript:history.back()" class=" btn rounded-circle text-white btn-success mr-1" title=""
        data-original-title="Regresar">
        <i class="fa fa-reply " aria-hidden="true"></i>
    </a>

    <a href="javascript:void(0)" class=" btn rounded-circle text-white btn-primary mr-1" data-toggle="modal"
        data-placement="top" data-target="#modalHistoriaRegister" title="Registrar">
        <i class="fa  fa-plus"></i>
    </a>


    {{-- <a class="btn rounded-circle text-white btn-warning mr-1" href="javascript:void(0)"
        onClick="showPrintServiceDetails('{{ $service->id }}')" title="Imprimir">
    <i class="fa fa-fw fa-print"></i>
    </a>

    @can('get', \App\User::class)
    <a class="btn rounded-circle text-white btn-danger mr-1" href="javascript:void(0)"
        onClick="blockDetails('{{ $service->id }}')" title="Bloqueo">
        <i class="fa fa-fw fa-key"></i>
    </a>
    @endcan --}}

    {{-- <a class="btn rounded-circle text-white btn-dark mr-1" href="javascript:void(0)" onClick="addTecnicoModal('{{ $service->id }}')"
    title="add tecnico">
    <i class="fa fa-fw fa-user"></i>
    </a>

    <a href="javascript:void(0)" class=" btn rounded-circle text-white btn-primary mr-1" data-toggle="modal"
        data-placement="top" data-target="#modalsms" title="sms">
        <i class="fa fa-fw fa-sms"></i>
    </a> --}}

</div>

<div class="container-custom container">
    <ul class="tabs card-body">
        <li class="item-custom text-center active-custom">Contracto</li>
        <li class="item-custom text-center">Arrendatario</li>
        <li class="item-custom text-center">Inmueble</li>
        <li class="item-custom text-center">Propietario</li>
        <li class="item-custom text-center">Descuentos</li>
        <li class="item-custom text-center">Pagos recibidos</li>
        <li class="item-custom text-center">Pagos realizados</li>
        <li class="item-custom text-center">Pendientes</li>
    </ul>

    <div class="panels">

        <div class=" panels-item  active-panels">
            @include('contrato.tabs.contrato')
        </div>

        <div class=" panels-item ">
            @include('contrato.tabs.arrendatario')
        </div>

        <div class=" panels-item ">
            @include('contrato.tabs.inmueble')
        </div>

        <div class=" panels-item ">
            @include('contrato.tabs.propietario')
        </div>

        <div class=" panels-item ">
            @include('contrato.partials.descuentos')
        </div>

        <div class=" panels-item ">
            @include('contrato.partials.recibidos')
        </div>
        <div class=" panels-item ">
            @include('contrato.partials.realizados')
        </div>
        <div class=" panels-item ">
            @include('contrato.partials.pendientes')
        </div>

    </div>

</div>


{{-- @include('admin.evidencias.partials.formEvidenciaRegister')
@include('admin.services.historias.formRegister')
@include('admin.sms.sms')
@include('admin.services.partials.addTecnico')
@include('admin.services.partials.printer')
@include('admin.services.partials.minus')
@include('admin.services.partials.plus')
@include('admin.services.partials.dinero') --}}


@stop
@push('scripts')
<script src="{{ asset('/apis/otros.js') }}"></script>
<script src="{{ asset('/apis/contratoShow.js') }}"></script>
<script src="{{ asset('/apis/descuentos.js') }}"></script>
<script src="{{ asset('/apis/realizado.js') }}"></script>
<script src="{{ asset('/apis/recibido.js') }}"></script>
<script src="{{ asset('/apis/pendiente.js') }}"></script>

{{-- <script>
 const contrato = @JSON($contrato)
window.onload = () => {
<script src="{{ asset('/apis/addtecnicoToService.js') }}">
</script>
<script src="{{ asset('/apis/evidenciaCarga.js') }}"></script>
<script src="{{ asset('/apis/updateCliente.js') }}"></script>
<script src="{{ asset('/apis/updateEquipo.js') }}"></script>
<script src="{{ asset('/apis/showService.js') }}"></script>
<script src="{{ asset('/apis/updateService.js') }}"></script>
<script src="{{ asset('/apis/apiHistoria.js') }}"></script>
<script src="{{ asset('/apis/apiEvidencia.js') }}"></script>
<script src="{{ asset('/apis/apiDinero.js') }}"></script>
<script src="{{ asset('/apis/apiAdicional.js') }}"></script>
<script src="{{ asset('/apis/apiGasto.js') }}"></script>
<script src="{{ asset('/apis/apiAccesorio.js') }}"></script>
<script src="{{ asset('/apis/printService.js') }}"></script>
<script src="{{ asset('/apis/sms.js') }}"></script>
<script src="{{ asset('/apis/mensajes.js') }}"></script>
<script src="{{ asset('/apis/validaciones.js') }}"></script>
<script src="{{ asset('/apis/miniHistoria.js') }}"></script>
}
</script> --}}

@endpush