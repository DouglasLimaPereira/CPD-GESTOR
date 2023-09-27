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
    <link rel="stylesheet" href="{{asset('dist/css/util.css')}}">
    <link rel="stylesheet" href="{{asset('dist/css/main.css')}}">
</head>
<body class="hold-transition login-page">
<div class="login-box">
    
    <!-- /.login-logo -->
    <div class="card">
        <div class="login-logo">
            <img src="{{asset('assets/images/mateus.png')}}" class="img-fluid" alt="">
        </div>
        <div class="card-body login-card-body">
                @if($errors->any())
                    <div class="alert alert-danger" role="alert">
                        <ul class="list">
                        @foreach ($errors->all() as $erro)
                            <li>{{$erro}}</li>
                        @endforeach
                        </ul>
                    </div>
                @endif
            
            
            <form action="{{route('usuario.store')}}" method="POST">
                @csrf
                <span class="login100-form-title p-b-10">
                    Login
                </span>
                <p class="login-box-msg">Informe seus dados de acesso</p>

                <div class="wrap-input100 validate-input" data-validate = "Valid email is: a@b.c">
                    <input class="input100" type="text" name="email">
                    <span class="focus-input100" data-placeholder="Email"></span>
                </div>

                <div class="wrap-input100 validate-input" data-validate="Enter password">
                    <span class="btn-show-pass">
                        <i class="fa-regular fa-eye"></i>
                    </span>
                    <input class="input100" type="password" name="pass">
                    <span class="focus-input100" data-placeholder="Senha de acesso"></span>
                </div>

                <div class="container-login100-form-btn">
                    <div class="wrap-login100-form-btn">
                        <button class="btn btn-success login100-form-btn">
                            Login
                        </button>
                    </div>
                </div>

                <div class="text-center p-t-40">
                    <span class="txt1">
                        Não tem uma conta?
                    </span>

                    <a class="txt2" href="#">
                        Cadastre-se
                    </a>
                    <p class="mb-1 mt-3">
                        <a href="javascript:void(0)" id="recupera-senha">Esqueci minha senha!</a>
                        <a href="javascript:void(0)" class="text-danger" id="cancela-recuperar-senha" style="display: none">[Cancelar recuperação]</a>
                    </p>
                    <div id="form-recupera-senha"></div>
                </div>
                <div id="dropDownSelect1"></div>
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
                            <button type="submite" class="btn btn-info">RECUPERAR</button>
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
