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
</head>
<body class="hold-transition login-page">
<div class="login-box">
    <div class="login-logo">
        <img src="{{asset('assets/images/mateus.png')}}" class="img-fluid" alt="">
    </div>
    <!-- /.login-logo -->
    <div class="card">
        <div class="card-body login-card-body">
            <p class="login-box-msg">Informe seus dados de acesso</p>
                @if($errors->any())
                    <div class="alert alert-danger" role="alert">
                        <ul class="list">
                        @foreach ($errors->all() as $erro)
                            <li>{{$erro}}</li>
                        @endforeach
                        </ul>
                    </div>
                @endif
            
            
            <form action="{{route('cadastro.store')}}" method="POST">
                @csrf
                <div class="input-group mb-3">
                    <input type="email" class="form-control" name="email" placeholder="Email">
                        <div class="input-group-append">
                            <div class="input-group-text">
                            <span class="fas fa-envelope"></span>
                        </div>
                    </div>
                </div>
                <div class="input-group mb-3">
                    <input type="password" class="form-control" name="password" placeholder="Password">
                    
                    <div class="input-group-append">
                        <div class="input-group-text">
                            <span class="fas fa-lock"></span>
                        </div>
                    </div>
                </div>
                    <div class="row">
                        <!-- /.col -->
                        <div class="col-4">
                            <button type="submit" class="btn btn-primary ">ACESSAR</button>
                        </div>
                        <!-- /.col -->
                    </div>
            </form>
            <p class="mb-1 mt-3">
                <a href="javascript:void(0)" id="recupera-senha">Esqueci minha senha!</a>
                <a href="javascript:void(0)" class="text-danger" id="cancela-recuperar-senha" style="display: none">[Cancelar recuperação]</a>
            </p>
            <div id="form-recupera-senha"></div>
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
