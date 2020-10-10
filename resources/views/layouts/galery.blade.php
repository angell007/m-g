<!DOCTYPE HTML>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="author" content="Bootstrap-ecommerce by Vosidiy">

    <title>Inmobiliaria M&G</title>

    <link rel="shortcut icon" type="image/x-icon" href="images/favicon.ico">

    <!-- jQuery -->
    <script src="{{asset('js/jquery.min.js')}}" type="text/javascript"></script>

    <!-- Bootstrap4 files-->
    {{-- <link href="{{ asset('vendor/bootstrap/css/bootstrap.css')}}" rel="stylesheet" type="text/css"> --}}
    <link href="{{ asset('templatecss/bootstrap.css?v=1.0')}}" rel="stylesheet" type="text/css" />

    <script src="{{asset('templatejs/bootstrap.bundle.min.js')}} " type="text/javascript"></script>
    <!-- Font awesome 5 -->
    <link href="{{ asset('fonts/fontawesome/css/fontawesome-all.min.css')}}" type="text/css" rel="stylesheet">

    <!-- plugin: fancybox  -->
    <script src="{{asset('plugins/fancybox/fancybox.min.js')}}" type="text/javascript"></script>
    <link href="{{ asset('plugins/fancybox/fancybox.min.css')}}" type="text/css" rel="stylesheet">

    <!-- plugin: owl carousel  -->
    <link href="{{ asset('plugins/owlcarousel/assets/owl.carousel.min.css')}} " rel="stylesheet">
    <link href="{{ asset('plugins/owlcarousel/assets/owl.theme.default.css')}} " rel="stylesheet">
    <script src="{{asset('plugins/owlcarousel/owl.carousel.min.js')}} "></script>

    <!-- custom style -->
    <link href="{{ asset('templatecss/ui.css?v=1.0')}} " rel="stylesheet" type="text/css" />
    <link href="{{ asset('templatecss/responsive.css')}} " rel="stylesheet"
        media="only screen and (max-width: 1200px)" />

    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery.mask/1.14.15/jquery.mask.min.js"></script>

    <script src="{{asset('js/axios.min.js')}}"></script>

    <link href="https://cdnjs.cloudflare.com/ajax/libs/ekko-lightbox/5.3.0/ekko-lightbox.css" rel="stylesheet"
        type="text/css" />

    <script>
        let SITEURL = 'api'
        let ASSETURL = '../file'
        let SITEURLWEB = 'https://inmobiliaria.test'
    </script>

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

    .scroll-to-top {
        position: fixed;
        right: 1rem;
        bottom: 1rem;
        display: none;
        width: 2.75rem;
        height: 2.75rem;
        text-align: center;
        color: #fff;
        background: rgba(90, 92, 105, 0.5);
        line-height: 46px;
        transition: all 0.3s ease-in-out;
        -webkit-transition: all 0.3s ease-in-out;
    }

    .scroll-to-top:focus,
    .scroll-to-top:hover {
        color: white;
        transition: all 0.3s ease-in-out;
        -webkit-transition: all 0.3s ease-in-out;
    }

    .scroll-to-top:hover {
        background: #5a5c69;
        transition: all 0.3s ease-in-out;
        -webkit-transition: all 0.3s ease-in-out;
    }

    .scroll-to-top i {
        font-weight: 800;
    }
</style>

<link rel="stylesheet" id="epl-front-styles-css" href="{{asset('css/style-front.css')}}" type="text/css" media="all">
<link rel="stylesheet" id="renter-theme-css" href="{{asset('css/theme.css?')}}" type="text/css" media="all">

</head>

<body class="home page page-id-2 page-template-default tm-isblog wp-front_page wp-page wp-page-2 kc-css-system default">
    <a name="arriba"></a>
    <div class="ag-page-wrapp">

        <div class="uk-container uk-container-center">

            <div class="uk-container uk-container-center">

                <nav class="navbar navbar-expand-lg navbar-light rounded   pl-2" style="background-color:#f8f9fa">
                    <a class="navbar-brand  home-active  justify-content-center text-center" href="{{route('inicio')}}">
                        <img src="{{asset('images/Inmobiliariamyg.png')}}" style="height:3em; width: 5em" alt="">
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
                                <a class="nav-link" href="{{route('inicio')}}" style="font-size: 1.2em">Home </a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" href="{{route('nosotros')}}" style="font-size: 1.2em">Quienes
                                    Somos</a>
                            </li>
                            <li class="nav-item dropdown">
                                <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button"
                                    data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"
                                    style="font-size: 1.2em">
                                    Otros Servicios
                                </a>
                                <div class="dropdown-menu" aria-labelledby="navbarDropdown">
                                    <a class="dropdown-item" href="#">Avaluos</a>
                                    <a class="dropdown-item" href="#">Sucesiones</a>
                                    <div class="dropdown-divider"></div>
                                    <a class="dropdown-item" href="#">Tramites notariales</a>
                                </div>
                            </li>
                    </div>
                    </ul>

                    <section class="card p-2 mx-3">
                        <a href="#" class="icontext" data-toggle="dropdown" id="nav">
                            <div class="icon-wrap icon-xs bg2 round text-secondary"><i class="fa fa-user"></i>
                            </div>
                            <div class="text-wrap">
                                <span class="text-dark">Inicia Session <i class="fa fa-caret-down"></i></span>
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

                                        <input type="email" name="email" class="form-control" id="exampleInputEmail"
                                            aria-describedby="emailHelp" placeholder="Ingresa Email ">

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
                                        <div class="custom-control custom-checkbox small" style="line-height: 1.5rem;">
                                            <input type="checkbox" class="custom-control-input" id="customCheck">
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

        @yield('content')


        <div class="w-100"></div>

        <a class="scroll-to-top rounded" href="#arriba">
            <i class="fas fa-angle-up"></i>
        </a>

        <footer class="section-footer bg-primary white">
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

        <script src="{{asset('js/ekko-lightbox.js')}}"></script>
        <script>
            $(document).on('click', '[data-toggle="lightbox"]', function(event) {
                event.preventDefault();

                $(this).ekkoLightbox({
                alwaysShowClose: true,
                onShown: function() {
                    console.log('Checking our the events huh?');
                },
                // onNavigate: function(direction, itemIndex)
                    // console.log('Navigating '+direction+'. Current item: '+itemIndex);
                })
            });
        </script>

        @stack('scripts')

</body>

</html>