@extends('layouts.app')

@section('content')
<div class="row justify-content-center">
    <div class="col-xl-10 col-lg-12 col-md-9">
        <div class="card shadow-sm ">
            <div class="card-body p-0">
                <div class="row">
                    <div class="col-lg-12">
                        <div class="login-form">
                            <div class="text-center">
                                <h1 class="h4 text-gray-900 mb-4">Bienvenido a Inmobiliaria M&G</h1>
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
                                        <label class="custom-control-label" for="customCheck">Recuerdame </label>
                                    </div>
                                </div>

                                <div class="form-group">

                                    <button type="submit" class="btn btn-primary btn-block">
                                        {{ __('Log in') }}
                                    </button>

                                </div>

                                <hr>
                                <a href="index.html" class="btn btn-google btn-block">
                                    <i class="fab fa-google fa-fw"></i> Login con Google
                                </a>
                                <a href="index.html" class="btn btn-facebook btn-block">
                                    <i class="fab fa-facebook-f fa-fw"></i> Login con Facebook
                                </a>
                            </form>
                            <hr>
                            <div class="text-center">
                                <a class="font-weight-bold small" href="register.html">Crea una cuenta!</a>
                            </div>
                            <div class="text-center">
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection