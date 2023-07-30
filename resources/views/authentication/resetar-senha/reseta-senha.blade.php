<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>Recupera Senha | SAGO - SISTEMA DE ACOMPANHAMENTO GERENCIAL DE OBRAS</title>

  <!-- Google Font: Source Sans Pro -->
  <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">
  <!-- Font Awesome -->
  <link rel="stylesheet" href="{{asset('plugins/fontawesome-free/css/all.min.css')}}">
  <!-- icheck bootstrap -->
  <link rel="stylesheet" href="{{asset('plugins/icheck-bootstrap/icheck-bootstrap.min.css')}}">
  <!-- Theme style -->
  <link rel="stylesheet" href="{{asset('dist/css/adminlte.min.css')}}">
</head>
<body class="hold-transition login-page">
<div class="login-box">
  <div class="card card-outline card-primary">
    <div class="card-header text-center bg-primary">
      <img src="{{asset('assets/images/logo.png')}}" alt="SAGO" width="230">
      {{-- <a href="../../index2.html" class="h1"><b>S</b>AGO</a> --}}
    </div>
    <div class="card-body">
        <p class="login-box-msg">Você está a apenas um passo de sua nova senha, recupere sua senha agora. Informe os dados abaixo.</p>
        @if($errors->any())
            <div class="alert alert-danger" role="alert">
                <ul class="list">
                @foreach ($errors->all() as $erro)
                    <li>{{$erro}}</li>
                @endforeach
                </ul>
            </div>
        @endif
        <form action="{{route('password.update')}}" method="POST">
            @csrf
            <div class="input-group mb-3">
                <input type="email" name="email" class="form-control" placeholder="Informe o seu Email" value="{{$email}}">
                <div class="input-group-append">
                <div class="input-group-text">
                    <span class="fas fa-at"></span>
                </div>
                </div>
            </div>
            <div class="input-group mb-3">
            <input type="password" name="password" class="form-control" placeholder="Informe sua nova senha">
            <div class="input-group-append">
                <div class="input-group-text">
                <span class="fas fa-lock"></span>
                </div>
            </div>
            </div>
            <div class="input-group mb-3">
            <input type="password" name="password_confirmation" class="form-control" placeholder="Confirme sua senha">
            <div class="input-group-append">
                <div class="input-group-text">
                <span class="fas fa-check"></span>
                </div>
            </div>
            </div>
            <div class="row">
            <div class="col-12">
                <button type="submit" class="btn btn-primary btn-block">ATUALIZAR SENHA</button>
            </div>
            <!-- /.col -->
            </div>
            <input type="hidden" name="token" value="{{$token}}">
        </form>

      <p class="mt-3 mb-1">
        <a href="{{url('/')}}">Login</a>
      </p>
    </div>
    <!-- /.login-card-body -->
  </div>
</div>
<!-- /.login-box -->

<!-- jQuery -->
<script src="{{asset('plugins/jquery/jquery.min.js')}}"></script>
<!-- Bootstrap 4 -->
<script src="{{asset('plugins/bootstrap/js/bootstrap.bundle.min.js')}}"></script>
<!-- AdminLTE App -->
<script src="{{asset('dist/js/adminlte.min.js')}}"></script>
</body>
</html>
