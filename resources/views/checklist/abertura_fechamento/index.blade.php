@extends('layout.app')

@section('title', 'Check-list')

@section('page-title', '')

@section('content')
<link rel="preconnect" href="https://fonts.googleapis.com">
<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
<link href="https://fonts.googleapis.com/css2?family=Architects+Daughter&family=Josefin+Sans:wght@200;300&display=swap" rel="stylesheet">

{{--  <div class="checkbox-wrapper-19">
    <input type="checkbox" id="cbtest-19" />
    <label for="cbtest-19" class="check-box">
  </div>  --}}
  
  
  
  <style>
    body {
      font-size: 20px;
    }
    .checkbox-wrapper-19 {
      box-sizing: border-box;
      --background-color: #fff;
      --checkbox-height: 25px;
    }

    .text-list {
      font-size: 25px;
      font-weight: 800;
      text-shadow: 1px 1px 1px #4876ff;
    }

    .titulo-list {
      font-size: 45px;
      font-weight: 800;
      text-shadow: 1px 1px 1px #4876ff;
    }

    .coracao {
      float: right;
      margin-top: -395px;
      margin-right: 70px;
      height: 410px;
      opacity : 0.1;
    }
  
    @-moz-keyframes dothabottomcheck-19 {
      0% {
        height: 0;
      }
      100% {
        height: calc(var(--checkbox-height) / 2);
      }
    }
  
    @-webkit-keyframes dothabottomcheck-19 {
      0% {
        height: 0;
      }
      100% {
        height: calc(var(--checkbox-height) / 2);
      }
    }
  
    @keyframes dothabottomcheck-19 {
      0% {
        height: 0;
      }
      100% {
        height: calc(var(--checkbox-height) / 2);
      }
    }
  
    @keyframes dothatopcheck-19 {
      0% {
        height: 0;
      }
      50% {
        height: 0;
      }
      100% {
        height: calc(var(--checkbox-height) * 1.2);
      }
    }
  
    @-webkit-keyframes dothatopcheck-19 {
      0% {
        height: 0;
      }
      50% {
        height: 0;
      }
      100% {
        height: calc(var(--checkbox-height) * 1.2);
      }
    }
  
    @-moz-keyframes dothatopcheck-19 {
      0% {
        height: 0;
      }
      50% {
        height: 0;
      }
      100% {
        height: calc(var(--checkbox-height) * 1.2);
      }
    }
  
    .checkbox-wrapper-19 input[type=checkbox] {
      display: none;
    }
  
    .checkbox-wrapper-19 .check-box {
      height: var(--checkbox-height);
      width: var(--checkbox-height);
      background-color: transparent;
      border: calc(var(--checkbox-height) * .1) solid #000;
      border-radius: 5px;
      position: relative;
      display: inline-block;
      -moz-box-sizing: border-box;
      -webkit-box-sizing: border-box;
      box-sizing: border-box;
      -moz-transition: border-color ease 0.2s;
      -o-transition: border-color ease 0.2s;
      -webkit-transition: border-color ease 0.2s;
      transition: border-color ease 0.2s;
      cursor: pointer;
    }
    .checkbox-wrapper-19 .check-box::before,
    .checkbox-wrapper-19 .check-box::after {
      -moz-box-sizing: border-box;
      -webkit-box-sizing: border-box;
      box-sizing: border-box;
      position: absolute;
      height: 0;
      width: calc(var(--checkbox-height) * .2);
      background-color: #34b93d;
      display: inline-block;
      -moz-transform-origin: left top;
      -ms-transform-origin: left top;
      -o-transform-origin: left top;
      -webkit-transform-origin: left top;
      transform-origin: left top;
      border-radius: 5px;
      content: " ";
      -webkit-transition: opacity ease 0.5;
      -moz-transition: opacity ease 0.5;
      transition: opacity ease 0.5;
    }
    .checkbox-wrapper-19 .check-box::before {
      top: calc(var(--checkbox-height) * .72);
      left: calc(var(--checkbox-height) * .41);
      box-shadow: 0 0 0 calc(var(--checkbox-height) * .05) var(--background-color);
      -moz-transform: rotate(-135deg);
      -ms-transform: rotate(-135deg);
      -o-transform: rotate(-135deg);
      -webkit-transform: rotate(-135deg);
      transform: rotate(-135deg);
    }
    .checkbox-wrapper-19 .check-box::after {
      top: calc(var(--checkbox-height) * .37);
      left: calc(var(--checkbox-height) * .05);
      -moz-transform: rotate(-45deg);
      -ms-transform: rotate(-45deg);
      -o-transform: rotate(-45deg);
      -webkit-transform: rotate(-45deg);
      transform: rotate(-45deg);
    }
  
    .checkbox-wrapper-19 input[type=checkbox]:checked + .check-box,
    .checkbox-wrapper-19 .check-box.checked {
      border-color: #34b93d;
    }
    .checkbox-wrapper-19 input[type=checkbox]:checked + .check-box::after,
    .checkbox-wrapper-19 .check-box.checked::after {
      height: calc(var(--checkbox-height) / 2);
      -moz-animation: dothabottomcheck-19 0.2s ease 0s forwards;
      -o-animation: dothabottomcheck-19 0.2s ease 0s forwards;
      -webkit-animation: dothabottomcheck-19 0.2s ease 0s forwards;
      animation: dothabottomcheck-19 0.2s ease 0s forwards;
    }
    .checkbox-wrapper-19 input[type=checkbox]:checked + .check-box::before,
    .checkbox-wrapper-19 .check-box.checked::before {
      height: calc(var(--checkbox-height) * 1.2);
      -moz-animation: dothatopcheck-19 0.4s ease 0s forwards;
      -o-animation: dothatopcheck-19 0.4s ease 0s forwards;
      -webkit-animation: dothatopcheck-19 0.4s ease 0s forwards;
      animation: dothatopcheck-19 0.4s ease 0s forwards;
    }
  </style>
  
  
