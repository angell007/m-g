@extends('layouts.galery')
@section('content')

<section class="section-request my-5 bg-white">
    <div class="container">
        <section class=" p-3">
            <h4 class="title-section text-uppercase font-weight-bold">
                
                <a type="button" href="javascript:history.back()"
                    class=" text-white tooltip-wrapper btn  btn-sm btn-success rounded-circle" title=""
                    data-original-title="Regresar">
                    <i class=" fa fa-reply " aria-hidden="true"></i>
                </a>
                Nuestros Inmuebles

            </h4>

            <header class="section-heading heading-line"></header>


            <form class="row d-flex justify-content-center  py-3" id="formFilter" action="{{route('filter')}}"
                method="Post">
                @csrf
                {{-- style="border: 1px solid rgb(200, 255, 0)"> --}}

                <article class=" col-md-3 card card-group-item">
                    <header class="card-header">

                        <h6 class="title">¿Buscas uno en especial?</h6>

                    </header>
                    <div class="filter-content  show" id="collapse44">
                        <div class="card-body">
                            <div class="input-group">
                                <input class="form-control" placeholder="Ingresa el codigo" type="text">
                                <div class="input-group-append">
                                    <button class="btn btn-primary" type="button"><i class="fa fa-search"></i></button>
                                </div>
                            </div>
                        </div>
                    </div>
                </article>

                <article class=" col-md-3 card card-group-item ">
                    <header class="card-header">
                        <h6 class="title">Por Categoria</h6>
                    </header>
                    <div class="filter-content  " id="collapse22">
                        <div class="card-body">
                            <select class="form form-control" name="tipo" id="selectTipo">
                                <option value="">Todos</option>
                                <option value="casa">Casas</option>
                                <option value="apartamento">Apartamentos</option>
                                <option value="bodega">Bodegas</option>
                                <option value="local">Locales</option>
                            </select>

                            <ul class="list-unstyled list-lg">
                                <li><a href="#">Casas <span class="float-right badge badge-light round">142</span>
                                    </a></li>
                                <li><a href="#">Apartamentos <span class="float-right badge badge-light round">3</span>
                                    </a></li>
                                <li><a href="#">Bodegas<span class="float-right badge badge-light round">32</span>
                                    </a></li>
                                <li><a href="#">Locales <span class="float-right badge badge-light round">12</span>
                                    </a></li>
                            </ul>

                        </div>
                        <!-- card-body.// -->
                    </div>
                </article>

                <article class=" col-md-3 card card-group-item">
                    <header class="card-header">

                        <h6 class="title">Por proposito </h6>

                    </header>
                    <div class="filter-content " id="collapse33">
                        <div class="card-body">

                            <div class="form-row my-3">
                                <label for="">Proposito</label>
                                <div class="form-group text-right col-md-8">
                                    <select class="form-control " name="proposito">
                                        <option value="arrendamiento">Alquilar</option>
                                        <option value="venta">Comprar</option>
                                    </select>
                                </div>
                            </div>

                            <input type="range" class="custom-range" min="0" max="500000000" id="range">
                            <div class="form-row">
                                <div class="form-group text-right col-md-12">
                                    <label>Max</label>
                                    <input class="form-control" placeholder="$1.0000" name="rango" type="text"
                                        id="valor">
                                </div>
                            </div>

                        </div>
                    </div>
                </article>

                <article class=" col-md-3 card card-group-item">
                    <header class="card-header">

                        <h6 class="title">Por caracteristicas</h6>

                    </header>
                    <div class="filter-content  show" id="collapse44">
                        <div class="card-body">

                            <div class="mb-3">
                                <div class="input-group">
                                    <div class="input-group-prepend">
                                        <span class="input-group-text" id="inputGroupPrepend3">Barrio</span>
                                    </div>
                                    <input type="text" class="form-control" id="validationServerUsername" placeholder=""
                                        aria-describedby="inputGroupPrepend3" name="barrio">
                                </div>
                            </div>

                            <label class="">
                                <span class=" ml-3  float-right">
                                    <select class="custom-select" name="habitaciones">
                                        <option value="">Sin importancia</option>
                                        <option value="1">1</option>
                                        <option value="2">2</option>
                                        <option value="3">3+</option>
                                    </select>
                                </span>
                                <span class="float-left ">
                                    Habitaciones
                                </span>
                            </label>


                            <label class="">
                                <span class=" ml-3  float-right">
                                    <select class="custom-select" name="baños">
                                        <option value="">1</option>
                                        <option value="">2</option>
                                        <option value="">3+</option>
                                    </select>
                                </span>
                                <span class="float-left ">
                                    Baños
                                </span>
                            </label>

                            <label class="form-check">
                                <input class="form-check-input" type="checkbox" name="amoblado">
                                <span class="form-check-label">
                                    <span class="float-right badge badge-light round"></span> Amoblado
                                </span>
                            </label>

                            <label class="form-check">
                                <input class="form-check-input" type="checkbox" name="parqueadero">
                                <span class="form-check-label">
                                    <span class="float-right badge badge-light round"></span> Parqueadero
                                </span>
                            </label>

                        </div>
                    </div>
                </article>


                <div class="w-100"></div>
                <article class="mx-2 my-5 card-group-item">
                    <input type="submit" class="btn btn-block btn-outline-primary" id="btnFilter" style="width: 200px"
                        href="#top">
                </article>
            </form>

        </section>
        <a name="top"></a>
        <div class="container">
            <div class="row" id="categorias"></div>
        </div>

        <div class="col-md-12">
            <nav aria-label="Page navigation example">
                <ul class="pagination justify-content-center pagination-lg" id="paginator">
                </ul>
            </nav>
        </div>
    </div>
</section>

@endsection
@push('scripts')

<script>
    let inmuebles =  @JSON($inmuebles)
</script>
<script src="{{asset('apis/buscador.js')}}"></script>
<script>
    document.getElementById('range').addEventListener('change', () => {
        document.getElementById('valor').value = new Intl.NumberFormat("es-ES").format(document.getElementById('range').value) 
    })

    document.getElementById('valor').addEventListener('change', () => {
        valor = parseFloat(document.getElementById('valor').value) 
        document.getElementById('valor').value = new Intl.NumberFormat("es-ES").format(valor)
    })

</script>

@endpush