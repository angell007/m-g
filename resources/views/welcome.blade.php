<!DOCTYPE HTML>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="author" content="Bootstrap-ecommerce by Vosidiy">

    <title>Home Page - Shopper</title>

    <link rel="shortcut icon" type="image/x-icon" href="images/favicon.ico">

    <!-- jQuery -->
    <script src="{{asset('js/jquery.min.js')}}" type="text/javascript"></script>

    <!-- Bootstrap4 files-->
    <script src="{{asset('templatejs/bootstrap.bundle.min.js')}} " type="text/javascript"></script>
    <link href="{{ asset('templatecss/bootstrap.css?v=1.0')}}" rel="stylesheet" type="text/css" />

    <!-- Font awesome 5 -->
    <link href="{{ asset('fonts/fontawesome/css/fontawesome-all.min.css')}}" type="text/css" rel="stylesheet">

    <!-- plugin: fancybox  -->
    <script src="plugins/fancybox/fancybox.min.js" type="text/javascript"></script>
    <link href="{{ asset('plugins/fancybox/fancybox.min.css')}}" type="text/css" rel="stylesheet">

    <!-- plugin: owl carousel  -->
    <link href="{{ asset('plugins/owlcarousel/assets/owl.carousel.min.css')}} " rel="stylesheet">
    <link href="{{ asset('plugins/owlcarousel/assets/owl.theme.default.css')}} " rel="stylesheet">
    <script src="{{asset('plugins/owlcarousel/owl.carousel.min.js')}} "></script>

    <!-- custom style -->
    <link href="{{ asset('templatecss/ui.css?v=1.0')}} " rel="stylesheet" type="text/css" />
    <link href="{{ asset('templatecss/responsive.css')}} " rel="stylesheet"
        media="only screen and (max-width: 1200px)" />

    <style>
        .carousel-item {
            height: 100vh;
            min-height: 350px;
            background: no-repeat center center scroll;
            -webkit-background-size: cover;
            -moz-background-size: cover;
            -o-background-size: cover;
            background-size: cover;
        }
    </style>

</head>


<style type="text/css">
    img.wp-smiley,
    img.emoji {
        display: inline !important;
        border: none !important;
        box-shadow: none !important;
        height: 1em !important;
        width: 1em !important;
        margin: 0 .07em !important;
        vertical-align: -0.1em !important;
        background: none !important;
        padding: 0 !important;
    }
</style>

<link rel="stylesheet" id="epl-front-styles-css" href="{{asset('css/style-front.css')}}" type="text/css" media="all">
<link rel="stylesheet" id="renter-theme-css" href="{{asset('css/theme.css?')}}" type="text/css" media="all">

</head>

