@extends('layouts.app')
@section('content')

<div class="card mb-0">
    <div class="card-body  text-justify">
        <div class="ml-auto d-flex align-items-center secondary-menu text-center m-2">

            <a href="javascript:history.back()" class=" btn btn-sm rounded-circle text-white btn-success mr-1" title=""
                data-original-title="Regresar">
                <i class="fa fa-reply " aria-hidden="true"></i>
            </a>

            Registro de movimientos

        </div>

        <div class="row mx-auto text-center d-flex justify-content-center">
            <div class="form-group">
                <label class=" text-dark">Identificación Propietario</label>
                <div class="form-inline">
                    <input class="form-control form-control-sm mx-auto" autocomplete="off" id="identificacion">
                    <input type="submit" class="btn btn-outline-info btn-sm mx-auto" id="btnSearch"
                        value="Buscar Propietario">
                </div>
            </div>
        </div>

        <div id="blockFilter" style="display: none">
            <div class="row mx-auto text-center d-flex justify-content-center">
                <div class="form-group" id="selectContrato">
                    <div class="form-group mx-auto">
                        Seleccione Contrato
                        <select class="form-control form-control-sm" name="contrato" id="selectContratoVal">
                        </select>
                    </div>
                </div>

                <div class="form-group" id="filtrarContrato">
                    <div class="form-group mx-auto">
                        Acción
                        <div class="w-100"></div>
                        <input type="submit" class="btn btn-outline-info btn-sm" id="btngetData" value="Obtener datos">
                    </div>
                </div>

            </div>
        </div>

        <form class="form-row text-left col-md-12" id="formRegisterDescuento" method="Post"
            action="{{route('descuentos.store')}}">
            @csrf
        </form>

    </div>

    <div class="w-100"></div>

    <div class="mb-5">
        <div class="card-body  text-justify" id="descuentosDraw">
        </div>
    </div>
</div>



@stop
@push('scripts')
<script async src="{{ asset('/apis/getDataDescuento.js') }}"></script>
@endpush