<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Construtora | {{env('APP_NAME')}}</title>

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
<body>
    <div class="container h-100 py-5">
        <div class="row justify-content-center mb-3">
            <a href="/" class="text-center">
                <img src="{{asset('assets/images/logo1.png')}}" class="img-fluid" alt="">
            </a>
        </div>

        <div class="row justify-content-center mb-5 mt-5">
            <h3 class="text-light fw-bold tx-shadow">SELECIONE UMA CONSTRUTURA</h3>
        </div>
        
        <div class="row justify-content-center">
            @foreach ($user->companies as $item)
                <div class="col-sm-4">
                    <div class="card mb-3 text-center">
                        <div class="card-header">
                            <h4>{{$item->nome}}</h4>
                        </div>
                        <div class="card-body bg-primary border border-4 border-light">
                            <p class="card-text">
                                <img src="{{asset('assets/images/logo1.png')}}" width="150" alt="">
                            </p>
                            <hr>
                            <form action="{{route('companies.index')}}" method="POST">
                                @csrf
                                <input type="hidden" name="company_id" value="{{$item->id}}">
                                <input type="submit" class="btn btn-success btn-flat" value="ACESSAR">
                            </form>
                            {{-- <a href="#" class="btn btn-primary">CLIENTE</a> --}}
                        </div>
                    </div>
                </div>
            @endforeach
        </div>
        
        <div class="row justify-content-center mt-5">
            <p class="text-light fw-bold">SAGO - SISTEMA DE ACOMPANHAMENTO GERENCIAL DE OBRAS - VERSÃO 2.0</p>
        </div>
    </div>
    
<!-- /.login-box -->

<!-- jQuery -->
<script src="{{asset('plugins/jquery/jquery.min.js')}}"></script>
<!-- Bootstrap 4 -->
<script scr="{{asset('plugins/bootstrap/js/bootstrap.bundle.min.js')}}"></script>
<!-- AdminLTE App -->
<script src="{{asset('dist/js/adminlte.min.js')}}"></script>
</body>
</html>
