<!-- jQuery -->
<script src="{{asset('plugins/jquery/jquery.min.js')}}"></script>
<!-- jQuery UI 1.11.4 -->
<script src="{{asset('plugins/jquery-ui/jquery-ui.min.js')}}"></script>
<!-- Resolve conflict in jQuery UI tooltip with Bootstrap tooltip -->
<script>
  $.widget.bridge('uibutton', $.ui.button)
</script>
<!-- Bootstrap 4 -->
<script src="{{asset('plugins/bootstrap/js/bootstrap.bundle.min.js')}}"></script>

{{-- DataTables --}}
<script src="{{asset('plugins/datatables/jquery.dataTables.min.js')}}"></script>
<script src="{{asset('plugins/datatables-bs4/js/dataTables.bootstrap4.min.js')}}"></script>
<script src="{{asset('plugins/datatables-responsive/js/dataTables.responsive.min.js')}}"></script>
<script src="{{asset('plugins/datatables-responsive/js/responsive.bootstrap4.min.js')}}"></script>
<script src="{{asset('plugins/datatables-buttons/js/dataTables.buttons.min.js')}}"></script>
<script src="{{asset('plugins/datatables-buttons/js/buttons.bootstrap4.min.js')}}"></script>
<script src="{{asset('plugins/jszip/jszip.min.js')}}"></script>
{{-- <script src="{{asset('plugins/pdfmake/pdfmake.min.js')}}"></script>
<script src="{{asset('plugins/pdfmake/vfs_fonts.js')}}"></script> --}}
<script src="{{asset('plugins/datatables-buttons/js/buttons.html5.min.js')}}"></script>
<script src="{{asset('plugins/datatables-buttons/js/buttons.print.min.js')}}"></script>
<script src="{{asset('plugins/datatables-buttons/js/buttons.colVis.min.js')}}"></script>

<!-- ChartJS -->
<script src="{{asset('plugins/chart.js/Chart.min.js')}}"></script>
<!-- JQVMap -->
<script src="{{asset('plugins/jqvmap/jquery.vmap.min.js')}}"></script>
<script src="{{asset('plugins/jqvmap/maps/jquery.vmap.usa.js')}}"></script>
<!-- Add evo-calendar.js before your closing <body> tag, right after jQuery (required) -->
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
  <script src="js/evo-calendar.js"></script>

  <script src="https://cdn.jsdelivr.net/npm/jquery@3.5.1/dist/jquery.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
  <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js" integrity="sha384-9/reFTGAW83EW2RDu2S0VKaIzap3H66lZH81PoYlFhbGU+6BZp6G7niu735Sk7lN" crossorigin="anonymous"></script>
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/js/bootstrap.min.js" integrity="sha384-+sLIOodYLS7CIrQpBjl+C7nPvqq+FbNUBDunl/OZv93DB7Ln/533i8e/mZXLi/P+" crossorigin="anonymous"></script>

<!-- jQuery Knob Chart -->
<script src="{{asset('plugins/jquery-knob/jquery.knob.min.js')}}"></script>
<!-- daterangepicker -->
<script src="{{asset('plugins/moment/moment.min.js')}}"></script>
<script src="{{asset('plugins/daterangepicker/daterangepicker.js')}}"></script>
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

<script src="https://cdn.jsdelivr.net/npm/bootstrap-select@1.13.9/dist/js/bootstrap-select.min.js"></script>
{{--  <script src="https://code.jquery.com/jquery-3.6.0.min.js"integrity="sha256-/xUj+3OJU5yExlq6GSYGSHk7tPXikynS7ogEvDej/m4="crossorigin="anonymous"></script>  --}}
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.7.1/jquery.js" integrity="sha512-+k1pnlgt4F1H8L7t3z95o3/KO+o78INEcXTbnoJQ/F2VqDVhWoaiVml/OEHv9HsVgxUaVW+IbiZPUJQfF/YxZw==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
  <script>
      // Utilização em formulários
      $(function(){
          $('#cnpj').mask('00.000.000/0000-00', {reverse: true})
          $('#cep').mask('00.000-000', {reverse: true})
          $('#total_unidades').mask('000', {reverse: true})
          $('#total_funcionarios').mask('000', {reverse: true})
          $('#limite_armazenamento').mask('00000,00', {reverse: true})
          $('#limite_anexo').mask('#.00', {reverse: true})
          $('#telefone').mask('(00) 000000000')
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

<script>
  $(function () {
    $('[data-toggle="tooltip"]').tooltip()
  })

</script>

<script>
  // UTILIZADO NOS DATATABLE 
  $(function () {
        $("#table-datatable").DataTable({
            "responsive": true,
            "lengthChange": false, 
            "autoWidth": true,
            "initComplete": function () {
                $('div.fg-toolbar:first').append('<span>Titulo</span>');
            },
            language: {
                lengthMenu: "Exibir _MENU_ records por página",
                zeroRecords: "Nenhum registro encontrado.",
                info: "Exibindo página _PAGE_ de _PAGES_",
                infoEmpty: "Não há registros disponíveis.",
                infoFiltered: "(Filtrado from _MAX_ total registros)",
                search: "Buscar",
                paginate: {
                    previous: "Anterior",
                    next: "Próximo"
                }
            }
        }).buttons().container().appendTo('#table-wrapper .col-md-6:eq(0)');
    });
</script>

@yield('scripts')

