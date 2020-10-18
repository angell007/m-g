@extends('layouts.app')
@section('content')

<!-- Row -->
<div class="row">


    <!-- DataTable with Hover -->
    <div class="col-lg-12">
        <div class="card mb-0 p-3">
            <div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
                <h6 class="mr-2 font-weight-bold text-primary ">
                    <div class="ml-auto d-flex align-items-center secondary-menu text-center m-2">

                        <a href="javascript:history.back()"
                            class="tooltip-wrapper btn-success text-white rounded-circle p-2 mr-1" title=""
                            data-original-title="Regresar">
                            <i class="mr-2 fa fa-reply " aria-hidden="true"></i>
                        </a>

                        Arrendatarios: Informe entre fechas
                    </div>
                </h6>
            </div>
            <form action="{{route('informes.arrendatarios')}}" method="post">
                <div class="row w-100">
                    @csrf

                    <div class="col-md-6">
                        <input type="text" class="form-control" id="min" name="min" placeholder="De:"
                            onfocus="(this.type='date')">
                    </div>
                    <div class="col-md-6">
                        <input type="text" class="form-control" id="max" name="max" placeholder="Hasta:"
                            onfocus="(this.type='date')">
                    </div>

                    <div class="col-md-6">
                        <select class="form-control" name="filtro" id="">
                            <option value=null>No Aplicar</option>
                            <option value="registrados">Registrados</option>
                            <option value="pendientes">Pendientes</option>
                            <option value="saldados">Saldados</option>
                        </select>
                    </div>


                    <div class="col text-center mt-3">
                        <button type="submit" class="btn btn-primary text-white ">Filtrar</button>
                    </div>

                </div>
            </form>
        </div>
    </div>
</div>

@stop

@push('scripts')
{{-- <script async src="{{ asset('/js/evalfecha.js') }}"></script> --}}
@endpush