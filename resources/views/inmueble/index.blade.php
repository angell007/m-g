@extends('layouts.app')
@section('content')

<div class="row  d-flex ">
    <!-- DataTable with Hover -->
    <div class="col-lg-12">
        <div class="card mb-0">
            <div class="card-header d-flex flex-row align-items-center justify-content-between">
                <div class="mr-auto align-items-center secondary-menu">
                    <h6 class="font-weight-bold text-primary ">
                        Inmuebles
                    </h6>

                    <a type="button" href="javascript:history.back()"
                        class=" text-white tooltip-wrapper btn  btn-success rounded-circle" title=""
                        data-original-title="Regresar">
                        <i class=" fa fa-reply " aria-hidden="true"></i>
                    </a>

                    <a type="button" href="javascript:void(0)"
                        class=" text-white tooltip-wrapper btn  btn-primary rounded-circle" data-toggle="modal"
                        data-placement="top" data-target="#modalInmuebleRegister" title="Nuevo Inmueble">
                        <i class="fa fa-fw fa-plus"></i>
                    </a>

                </div>
            </div>
            <div class="table-responsive ">
                <table class="table align-items-center table-flush table-hover" style="font-size: 0.8em"
                    id="TableInmuebles">
                    <thead class="thead">
                        <tr>
                           <th>Propietario</th>
                           <th>Direccion</th>
                           <th>Ciudad</th>
                           <th>Departamento</th>
                           <th>Tipo</th>
                           <th>Proposito</th>
                           <th>Habitaciones</th>
                           <th>Canon</th>
                           <th>Descripcion</th>
                            <th></th>
                        </tr>
                    </thead>
                    <tbody id="bodyTableInmuebles">
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>
<!--Row-->


@include('inmueble.partials.formUpdate')
@include('inmueble.partials.formRegister')
@include('inmueble.partials.formRegisterEquipoServicio')

@stop

@push('scripts')
<script src="{{ asset('/apis/inmuebledraw.js') }}"></script>
<script src="{{ asset('/apis/inmueble.js') }}"></script>
<script src="{{ asset('/apis/getPropietarios.js') }}"></script>
@endpush