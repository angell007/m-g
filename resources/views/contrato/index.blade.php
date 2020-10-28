@extends('layouts.app')
@section('content')

<div class="row  d-flex ">
    <!-- DataTable with Hover -->
    <div class="col-lg-12">
        <div class="card mb-0">
            <div class="card-header d-flex flex-row align-items-center justify-content-between">
                <div class="mr-auto align-items-center secondary-menu">
                    <h6 class="font-weight-bold text-primary ">
                        Contratos
                    </h6>

                    <a type="button" href="javascript:history.back()"
                        class=" text-white tooltip-wrapper btn btn-sm btn-success rounded-circle" title=""
                        data-original-title="Regresar">
                        <i class=" fa fa-reply " aria-hidden="true"></i>
                    </a>

                    <a type="button" href="javascript:void(0)"
                        class=" text-white tooltip-wrapper btn btn-sm btn-primary rounded-circle" data-toggle="modal"
                        data-placement="top" data-target="#modalContratoRegister" title="Nuevo Contrato">
                        <i class="fa fa-fw fa-plus"></i>
                    </a>

                </div>
            </div>
            <div class="table-responsive ">
                <table class="table align-items-center table-flush table-hover" style="font-size: 0.8em"
                    id="TableContratos">
                    <thead class="thead">
                        <tr>
                            <th>Inmueble</th>
                            <th>Arrendatario</th>
                            <th>Codigo</th>
                            <th>Fecha inicio</th>
                            <th>Fecha final</th>
                            <th>Prorrogado</th>
                            <th>Observaciones</th>
                            <th></th>
                        </tr>
                        {{-- <tr>

                            <th><input class="form-control form-control-sm" type="text" id="SearchInmueble" name="inmueble"></th>
                            <th><input class="form-control form-control-sm" type="text" id="SearchArrendatario" name="arrendatario"></th>
                            <th><input class="form-control form-control-sm" type="text" id="SearchCodigo" name="codigo"></th>
                            <th><input class="form-control form-control-sm" type="text" id="SearchInicio" name="inicio"></th>
                            <th><input class="form-control form-control-sm" type="text" id="SearchFinal" name="final"></th>
                            <th><input class="form-control form-control-sm" type="text" id="SearchProrrogado" name="prorrogado"></th>

                        </tr> --}}
                    </thead>
                    <tbody id="bodyTableContratos">
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>
<!--Row-->


@include('contrato.partials.formUpdate')
@include('contrato.partials.formRegister')

@stop

@push('scripts')
<script src="{{ asset('/apis/contratodraw.js') }}"></script>
<script src="{{ asset('/apis/contrato.js') }}"></script>
<script src="{{ asset('/apis/getArrendatarios.js') }}"></script>
<script src="{{ asset('/apis/getInmuebles.js') }}"></script>
<script src="{{ asset('/apis/customContrato.js') }}"></script>
<script src="{{ asset('/apis/contratoFilter.js') }}"></script>
@endpush