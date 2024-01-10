<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Acesso | {{env('APP_NAME')}}</title>

    <!-- Google Font: Source Sans Pro -->
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">
    <!-- Font Awesome -->
    <link rel="stylesheet" href="{{asset('plugins/fontawesome-free/css/all.min.css')}}">
    <!-- icheck bootstrap -->
    <link rel="stylesheet" href="{{asset('plugins/icheck-bootstrap/icheck-bootstrap.min.css')}}">
    <!-- Theme style -->
    <link rel="stylesheet" href="{{asset('dist/css/adminlte.min.css')}}">
    <link rel="stylesheet" href="{{asset('assets/css/style-login.css')}}">
    <link rel="stylesheet" href="{{asset('dist/css/main.css')}}">

</head>
<body class="hold-transition login-page">
<div class="login-box">
    <!-- /.login-logo -->
    <div class="card" style="border-radius: 15px;">
        <div class="card-body login-card-body" style="border-radius: 15px;">
            <div class="login-logo">
                <img src="{{asset('assets/images/mateus.png')}}" class="img-fluid" alt="">
            </div>

                @if($errors->any())
                    <div class="alert alert-danger" role="alert">
                        <ul class="list">
                        @foreach ($errors->all() as $erro)
                            <li>{{$erro}}</li>
                        @endforeach
                        </ul>
                    </div>
                @endif
            
            
            <form action="{{route('login.store')}}" method="POST">
                @csrf
                <span class="login100-form-title">
                    Login
                </span>
                <p class="login-box-msg" style="font-size: 17px;">Informe seus dados de acesso</p>

                <div class="wrap-input100 validate-input" data-validate = "Valid email is: a@b.c">
                    <input class="input100" type="text" name="email">
                    <span class="focus-input100" data-placeholder="Email"></span>
                </div>

                <div class="wrap-input100 validate-input" data-validate="Enter password">
                    <span class="btn-show-pass">
                        <i class="fa-regular fa-eye"></i>
                    </span>
                    <input class="input100" type="password" name="password">
                    <span class="focus-input100" data-placeholder="Senha"></span>
                </div>

                <div class="container-login100-form-btn mt-0">
                    <div class="wrap-login100-form-btn">
                        <button class="login100-form-btn button">
                            Login
                        </button>
                    </div>
                </div>

                <div class="text-center mt-4">
                    <span>
                        Não tem uma conta?
                    </span>

                    <a href="{{ route('login.cadastro') }}">
                        Cadastre-se
                    </a>
                    <p class="mb-1 mt-3">
                        <a href="javascript:void(0)" id="recupera-senha" style="font-size: 17px;">Esqueci minha senha!</a> <br>
                        <div id="form-recupera-senha"></div>
                        <a href="javascript:void(0)" class="text-danger" id="cancela-recuperar-senha" style="display: none">Cancelar recuperação</a>
                    </p>
                </div>
            </form>
        </div>
    <!-- /.login-card-body -->
  </div>
</div>
<!-- /.login-box -->

<!-- jQuery -->
<script src="{{asset('plugins/jquery/jquery.min.js')}}"></script>
<!-- Bootstrap 4 -->
<script scr="{{asset('plugins/bootstrap/js/bootstrap.bundle.min.js')}}"></script>
<!-- AdminLTE App -->
<script src="{{asset('dist/js/adminlte.min.js')}}"></script>
<script src="{{ asset('dist/js/main.js') }}"></script>

    <script>
        $('#recupera-senha').click(function(){
            $('#cancela-recuperar-senha').show()
            $('#form-recupera-senha').html(`
                <form action="{{ route('resetasenha.sendmail') }}" method="POST">
                    @csrf 
                    <div class="input-group mb-3">
                        <input type="email" name='email' class="form-control" placeholder="Informe aqui o seu email" required>
                        <span class="input-group-append">
                            <button type="submite" class="btn btn" style="background-color: #0095d9; color:#ffffff;">RECUPERAR</button>
                        </span>
                    </div>
                </form>
            `)
        });

        $('#cancela-recuperar-senha').click(function(){
            $('#cancela-recuperar-senha').hide()
            $('#form-recupera-senha').html(``)
        });
    </script>
</body>
</html>
