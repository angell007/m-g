<head>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8">


    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">
    <link href="{{ asset('img/icon.png') }}" rel="icon">

    <!-- CSRF Token -->
    <meta name="csrf-token" id="csrf_token" content="{{ csrf_token() }}">

    <link href="img/logo/logo.png" rel="icon">
    <title>{{ config('app.name', 'Laravel') }}</title>
    <link href="{{ asset('vendor/fontawesome-free/css/all.min.css')}}" rel="stylesheet" type="text/css">
    <link href="{{ asset('vendor/bootstrap/css/bootstrap.css')}}" rel="stylesheet" type="text/css">
    <link href="{{ asset('css/ruang-admin.css')}}" rel="stylesheet">
    <link href="{{ asset('css/app.css')}}" rel="stylesheet">
    <script src="{{asset('js/axios.min.js')}}"></script>
    <link href="{{asset('css/toastr.min.css')}}" rel="stylesheet" type="text/css" />

    <link href="{{asset('css/custom.css')}}" rel="stylesheet" type="text/css" />

    {{-- <link href="https://cdnjs.cloudflare.com/ajax/libs/ekko-lightbox/5.3.0/ekko-lightbox.css" rel="stylesheet" --}}
        {{-- type="text/css" /> --}}


    <script>
        let SITEURL = 'api'
        let ASSETURL = '../file'
    </script>
    @stack('styles')
    <style>
        [type="file"] {
            height: 0;
            overflow: hidden;
            width: 0;
        }

        [type="file"]+label {
            background: #f15d22;
            border: none;
            border-radius: 5px;
            color: #fff;
            cursor: pointer;
            display: inline-block;
            font-family: 'Rubik', sans-serif;
            font-size: inherit;
            font-weight: 500;
            margin-bottom: 1rem;
            outline: none;
            padding: 1rem 50px;
            position: relative;
            -webkit-transition: all 0.3s;
            transition: all 0.3s;
            vertical-align: middle;
        }

        [type="file"]+label:hover {
            background-color: #77d30d;
        }

        [type="file"]+label.btn-1 {
            background-color: #9ae736;
            box-shadow: 0 6px #7af528;
            -webkit-transition: none;
            transition: none;
        }

        [type="file"]+label.btn-1:hover {
            box-shadow: 0 4px #7af528;
            top: 2px;
        }

        [type="file"]+label.btn-2 {
            background-color: #99c793;
            border-radius: 50px;
            overflow: hidden;
        }

        [type="file"]+label.btn-2::before {
            color: #fff;
            content: "\f382";
            font-family: "Font Awesome 5 Pro";
            font-size: 100%;
            height: 100%;
            right: 130%;
            line-height: 3.3;
            position: absolute;
            top: 0px;
            -webkit-transition: all 0.3s;
            transition: all 0.3s;
        }

        [type="file"]+label.btn-2:hover {
            background-color: #497f42;
        }

        [type="file"]+label.btn-2:hover::before {
            right: 75%;
        }

        [type="file"]+label.btn-3 {
            background-color: #ee6d9e;
            border-radius: 0;
            overflow: hidden;
        }

        [type="file"]+label.btn-3 span {
            display: inline-block;
            height: 100%;
            -webkit-transition: all 0.3s;
            transition: all 0.3s;
            width: 100%;
        }

        [type="file"]+label.btn-3::before {
            color: #fff;
            content: "\f382";
            font-family: "Font Awesome 5 Pro";
            font-size: 130%;
            height: 100%;
            left: 0;
            line-height: 2.6;
            position: absolute;
            top: -180%;
            -webkit-transition: all 0.3s;
            transition: all 0.3s;
            width: 100%;
        }

        [type="file"]+label.btn-3:hover {
            background-color: #ae144f;
        }

        [type="file"]+label.btn-3:hover span {
            -webkit-transform: translateY(300%);
            transform: translateY(300%);
        }

        [type="file"]+label.btn-3:hover::before {
            top: 0;
        }

        /* body {
            font-family: 'Literata', serif;
            font-size: 18px;
            line-height: 1.3;
            margin: 1rem 0;
            text-align: center;
        } */

        .wrapper {
            background-color: #fff;
            border-radius: 1rem;
            margin: 0 auto;
            max-width: 500px;
            padding: 2rem;
            width: 100%;
        }

        /* .footer {
            font-size: .8rem;
            margin-bottom: 0;
            margin-top: 3rem;
        } */

        /* h1,
        p {
            margin-bottom: 2rem;
        }

        h1 {
            font-family: 'Rubik', sans-serif;
            font-size: 1.7rem;
        }

        a {
            color: #31c1ef;
            text-decoration: none;
        }

        .minh-100 {
            height: 100vh;
        } */
    </style>
</head>