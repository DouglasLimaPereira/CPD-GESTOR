@extends('layout.app')

@section('title', 'Escala')

{{-- @section('page-title', 'Escala') --}}

@section('content')

    <div class="row">
        <div class="col-md-12">
            <div class="card">
                <div class="card-body">
                    <div id="calendar"></div>
                    @include('escala._partials.modal-data-escala')
                </div>
            </div>
        </div>
    </div>

    <script>
        let eventId
        document.addEventListener('DOMContentLoaded', function() {
            var calendarEl = document.getElementById('calendar');
            var calendar = new FullCalendar.Calendar(calendarEl, {
                locale: 'pt-BR',
                aspectRatio: 2,
                dayMaxEventRows: true,
                themeSystem: 'bootstrap',
                headerToolbar: {
                    start: '', // will normally be on the left. if RTL, will be on the right
                    center: 'title',
                    end: 'today prev next' // will normally be on the right. if RTL, will be on the left
                },
                buttonText: {
                    today: 'Hoje',
                },
                views: {
                    dayGridMonth: {
                        dayMaxEventRows: 3 // adjust to 6 only for timeGridWeek/timeGridDay
                    }
                },
    
                events: @json($escala ?? ''),
                eventDisplay: true,
    
                eventClick: function(info) {
                    eventId = info.event.id
                    let dataFim = info.event.endStr.split('T') 
                    let dataInicio = info.event.startStr.split('T')
    
                    let horaInicio = dataInicio[1]
                    horaInicio = horaInicio.split(':', 2)
                    horaInicio = horaInicio[0]+':'+horaInicio[1]
    
                    let horaFim = dataFim[1]
                    horaFim = horaFim.split(':', 2)
                    horaFim = horaFim[0]+':'+horaFim[1]
    
                    // don't let the browser navigate
                    info.jsEvent.preventDefault();
                    $('#edit_escala #id').val(info.event.id),
                    $('#edit_escala #evento').val(info.event.title),
                    $('#edit_escala #hora_inicio').val(horaInicio);
                    $('#edit_escala #data_inicio').val(dataInicio[0].toLocaleString()),
                    $('#edit_escala #hora_fim').val(horaFim);
                    $('#edit_escala #data_fim').val(dataFim[0].toLocaleString()),
                    $('#edit_escala').modal('show');
                },
    
                selectable: true,
                select: function(info) {
                    $('#cad_escala #evento').val('');
                    $('#cad_escala #hora_inicio').val('');
                    $('#cad_escala #hora_fim').val('');
                    $('#cad_escala #data_inicio').val(info.startStr.toLocaleString()),
                    $('#cad_escala #data_inicio').innerHTML = "readonly";
                    $('#cad_escala #data_fim').val(info.endStr.toLocaleString()),
                    $('#cad_escala').modal('show');
                }
            });
            calendar.render();
        });

        function atualizarEscala(){
            document.getElementById("editEscala_form").action = "{{url('/')}}/escala/"+eventId+"/update";
            $('#editEscala_form').submit();
        }

        function excluirEscala(){
            $confirmacao = confirm('Tem certeza que deseja remover esta Escala?');

            if($confirmacao){
                window.location.href = "{{url('/')}}/escala/"+eventId+"/destroy"
            }
        }
    </script>
@endsection
