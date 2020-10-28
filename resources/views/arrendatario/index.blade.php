@extends('layouts.app')
@section('content')

<div class="row  d-flex ">
    <!-- DataTable with Hover -->
    <div class="col-lg-12">
        <div class="card mb-0">
            <div class="card-header d-flex flex-row align-items-center justify-content-between">
                <div class="mr-auto align-items-center secondary-menu">
                    <h6 class="font-weight-bold text-primary ">
                        Arrendatarios
                    </h6>

                    <a type="button" href="javascript:history.back()"
                        class=" text-white tooltip-wrapper btn  btn-sm btn-success rounded-circle" title=""
                        data-original-title="Regresar">
                        <i class=" fa fa-reply " aria-hidden="true"></i>
                    </a>

                    <a type="button" href="javascript:void(0)"
                        class=" text-white tooltip-wrapper btn  btn-sm btn-primary rounded-circle" data-toggle="modal"
                        data-placement="top" data-target="#modalArrendatarioRegister" title="Nuevo Arrendatario">
                        <i class="fa fa-fw fa-plus"></i>
                    </a>

                </div>
            </div>
            <div class="table-responsive ">
                <table class="table align-items-center table-flush table-hover" style="font-size: 0.8em"
                    id="TableArrendatarios">
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
                        <tr>
                            <td><input class="form-control form-control-sm" type="text" id="Searchnombre" name="nombre"></td>
                            <td><input class="form-control form-control-sm" type="text" id="Searchapellido" name="apellido"></td>
                            <td><input class="form-control form-control-sm" type="text" id="Searchemail" name="email"></td>
                            <td><input class="form-control form-control-sm" type="text" id="Searchdocuemento" name="docuemento"></td>
                            <td></td>
                            <td></td>
                            <td></td>
                        </tr>
                    </thead>
                    <tbody id="bodyTableArrendatarios">
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>
<!--Row-->


@include('arrendatario.partials.formUpdate')
@include('arrendatario.partials.formRegister')
@include('arrendatario.partials.formRegisterEquipoServicio')

@stop

@push('scripts')
<script src="{{ asset('/apis/general.js') }}"></script>
<script src="{{ asset('/apis/arrendatario.js') }}"></script>
<script src="{{ asset('/apis/arrendatarioFilter.js') }}"></script>
@endpush