<body class="home page page-id-2 page-template-default tm-isblog wp-front_page wp-page wp-page-2 kc-css-system default">
    <div class="ag-page-wrapp">
        <div class="tm-nav-absolute ">
            <div id="tm-toolbar">
                <div class="uk-container uk-container-center">
                    <div class="tm-toolbar uk-clearfix uk-hidden-small">

                        <div class="uk-float-right">
                            <div class="uk-panel widget_text">
                                <p class="uk-float-left uk-margin-large-right"
                                    style="font-weight:bolder; font-size:1.2em">317-260-3279</p>
                                <p class=" uk-float-left" href="mailto:alex1278@list.ru"
                                    style="font-weight:bolder;  font-size:1.2em">
                                    email.esta@gmail.com</p>
                            </div>
                        </div>

                    </div>
                </div>
            </div>


            <div class="uk-position-z-index tm-nav-absolute ">
                <div class="uk-sticky-placeholder" style="height: 83px; margin: 0px;">
                    <div class="tm-menu-box"
                        data-uk-sticky="{top:-800,showup:true, animation: 'uk-animation-slide-top'}"
                        style="margin: 0px;">

                        <div class="uk-container uk-container-center">

                            <nav class="navbar navbar-expand-lg navbar-light bg-light rounded   pl-2">
                                <a class="navbar-brand  home-active  justify-content-center text-center" href="#">
                                    <img src="{{asset('images/Inmobiliariamyg.png')}}" style="height:3em; width: 5em"
                                        alt="">
                                    <h6 style="font-size: 0.7em; font-weight:bolder">
                                        Inmobiliaria M&G propiedad raiz
                                    </h6>
                                </a>

                                <button class="navbar-toggler" type="button" data-toggle="collapse"
                                    data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent"
                                    aria-expanded="false" aria-label="Toggle navigation">
                                    <span class="navbar-toggler-icon"></span>
                                </button>

                                <div class="collapse navbar-collapse" id="navbarSupportedContent">
                                    <ul class="navbar-nav mr-auto">
                                        <li class="nav-item active">
                                            <a class="nav-link" href="#" style="font-size: 1.2em">Home </a>
                                        </li>
                                        <li class="nav-item">
                                            <a class="nav-link" href="#" style="font-size: 1.2em">Quienes Somos</a>
                                        </li>
                                        <li class="nav-item dropdown">
                                            <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown"
                                                role="button" data-toggle="dropdown" aria-haspopup="true"
                                                aria-expanded="false" style="font-size: 1.2em">
                                                Otros Servicios
                                            </a>
                                            <div class="dropdown-menu" aria-labelledby="navbarDropdown">
                                                <a class="dropdown-item" href="#">Servicio 1</a>
                                                <a class="dropdown-item" href="#">Servicio 2</a>
                                                <div class="dropdown-divider"></div>
                                                <a class="dropdown-item" href="#">Servicio 3</a>
                                            </div>
                                        </li>
                                </div>
                                </ul>

                                <section class="card p-2 mx-3">
                                    <a href="#" class="icontext" data-toggle="dropdown" id="nav">
                                        <div class="icon-wrap icon-xs bg2 round text-secondary"><i
                                                class="fa fa-user"></i>
                                        </div>
                                        <div class="text-wrap">
                                            <span class="text-dark">Inicia Session <i
                                                    class="fa fa-caret-down"></i></span>
                                        </div>
                                    </a>

                                    <div class="dropdown-menu" aria-labelledby="nav">
                                        <div class="card-body">
                                            <div class="text-center">

                                                <h1 class="h4 text-gray-900 mb-4">Bienvenido a
                                                    Inmobiliaria M&G</h1>
                                            </div>

                                            <form class="user" method="POST" action="{{ route('login') }}">
                                                @csrf

                                                <div class="form-group">

                                                    <input type="email" name="email" class="form-control"
                                                        id="exampleInputEmail" aria-describedby="emailHelp"
                                                        placeholder="Ingresa Email ">

                                                    @error('email')
                                                    <span class="invalid-feedback" role="alert">
                                                        <strong>{{ $message }}</strong>
                                                    </span>
                                                    @enderror



                                                </div>
                                                <div class="form-group">
                                                    <input type="password" name="password" class="form-control"
                                                        id="exampleInputPassword" placeholder="Contraseña">

                                                    @error('password')
                                                    <span class="invalid-feedback" role="alert">
                                                        <strong>{{ $message }}</strong>
                                                    </span>
                                                    @enderror

                                                </div>

                                                <div class="form-group">
                                                    <div class="custom-control custom-checkbox small"
                                                        style="line-height: 1.5rem;">
                                                        <input type="checkbox" class="custom-control-input"
                                                            id="customCheck">
                                                        <label class="custom-control-label" for="customCheck">Recuerdame
                                                        </label>
                                                    </div>
                                                </div>

                                                <div class="form-group">

                                                    <button type="submit" class="btn btn-primary btn-block">
                                                        {{ __('Log in') }}
                                                    </button>

                                                </div>

                                                <hr>
                                                <a href="index.html" class="btn btn-google btn-block">
                                                    <i class="fab fa-google fa-fw"></i> Login con
                                                    Google
                                                </a>
                                                <a href="index.html" class="btn btn-facebook btn-block">
                                                    <i class="fab fa-facebook-f fa-fw"></i> Login
                                                    con Facebook
                                                </a>
                                            </form>
                                            <hr>

                                            <div class="text-center">
                                                <a class="font-weight-bold small" href="register.html">Crea
                                                    una cuenta!</a>
                                            </div>

                                        </div>
                                    </div>
                                </section>

                            </nav>
                        </div>

                    </div>
                </div>
            </div>
        </div>




        <section id="tm-top-fullscreen" class="tm-fullscreen-box">
            <div class=" widget_ang-property-slideshow">
                <div
                    class="ang-megaslideshow-wrapper ang-property-slideshow-wrapper ang-search-absolute uk-position-relative">
                    <div class="ang-slideshow-descr">
                        <div class="uk-width-1-1 tm-widget-descr">
                            <div class="uk-container uk-container-center uk-text-left uk-hidden-small">
                                <!-- Widget Shortcode -->
                                <div id="ang_epl_property_search-5" class="widget widget_ang_epl_property_search p-5">
                                    <div class="ang-search-wrapper">
                                        <ul class="epl-search-tabs property_search-tabs epl-search-slim">
                                            <li class="epl-sb-current">
                                                Encuentra tu Hogar
                                            </li>
                                        </ul>
                                        <div class="epl-search-forms-wrapper epl-search-slim">

                                            <form class="form-inline my-2 my-lg-0">
                                                <input class="form-control mr-sm-2" type="search" placeholder="Search">
                                                <button class="btn btn-outline-success my-2 my-sm-0"
                                                    type="submit">Search</button>
                                            </form>

                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="akslider-module">
                        <div class="uk-slidenav-position"
                            data-uk-slideshow="{height: 'auto', animation: 'random-fx', duration: '1500', autoplayInterval: '15000', autoplay: true, kenburns: false, pauseOnHover: false}">
                            <ul class="uk-slideshow uk-overlay-active" style="height: 667px;">

                                <li class="uk-cover uk-height-viewport post-1837 post_type-commercial_land   count-1 uk-active"
                                    aria-hidden="false" style="height: 667px;">
                                    <div class="uk-cover-background uk-position-cover"
                                        style="background-image: url({{asset('imagenes/m3.jpg')}});">
                                    </div>
                                    <canvas width="2048" height="1473"
                                        style="width: 100%; height: auto; opacity: 0;"></canvas>
                                    <div
                                        class="uk-overlay-panel uk-overlay-background uk-overlay-fade uk-height-1-1 uk-vertical-align uk-padding-remove">

                                        <div class="uk-vertical-align-middle uk-text-center uk-width-1-1">
                                            <div class="uk-container uk-container-center uk-text-left">
                                                <div class="uk-width-small-1-2">

                                                    <div class="uk-clearfix">
                                                        <h3 class="uk-h3 slide-head-2 tm-slide-style-2 uk-float-left uk-scrollspy-init-inview uk-scrollspy-inview uk-animation-slide-left"
                                                            data-uk-scrollspy="{cls:'uk-animation-slide-left'}">
                                                            <a class=""
                                                                href="http://w-renter.torbara.com/?commercial_land=10-viktualienmarkt-bavaria-2-copy">
                                                                Apartamento Modelo </a>
                                                        </h3>
                                                    </div>
                                                    <div class="uk-clearfix">
                                                        <h5 class="ang-slider-address uk-h6 slide-head-2 tm-slide-style-2 uk-float-left ang-anim-duration-1-5 uk-scrollspy-init-inview uk-scrollspy-inview uk-animation-slide-right"
                                                            data-uk-scrollspy="{cls:'uk-animation-slide-right'}"><i
                                                                class="map-marker"></i> <span
                                                                class="item-street text-white">Barrio colombia</span>
                                                            <span class="entry-title-sub">
                                                    </div>
                                                    <div class="uk-clearfix">
                                                        <h5 class="ang-slider-price rounded uk-float-left slide-head-2 tm-slide-style-2 uk-scrollspy-init-inview uk-scrollspy-inview uk-animation-slide-left"
                                                            data-uk-scrollspy="{cls:'uk-animation-slide-left'}"><span
                                                                class="page-price"><span class="page-price-prefix">Ver
                                                                    mas</span></span></h5>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
        </section>

        <div class="w-100"></div>

        <!-- ========================= SECTION MAIN END// ========================= -->
        <!-- ========================= Blog ========================= -->
        <section class="section-content padding-y-sm bg">
            <div class="container">
                <header class="section-heading heading-line">
                    <h4 class="title-section bg">Categorias</h4>
                </header>
                <div class="row">
                    <div class="col-md-2">
                        <div class="card-banner" style="height:250px; background-image: url('images/posts/2.jpg');">
                            <article class="overlay overlay-cover d-flex align-items-center justify-content-center">
                                <div class="text-center">
                                    <h5 class="card-title text-white">Apartamentos</h5>
                                    <a href="#" class="btn btn-warning btn-sm"> View All </a>
                                </div>
                            </article>
                        </div>
                    </div>

                    <div class="col-md-3">
                        <div class="card-banner" style="height:250px; background-image: url('images/posts/2.jpg');">
                            <article class="overlay overlay-cover d-flex align-items-center justify-content-center">
                                <div class="text-center">
                                    <h5 class="card-title text-white">Amoblados</h5>
                                    <a href="#" class="btn btn-warning btn-sm"> View All </a>
                                </div>
                            </article>
                        </div>
                    </div>

                    <div class="col-md-2">
                        <div class="card-banner" style="height:250px; background-image: url('images/posts/2.jpg');">
                            <article class="overlay overlay-cover d-flex align-items-center justify-content-center">
                                <div class="text-center">
                                    <h5 class="card-title text-white">Casas</h5>
                                    <a href="#" class="btn btn-warning btn-sm"> View All </a>
                                </div>
                            </article>
                        </div>
                        <!-- card.// -->
                    </div>
                    <div class="col-md-3">
                        <div class="card-banner" style="height:250px; background-image: url('images/posts/3.jpg');">
                            <article class="overlay overlay-cover d-flex align-items-center justify-content-center">
                                <div class="text-center">
                                    <h5 class="card-title text-white">Bodegas</h5>
                                    <a href="#" class="btn btn-warning btn-sm"> View All </a>
                                </div>
                            </article>
                        </div>
                        <!-- card.// -->
                    </div>

                    <div class="col-md-2">
                        <div class="card-banner" style="height:250px; background-image: url('images/posts/3.jpg');">
                            <article class="overlay overlay-cover d-flex align-items-center justify-content-center">
                                <div class="text-center">
                                    <h5 class="card-title text-white">Locales</h5>
                                    <a href="#" class="btn btn-warning btn-sm"> View All </a>
                                </div>
                            </article>
                        </div>
                        <!-- card.// -->
                    </div>

                </div>
            </div>
        </section>
        <!-- ========================= Blog .END// ========================= -->

        <!-- ========================= SECTION CONTENT ========================= -->
        <section class="section-content padding-y-sm bg">
            <div class="container">

                <header class="section-heading heading-line">
                    <h4 class="title-section bg">Recientemente agregados</h4>
                </header>
                <div class="row">

                    @foreach ($nuevos as $inmueble)
                    <div class="col-md-4">
                        <figure class="card card-product">
                            <div class="img-wrap"><img src="{{asset('file/'.$inmueble->portada)}}">
                            </div>
                            <figcaption class="info-wrap">

                                <h4 class="title text-uppercase tex-center my-2">{{$inmueble->tipo}}</h4>
                                <div class="label-rating">Cod: xxx {{$inmueble->codigo}} </div>
                                <hr>

                                <div class="label-rating"><i class="fa fa-map-marker" aria-hidden="true"></i>
                                    Dpto: {{$inmueble->departamento}} </div>
                                <div class="label-rating"><i class="fa fa-map-marker" aria-hidden="true"></i>
                                    Ciudad: {{$inmueble->ciudad}} </div>
                                <div class="label-rating"><i class="fa fa-map-marker" aria-hidden="true"></i>
                                    Direccion: {{$inmueble->direccion}} </div>

                                <p class="desc">{{$inmueble->descripcion}}</p>
                                <div class="rating-wrap">
                                    <ul class="rating-stars">
                                        <li style="width:80%" class="stars-active">
                                            <i class="fa fa-star"></i><i class="fa fa-star"></i><i
                                                class="fa fa-star"></i><i class="fa fa-star"></i><i
                                                class="fa fa-star"></i>
                                        </li>
                                        <li>
                                            <i class="fa fa-star"></i><i class="fa fa-star"></i><i
                                                class="fa fa-star"></i><i class="fa fa-star"></i><i
                                                class="fa fa-star"></i>
                                        </li>
                                    </ul>
                                    <hr>

                                    @if ($inmueble->tipo != 'local' && $inmueble->tipo != 'bodega')
                                    <div class="label-rating"><i class="fa fa-bed" aria-hidden="true"></i>
                                        {{$inmueble->habitaciones}} Habitaciones</div>
                                    @endif
                                </div>
                                <div class="label-rating"><i class="fa fa-bath" aria-hidden="true"></i>
                                    {{$inmueble->habitaciones}} Baños</div>
                                <div class="label-rating"><i class="fa fa-car" aria-hidden="true"></i>
                                    {{$inmueble->parqueadero}} </div>

                                <!-- rating-wrap.// -->
                            </figcaption>
                            <div class="bottom-wrap">
                                <a href="" class="btn btn-sm btn-primary float-right">ver mas</a>
                                <div class="price-wrap h5">

                                    <span class="price-new">

                                        {{($inmueble->proposito == 'arrendamiento') ? 'Canon :  $' . number_format($inmueble->canon, 0 , ',', ' .')  : 'Precio :  $' . number_format($inmueble->precio, 2, ',', '.')   }}</span>


                                    {{-- <del class="price-old">$1980</del> --}}
                                </div>
                                <!-- price-wrap.// -->
                            </div>
                            <!-- bottom-wrap.// -->
                        </figure>
                    </div>

                    @endforeach

                </div>
                <!-- row.// -->

            </div>
            <!-- container .//  -->
        </section>

        <!-- ========================= SECTION ITEMS ========================= -->
        <section class="section-request bg padding-y-sm">
            <div class="container">
                <header class="section-heading heading-line">
                    <h4 class="title-section bg text-uppercase">Nuestros Inmuebles</h4>
                </header>
                <div class="row">

                    <aside class="col-sm-3">

                        <div class="card card-filter">
                            <article class="card-group-item">
                                <header class="card-header">
                                    <a class="" aria-expanded="true" href="#" data-toggle="collapse"
                                        data-target="#collapse22">
                                        <i class="icon-action fa fa-chevron-down"></i>
                                        <h6 class="title">Por Categoria</h6>
                                    </a>
                                </header>
                                <div class="filter-content collapse " id="collapse22">
                                    <div class="card-body">
                                        <form class="pb-3">
                                            <div class="input-group">
                                                <input class="form-control" placeholder="Search" type="text">
                                                <div class="input-group-append">
                                                    <button class="btn btn-primary" type="button"><i
                                                            class="fa fa-search"></i></button>
                                                </div>
                                            </div>
                                        </form>

                                        <ul class="list-unstyled list-lg">
                                            <li><a href="#">Cras justo odio <span
                                                        class="float-right badge badge-light round">142</span> </a></li>
                                            <li><a href="#">Dapibus ac facilisis <span
                                                        class="float-right badge badge-light round">3</span> </a></li>
                                            <li><a href="#">Morbi leo risus <span
                                                        class="float-right badge badge-light round">32</span> </a></li>
                                            <li><a href="#">Another item <span
                                                        class="float-right badge badge-light round">12</span> </a></li>
                                        </ul>
                                    </div>
                                    <!-- card-body.// -->
                                </div>
                                <!-- collapse .// -->
                            </article>
                            <!-- card-group-item.// -->
                            <article class="card-group-item">
                                <header class="card-header">
                                    <a href="#" data-toggle="collapse" data-target="#collapse33">
                                        <i class="icon-action fa fa-chevron-down"></i>
                                        <h6 class="title">Por precio </h6>
                                    </a>
                                </header>
                                <div class="filter-content collapse" id="collapse33">
                                    <div class="card-body">
                                        <input type="range" class="custom-range" min="0" max="100" name="">
                                        <div class="form-row">
                                            <div class="form-group col-md-6">
                                                <label>Min</label>
                                                <input class="form-control" placeholder="$0" type="number">
                                            </div>
                                            <div class="form-group text-right col-md-6">
                                                <label>Max</label>
                                                <input class="form-control" placeholder="$1,0000" type="number">
                                            </div>
                                        </div>
                                        <!-- form-row.// -->
                                        <button class="btn btn-block btn-outline-primary">Apply</button>
                                    </div>
                                    <!-- card-body.// -->
                                </div>
                                <!-- collapse .// -->
                            </article>
                            <!-- card-group-item.// -->
                            <article class="card-group-item">
                                <header class="card-header">
                                    <a href="#" data-toggle="collapse" data-target="#collapse44">
                                        <i class="icon-action fa fa-chevron-down"></i>
                                        <h6 class="title">Por caracteristicas</h6>
                                    </a>
                                </header>
                                <div class="filter-content collapse show" id="collapse44">
                                    <div class="card-body">
                                        <form>
                                            <label class="form-check">
                                                <input class="form-check-input" value="" type="checkbox">
                                                <span class="form-check-label">
                                                    <span class="float-right badge badge-light round">5</span> Amoblado
                                                </span>
                                            </label>
                                            <!-- form-check.// -->
                                            <label class="form-check">
                                                <input class="form-check-input" value="" type="checkbox">
                                                <span class="form-check-label">
                                                    <span class="float-right badge badge-light round">13</span> Mayor a
                                                    3
                                                    Habiataciones

                                                </span>
                                            </label>
                                            <!-- form-check.// -->
                                            <label class="form-check">
                                                <input class="form-check-input" value="" type="checkbox">
                                                <span class="form-check-label">
                                                    <span class="float-right badge badge-light round">12</span> Mayor a
                                                    2
                                                    Baños

                                                </span>
                                            </label>
                                            <!-- form-check.// -->
                                            <label class="form-check">
                                                <input class="form-check-input" value="" type="checkbox">
                                                <span class="form-check-label">
                                                    <span class="float-right badge badge-light round">32</span>
                                                    Parqueadero

                                                </span>
                                            </label>
                                            <!-- form-check.// -->
                                        </form>
                                    </div>
                                    <!-- card-body.// -->
                                </div>
                                <!-- collapse .// -->
                            </article>
                            <!-- card-group-item.// -->
                        </div>
                        <!-- card.// -->

                    </aside>
                    <!-- col.// -->
                    <!-- col // -->

                    @foreach ($inmuebles as $inmueble)

                    <div class="col-md-3">
                        <figure class="card card-product">
                            <div class="img-wrap"><img src="{{asset('file/'.$inmueble->portada)}}">
                            </div>
                            <figcaption class="info-wrap">

                                <h4 class="title text-uppercase tex-center my-2">{{$inmueble->tipo}}</h4>
                                <div class="label-rating">Cod: xxx {{$inmueble->codigo}} </div>
                                <hr>

                                <div class="label-rating"><i class="fa fa-map-marker" aria-hidden="true"></i>
                                    Dpto: {{$inmueble->departamento}} </div>
                                <div class="label-rating"><i class="fa fa-map-marker" aria-hidden="true"></i>
                                    Ciudad: {{$inmueble->ciudad}} </div>
                                <div class="label-rating"><i class="fa fa-map-marker" aria-hidden="true"></i>
                                    Direccion: {{$inmueble->direccion}} </div>

                                <p class="desc">{{$inmueble->descripcion}}</p>
                                <div class="rating-wrap">
                                    <ul class="rating-stars">
                                        <li style="width:80%" class="stars-active">
                                            <i class="fa fa-star"></i><i class="fa fa-star"></i><i
                                                class="fa fa-star"></i><i class="fa fa-star"></i><i
                                                class="fa fa-star"></i>
                                        </li>
                                        <li>
                                            <i class="fa fa-star"></i><i class="fa fa-star"></i><i
                                                class="fa fa-star"></i><i class="fa fa-star"></i><i
                                                class="fa fa-star"></i>
                                        </li>
                                    </ul>
                                    <hr>

                                    @if ($inmueble->tipo != 'local' && $inmueble->tipo != 'bodega')
                                    <div class="label-rating"><i class="fa fa-bed" aria-hidden="true"></i>
                                        {{$inmueble->habitaciones}} Habitaciones</div>
                                    @endif
                                </div>
                                <div class="label-rating"><i class="fa fa-bath" aria-hidden="true"></i>
                                    {{$inmueble->habitaciones}} Baños</div>
                                <div class="label-rating"><i class="fa fa-car" aria-hidden="true"></i>
                                    {{$inmueble->parqueadero}} </div>

                                <!-- rating-wrap.// -->
                            </figcaption>
                            <div class="bottom-wrap">
                                <a href="" class="btn btn-sm btn-primary float-right">ver mas</a>
                                <div class="price-wrap h5">

                                    <span class="price-new">

                                        {{($inmueble->proposito == 'arrendamiento') ? 'Canon :  $' . number_format($inmueble->canon, 0 , ',', ' .')  : 'Precio :  $' . number_format($inmueble->precio, 2, ',', '.')   }}</span>


                                    {{-- <del class="price-old">$1980</del> --}}
                                </div>
                                <!-- price-wrap.// -->
                            </div>
                            <!-- bottom-wrap.// -->
                        </figure>
                    </div>

                    @endforeach

                    <!-- col // -->
                </div>


            </div>
            <!-- container // -->
        </section>

        <!-- ========================= Subscribe ========================= -->
        <section class="section-subscribe bg-primary padding-y-lg">
            <div class="container">

                <p class="pb-2 text-center white">Delivering the latest product trends and industry news straight to
                    your
                    inbox</p>

                <div class="row justify-content-md-center">
                    <div class="col-lg-4 col-sm-6">
                        <form class="row-sm form-noborder">
                            <div class="col-8">
                                <input class="form-control" placeholder="Your Email" type="email">
                            </div>
                            <!-- col.// -->
                            <div class="col-4">
                                <button type="submit" class="btn btn-block btn-warning"> <i class="fa fa-envelope"></i>
                                    Subscribe </button>
                            </div>
                            <!-- col.// -->
                        </form>
                        <small class="form-text text-white-50">We’ll never share your email address with a third-party.
                        </small>
                    </div>
                    <!-- col-md-6.// -->
                </div>

            </div>
            <!-- container // -->
        </section>
        <!-- ========================= Subscribe .END// ========================= -->
        <!-- ========================= FOOTER ========================= -->
        <footer class="section-footer bg-dark white">
            <div class="container">
                <section class="footer-top padding-top">
                    <div class="row">
                        <aside class="col-sm-3 col-md-3 white">
                            <h5 class="title">Customer Services</h5>
                            <ul class="list-unstyled">
                                <li> <a href="#">Help center</a></li>
                                <li> <a href="#">Money refund</a></li>
                                <li> <a href="#">Terms and Policy</a></li>
                                <li> <a href="#">Open dispute</a></li>
                            </ul>
                        </aside>
                        <aside class="col-sm-3  col-md-3 white">
                            <h5 class="title">My Account</h5>
                            <ul class="list-unstyled">
                                <li> <a href="#"> User Login </a></li>
                                <li> <a href="#"> User register </a></li>
                                <li> <a href="#"> Account Setting </a></li>
                                <li> <a href="#"> My Orders </a></li>
                                <li> <a href="#"> My Wishlist </a></li>
                            </ul>
                        </aside>
                        <aside class="col-sm-3  col-md-3 white">
                            <h5 class="title">About</h5>
                            <ul class="list-unstyled">
                                <li> <a href="#"> Our history </a></li>
                                <li> <a href="#"> How to buy </a></li>
                                <li> <a href="#"> Delivery and payment </a></li>
                                <li> <a href="#"> Advertice </a></li>
                                <li> <a href="#"> Partnership </a></li>
                            </ul>
                        </aside>
                        <aside class="col-sm-3">
                            <article class="white">
                                <h5 class="title">Contacts</h5>
                                <p>
                                    <strong>Phone: </strong> +123456789
                                    <br>
                                    <strong>Fax:</strong> +123456789
                                </p>

                                <div class="btn-group white">
                                    <a class="btn btn-facebook" title="Facebook" target="_blank" href="#"><i
                                            class="fab fa-facebook-f  fa-fw"></i></a>
                                    <a class="btn btn-instagram" title="Instagram" target="_blank" href="#"><i
                                            class="fab fa-instagram  fa-fw"></i></a>
                                    <a class="btn btn-youtube" title="Youtube" target="_blank" href="#"><i
                                            class="fab fa-youtube  fa-fw"></i></a>
                                    <a class="btn btn-twitter" title="Twitter" target="_blank" href="#"><i
                                            class="fab fa-twitter  fa-fw"></i></a>
                                </div>
                            </article>
                        </aside>
                    </div>
                    <!-- row.// -->
                    <br>
                </section>
                <!-- //footer-top -->
            </div>
            <!-- //container -->
        </footer>

</body>

</html>