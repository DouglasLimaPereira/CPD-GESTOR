{{--  <!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/css/bootstrap.min.css" integrity="sha384-xOolHFLEh07PJGoPkLv1IbcEPTNtaed2xpHsD9ESMhqIYd0nLMwNLD69Npy4HI+N" crossorigin="anonymous">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Architects+Daughter&family=Josefin+Sans:wght@200;300&display=swap" rel="stylesheet">
    <style>
      @page {
        size: A4;
      }
      body {
        font-size: 20px;
        margin: 20px;
      }
      .checkbox-wrapper-19 {
          box-sizing: border-box;
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
          background-color: #001eff;
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
      <title>Document</title>
    </head>
    <body>
    <div class="container" style="font-family: 'Architects Daughter', cursive; font-family: 'Josefin Sans', sans-serif; font-weight: 900">
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
                        <span style="margin-left:0; padding-bottom: 15px;">Obs:</span>
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
  </body>
</html>

  --}}

  <!DOCTYPE html>
  <html lang="en">
  <head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/css/bootstrap.min.css" integrity="sha384-xOolHFLEh07PJGoPkLv1IbcEPTNtaed2xpHsD9ESMhqIYd0nLMwNLD69Npy4HI+N" crossorigin="anonymous">
    <title>Document</title>
    <style>
      .coracao {
        float: right;
        margin-top: -395px;
        margin-right: 70px;
        height: 410px;
        opacity : 0.1;
      }

      .text-list {
        font-size: 25px;
        font-weight: 800;
        text-shadow: 1px 1px 1px #4876ff;
      }
  
      .titulo-list {
        margin-top: -10px;
        font-size: 25px;
        font-weight: 800;
        text-shadow: 1px 1px 1px #4876ff;
      }
  
  <!DOCTYPE html>
  <html lang="en">
  <head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous"></script>
    <title>Document</title>
    <style>
      body {
      }
      
      hr {
        border: 1px solid #000;
        size: 10px;
        weight: 50; 
      }

      .cabecalho {
        text-align: center; 
        width: 100%;
      }

      .conteudo {
        border: 1px solid #000;
        margin-top: 40px;
        border-radius: 15px;
        background-image: url({{ public_path('image/mateus_cora.png') }});
        
      }

      .rodape {
        margin-top: 22px;
      }

      .text-list {
        margin-left: 100px;
      }

       .coracao {
        float: right;
        margin-top: -195px;
        margin-right: 70px;
        height: 410px;
        opacity : 0.1;
      }
      
    </style>
  </head>
  <body>
    <div class="container">
        <div class="row">
          <div class="cabecalho">
            <img src="{{ public_path('assets/images/mateus.png') }}"  height="120px" alt="logo Mateus">
            <h2 class="titulo-list">Check-List Fechamento</h2>
          </div>
        </div>

        <div class="row text-start">
          <div>
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

        <div class="conteudo">
            <div class="">
                <div class="input-group mt-3 mb-3">
                    <div class="input-group-prepend">
                        {{--  <div class="square" style="border: 1px solid #000; height: 20px; width: 20px;"></div>  --} }
                    </div>
                    <span class="text-list">Painéis de Senha Ligado</span>
                </div>
                
                <div class="input-group mb-3">
                  <div class="input-group-prepend">
                    
                  </div>
                    {{--  <div class="square" style="border: 1px solid #000; height: 20px; width: 20px;"></div>  --} }
                    <span class=" text-list">Tv Padaria Ligado</span>
                </div>

                <div class="input-group mb-3">
                    <div class="input-group-prepend">
                    </div>
                    <span class=" text-list">Som da loja (Radio) Ligado</span>
                </div>

                <div class="input-group mb-3">
                    <div class="input-group-prepend">
                      
                    </div>
                    <span class=" text-list"> Consultores de Preço Verificados</span>
                </div>

                <div class="input-group mb-3">
                    <div class="input-group-prepend">
                      
                    </div>
                    <span class=" text-list"> Balanças dos Setores Online</span>
                </div>
                <div class="input-group mb-3">
                    <div class="input-group-prepend">
                      
                    </div>
                    <span class=" text-list">Impressora(s) Gondolas Ok</span>
                </div>
            </div>
            <img class="coracao" src="" height="60px" alt="">
        </div>

        {{--  <div class="row">  --} }
          <div style="border: 1px solid #000; height: 170px; width:100%; border-radius: 15px; margin-top: 40px;">
              <div style="margin: 20px;">
                  <span style="margin-left:0; padding-bottom: 15px;">Obs:</span>
                  <hr style="margin-bottom: 30px;" color="black">
                  <hr style="margin-bottom: 30px;" color="black">
                  <hr style="margin-bottom: 30px;" color="black">
              </div>
          </div>
        {{--  </div>  -- }}

        <div class="rodape">
          <div class="row">
            
                <span>Verificado por:</span>
                <span class="ml-6">Gerência:</span>
          
          </div>
            
            <hr>
            
            <div class="row text-center">
                <span> Fortaleza - CE {{date('d / m / Y')}}</span>
            </div>
        </div>

      </div>

  </body>
  </html>  --}}

  <!DOCTYPE html>
  <html lang="en">
  <head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
    <style>
      body {
        border: 1px solid #000;
        border-radius: 20px;
      }

      header {
        border-color: 1px solid #000;
      }

      footer {
        
        margin: 25px;  
      }

    </style>
  </head>
  <body>
  <div class="col-12">
    <div class="col-12 header">

    </div>

    <div class="col-12 conteudo">
      
    </div>

    <div class="col-12 footer">
      <hr>
    </div>
  </div>
  </body>
  </html>


