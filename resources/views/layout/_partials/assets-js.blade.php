<!-- jQuery -->
<script src="{{asset('plugins/jquery/jquery.min.js')}}"></script>
<!-- jQuery UI 1.11.4 -->
<script src="{{asset('plugins/jquery-ui/jquery-ui.min.js')}}"></script>
<!-- Resolve conflict in jQuery UI tooltip with Bootstrap tooltip -->
<script>
  $.widget.bridge('uibutton', $.ui.button)
</script>
{{-- Data-Table --}}
{{-- <script src="https://cdn.datatables.net/1.13.7/js/jquery.dataTables.js"></script> --}}
<!-- Bootstrap 4 -->
<script src="{{asset('plugins/bootstrap/js/bootstrap.bundle.min.js')}}"></script>
<script src="{{asset('plugins/bootstrap/js/bootstrap.min.js')}}"></script>
<!-- ChartJS -->
<script src="{{asset('plugins/chart.js/Chart.min.js')}}"></script>
<!-- JQVMap -->
<script src="{{asset('plugins/jqvmap/jquery.vmap.min.js')}}"></script>
<script src="{{asset('plugins/jqvmap/maps/jquery.vmap.usa.js')}}"></script>
<!-- jQuery Knob Chart -->
<script src="{{asset('plugins/jquery-knob/jquery.knob.min.js')}}"></script>
<!-- Latest compiled and minified JavaScript -->
<script src="https://cdn.jsdelivr.net/npm/bootstrap-select@1.13.14/dist/js/bootstrap-select.min.js"></script>
<!-- daterangepicker -->
<script src="{{asset('plugins/moment/moment.min.js')}}"></script>
<!-- Tempusdominus Bootstrap 4 -->
<script src="{{asset('plugins/tempusdominus-bootstrap-4/js/tempusdominus-bootstrap-4.min.js')}}"></script>
<!-- Summernote -->
<script src="{{asset('plugins/summernote/summernote-bs4.min.js')}}"></script>
<!-- overlayScrollbars -->
<script src="{{asset('plugins/overlayScrollbars/js/jquery.overlayScrollbars.min.js')}}"></script>
<!-- AdminLTE App -->
<script src="{{asset('dist/js/adminlte.js')}}"></script>
<!-- AdminLTE for demo purposes -->
<script src="{{asset('dist/js/demo.js')}}"></script>
<!-- AdminLTE dashboard demo (This is only for demo purposes) -->
<script src="{{asset('dist/js/pages/dashboard.js')}}"></script>
{{-- Input mask --}}
<script src="{{asset('plugins/jquery-mask/dist/jquery.mask.min.js')}}"></script>
{{-- Toastr --}}
<script src="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/2.1.4/toastr.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-Fy6S3B9q64WdZWQUiU+q4/2Lc9npb8tCaSX9FK7E8HnRr0Jz8D6OP9dO5Vg3Q9ct" crossorigin="anonymous"></script>
 
{{-- <script src="/DataTables/datatables.js"></script> --}}

<script>
      // Utilização em formulários
      $(function(){
          $('#cnpj').mask('00.000.000/0000-00', {reverse: true})
          $('#cep').mask('00.000-000', {reverse: true})
          $('#telefone').mask('(00) 00000-0000')
          $('#whatsapp').mask('(00) 000000000')
          $('#salario').mask('#.##0,00', {reverse: true})
      });

      //Recebendo os dados do serviço "VIA CEP"
      $(document).ready(function(){
        $("#cep").blur(function(){
          //Nova variável "cep" somente com dígitos
          var cep = $(this).val().replace(/\D/g, '');

          //Validando se o campo não está vazio
          if(cep != '')
          {
            //Consulta o webservice viacep.com.br/
            $.getJSON("https://viacep.com.br/ws/"+ cep +"/json/?callback=?", function(dados) {
              if (!("erro" in dados)) {
                  //Atualiza os campos com os valores da consulta.
                  $("#logradouro").val(dados.logradouro)
                  $("#bairro").val(dados.bairro)
                  $("#cidade").val(dados.localidade)
                  $("#uf").val(dados.uf)
              }
              else {
                  //CEP pesquisado não foi encontrado.
                  //Atualiza os campos com os valores da consulta.
                  $("#logradouro").val('')
                  $("#bairro").val('')
                  $("#cidade").val('')
                  $("#uf").val('')
                  $("#numero").val('')
                  $("#complemento").val('')
                  alert("CEP não encontrado.")
              }
            });
          }
        })
      })
  </script>

  {{-- Toastr --}}
  <script>
    $(document).ready(function() {
        toastr.options.timeOut = 5000;
        toastr.options.closeButton = true;
        @if(Session::has('error'))
          toastr.error('{{ Session::get('error') }}');
        @elseif(Session::has('warning'))
          toastr.warning('{{ Session::get('warning') }}');
        @elseif(Session::has('success'))
          toastr.success('{{ Session::get('success') }}');
        @elseif(Session::has('info'))
          toastr.info('{{ Session::get('info') }}');
        @endif
    });
  </script>
@yield('scripts')