<div class="container-md" style="font-family: 'Architects Daughter', cursive; font-family: 'Josefin Sans', sans-serif; font-weight: 900">
    <div style="border: 1px solid #000; height: 100%; width: 100%; border-radius: 15px;">
        <div class="row">
            <div class="cabecalho" style="text-align: center; width: 100%;">
                <img src="{{ asset('assets/images/mateus.png') }}"  height="150px" alt="logo Mateus">
                <h2 class="titulo-list">Check-List Fechamento</h2>
            </div>
        </div>

        <div class="row">
            <div style="margin-left: 150px">
                <div class="col-12">
                    Nome: Douglas de Lima Pereira
                </div>
                <div class="col-12">
                    Cargo: Auxiliar de CPD
                </div>
                <div class="col-12">
                    Matricula: 119542
                </div>
            </div>
        </div>
        
        <div class="row justify-content-md-center">
            <div class="justify-content-md-center" style="border: 1px solid #000; height: 360px; width:50%; border-radius: 15px; margin-top: 40px;">
                <div class="row justify-content-md-center list" style="margin-left: 10%;">
                    <div class="input-group mt-3 mb-3">
                        <div class="input-group-prepend">
                            <div class="checkbox-wrapper-19">
                                <input type="checkbox" id="cbtest-1" />
                                <label for="cbtest-1" class="check-box">
                            </div>
                        </div>
                        <span class="ml-4 text-list">Painéis de Senha Ligado</span>
                    </div>

                    <div class="input-group mb-3">
                        <div class="input-group-prepend">
                          <div class="checkbox-wrapper-19">
                            <input type="checkbox" id="cbtest-2" />
                            <label for="cbtest-2" class="check-box">
                          </div>
                        </div>
                        <span class="ml-4 text-list">Tv Padaria Ligado</span>
                    </div>

                    <div class="input-group mb-3">
                        <div class="input-group-prepend">
                          <div class="checkbox-wrapper-19">
                            <input type="checkbox" id="cbtest-3" />
                            <label for="cbtest-3" class="check-box">
                          </div>
                        </div>
                        <span class="ml-4 text-list">Som da loja (Radio) Ligado</span>
                    </div>

                    <div class="input-group mb-3">
                        <div class="input-group-prepend">
                          <div class="checkbox-wrapper-19">
                            <input type="checkbox" id="cbtest-4" />
                            <label for="cbtest-4" class="check-box">
                        </div>
                        </div>
                        <span class="ml-4 text-list"> Consultores de Preço Verificados</span>
                    </div>

                    <div class="input-group mb-3">
                        <div class="input-group-prepend">
                          <div class="checkbox-wrapper-19">
                            <input type="checkbox" id="cbtest-5" />
                            <label for="cbtest-5" class="check-box">
                        </div>
                        </div>
                        <span class="ml-4 text-list"> Balanças dos Setores Online</span>
                    </div>
                    <div class="input-group mb-3">
                        <div class="input-group-prepend">
                          <div class="checkbox-wrapper-19">
                            <input type="checkbox" id="cbtest-6" />
                            <label for="cbtest-6" class="check-box">
                        </div>
                        </div>
                        <span class="ml-4 text-list">Impressora(s) Gondolas Ok</span>
                    </div>
                </div>
                <img class="coracao" src="{{ asset('image/mateus_cora.png') }}" height="60px" alt="">
            </div>
        </div>

        <div class="row justify-content-md-center">
            <div style="border: 1px solid #000; height: 170px; width:80%; border-radius: 15px; margin-top: 40px;">
                <div style="margin: 20px;">
                    <span style="margin-left:; padding-bottom: 15px;">Obs:</span>
                    <hr style="margin-bottom: 30px;" color="black">
                    <hr style="margin-bottom: 30px;" color="black">
                    <hr style="margin-bottom: 30px;" color="black">
                </div>
            </div>
        </div>

        <div class="row justify-content-md-center" style="margin: 20px">
            <div class="row col-12" style="margin: 20px 0 0 90px;">
                <div class="col-6"> <span>Verificado por:</span> </div>
                <div class="col-6"> <span>Gerência:</span> </div>
            </div>

            <div class="row justify-content-md-center">
                <div class="row col-12">
                    <hr size="50px" color="black" width="1000px"><br>
                </div>
            </div>

            <div class="row col-12 justify-content-md-end">
                <span> Fortaleza - CE {{date('d / m / Y')}}</span>
            </div>

        </div>
    </div>
</div>

@endsection


