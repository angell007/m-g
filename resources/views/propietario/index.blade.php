@extends('layouts.app')
@section('content')

<div class="row  d-flex ">
    <!-- DataTable with Hover -->
    <div class="col-lg-12">
        <div class="card mb-0">
            <div class="card-header d-flex flex-row align-items-center justify-content-between">
                <div class="mr-auto align-items-center secondary-menu">
                    <h6 class="font-weight-bold text-primary ">
                        Propietarios
                    </h6>

                    <a type="button" href="javascript:history.back()"
                        class=" text-white tooltip-wrapper btn  btn-success rounded-circle" title=""
                        data-original-title="Regresar">
                        <i class=" fa fa-reply " aria-hidden="true"></i>
                    </a>

                    <a type="button" href="javascript:void(0)"
                        class=" text-white tooltip-wrapper btn  btn-primary rounded-circle" data-toggle="modal"
                        data-placement="top" data-target="#modalPropietarioRegister" title="Nuevo Propietario">
                        <i class="fa fa-fw fa-plus"></i>
                    </a>

                </div>
            </div>
            <div class="table-responsive ">
                <table class="table align-items-center table-flush table-hover" style="font-size: 0.8em"
                    id="TablePropietarios">
                    <thead class="thead">
                        <tr>
                            <th>Nombre</th>
                            <th>Apellido</th>
                            <th>Email</th>
                            <th>Documento</th>
                            <th>Direccion</th>
                            <th>Telefono</th>
                            <th></th>
                        </tr>
                    </thead>
                    <tbody id="bodyTablePropietarios">
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>
<!--Row-->


@include('propietario.partials.formUpdate')
@include('propietario.partials.formRegister')
@include('propietario.partials.formRegisterEquipoServicio')

@stop

@push('scripts')
<script src="{{ asset('/apis/general.js') }}"></script>
<script src="{{ asset('/apis/propietario.js') }}"></script>
@endpush