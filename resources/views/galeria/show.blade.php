@extends('layouts.galery')
@section('content')

<section class="section-request  bg-white">
    <div class="container">
        <section class=" ">
            <header class="section-heading heading-line">
                <h4 class="title-section text-uppercase font-weight-bold">Nuestros Inmuebles</h4>
            </header>

            <section class="row d-flex justify-content-center ">
                <div class=" col-md-12 col-sm-12">
                    <section class="section-content ">
                        <div class="container row">

                            <div class="col-md-6 col-sm-12 mb-3 m-0 p-0" id="leftShow"></div>

                                <aside class="col-sm-6 text-center">
                                    <section class="section-content padding-y-sm bg">
                                        <div class="container">
                                            <h4 class="title-section card py-2">Galeria</h4>
                                            <div class="row" id="rowGallery"></div>
                                            </div>
                                        </div>
                                    </section>

                                </aside>
                    </section>
                </div>
            </section>

            <div class="container">

                <header class="section-heading heading-line">
                    <h4 class="title-section text-uppercase font-weight-bold">Inmuebles que pueden interesarte</h4>
                </header>

                <div class="row" id="relacionados"></div>
            </div>


    </div>
</section>

@endsection
@push('scripts')
<script src="{{asset('apis/show.js')}}"></script>
@endpush