@extends('layouts.app')
<!doctype html>
<html lang="{{ app()->getLocale() }}">
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>Oficina5</title>

        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
        <!-- Fonts -->
        <link href="https://fonts.googleapis.com/css?family=Raleway:100,600" rel="stylesheet" type="text/css">

        <!-- Styles -->
        <style>
            html, body {
                background-color: #fff;
                color: #636b6f;
                font-family: 'Raleway', sans-serif;
                font-weight: 100;
                height: 100vh;
                margin: 0;
            }

            .full-height {
                height: 100vh;
            }

            .flex-center {
                align-items: center;
                display: flex;
                justify-content: center;
            }

            .position-ref {
                position: relative;
            }

            .top-right {
                position: absolute;
                right: 10px;
                top: 18px;
            }

            .content {
                text-align: center;
            }

            .title {
                font-size: 84px;
            }

            .links > a {
                color: #636b6f;
                padding: 0 25px;
                font-size: 12px;
                font-weight: 600;
                letter-spacing: .1rem;
                text-decoration: none;
                text-transform: uppercase;
            }

            .m-b-md {
                margin-bottom: 30px;
            }
        </style>
    </head>
<body id="welcome-home">
    <div class="flex-center position-ref full-height">
        @if (Route::has('login'))
            <div class="top-right links">
                @auth
                    <a href="{{ url('/contatos') }}">Pagina Inicial</a>
                @endauth
            </div>
        @endif

    <div class="content">
        <div class="col-md-12 text-md-center" id="titulo-pagina-inicial">
            <h1>Bem vindo a sua agenda virtual</h1>
            <a class="col-md-1" id="logar-botao">Logar</a>            
        </div>                
    <div id="login" class="container">
        <div class="row justify-content-center">
            <div class="col-md-4 bloco-login">
                <div class="card">
                    <div class="card-body">
                        <form method="POST" action="{{ route('login') }}">
                            @csrf
                            <p>Já possui uma conta? Então faça o login!</p>
                            <div class="form-group">
                                <div id="label-form">
                                    <label for="email" class="col-sm-12 col-form-label text-md-left">{{ __('E-Mail') }}</label>
                                </div>
                                <div class="col-sm-12">
                                    <input id="email" type="email" class="form-control{{ $errors->has('email') ? ' is-invalid' : '' }}" name="email" value="{{ old('email') }}" required autofocus>

                                    @if ($errors->has('email'))
                                        <span class="invalid-feedback">
                                            <strong>{{ $errors->first('email') }}</strong>
                                        </span>
                                    @endif
                                </div>
                            </div>

                            <div class="form-group">
                                <label for="password" class="col-sm-12 col-form-label text-md-left">{{ __('Senha') }}</label>

                                <div class="col-sm-12">
                                    <input id="password" type="password" class="form-control{{ $errors->has('password') ? ' is-invalid' : '' }}" name="password" required>

                                    @if ($errors->has('password'))
                                        <span class="invalid-feedback">
                                            <strong>{{ $errors->first('password') }}</strong>
                                        </span>
                                    @endif
                                </div>
                            </div>

                            <div class="form-group">
                                <div class="col-sm-12 text-md-left">
                                    <div class="checkbox">
                                        <label>
                                            <input type="checkbox" name="remember" {{ old('remember') ? 'checked' : '' }}> {{ __('Lembrar de mim') }}
                                        </label>
                                    </div>
                                </div>
                            </div>

                            <div class="form-group" id="login-registrar">
                                <div class="col-sm-12 text-md-left">
                                    <div class="login-registrar-bloco col-md-3">
                                    <button type="submit" class="btn btn-primary">
                                        {{ __('Logar') }}
                                    </button>
                                    </div>
                                    <div class="login-registrar-bloco col-md-9">
                                        <p>Não possui conta? <a href="{{route('register')}}">Registre-se!</a></p>
                                    </div>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
</div>
</body>
</html>
<script> 
$(document).ready(function(){
    $("#logar-botao").click(function(){
        $("#titulo-pagina-inicial").animate({top: '50px'});
        $("#logar-botao").css('display', 'none');
        $("#login").animate({left: '0px'});        
    });
});
</script> 