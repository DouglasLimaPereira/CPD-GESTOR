@extends('layout.app')

@section('title', 'Escala')

{{-- @section('page-title', 'Escala') --}}

@section('content')

    <div class="row">
        <div class="col-md-12">
            <div class="card card-info">
                <div class="card-body">
                    <div id="calendar"></div>
                    @include('escala._partials.modal-data-escala')
                </div>
            </div>
        </div>
    </div>

    <script>
        let user_nome = "<?php echo isset($user_nome)?$user_nome:''; ?>";
        let eventId
        let evento
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
    
                {{--  eventClick: function(info) {
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
                },  --}}

                eventClick: function(info) {
                    evento = info.event
                    eventId = info.event.id
                    let dataFim = info.event.endStr.split('T') 
                    let dataInicio = info.event.startStr.split('T')
                    let data = dataInicio[0].split('-')
    
                    let horaInicio = dataInicio[1]
                    horaInicio = horaInicio.split(':', 2)
                    horaInicio = horaInicio[0]+':'+horaInicio[1]
    
                    let horaFim = dataFim[1]
                    horaFim = horaFim.split(':', 2)
                    horaFim = horaFim[0]+':'+horaFim[1]
    
                    // don't let the browser navigate
                    info.jsEvent.preventDefault();
                    $('#show_escala .showescala').html('')
                    if (info.event) {
                        $('#show_escala .showescala').append(`

                        <div class="callout callout-info" style=" padding: 0; margin-top: 15px;">
                            <table class="mt-0 mb-0 table " style="padding: 0;">
                                <thead>
                                    <tr>
                                        <th><b> `+user_nome+` </b></th>
                                        <th><b> `+info.event.title+` </b></th>
                                        <th><b> `+data[2]+`/`+data[1]+`/`+data[0]+` </b></th>
                                        <th><b> `+horaInicio+` </b></th>
                                        <th><b> `+horaFim+` </b></th>
                                        <th width="5%" class="text-center">
                                            <div class="dropdown">
                                                <button class="btn btn-secondary " type="button" data-toggle="dropdown" aria-expanded="false">
                                                    <i class="fa-solid fa-ellipsis-vertical"></i>
                                                </button>
                                                <div class="dropdown-menu dropdown-menu-right">
                                                    <button class="dropdown-item text-success" type="button" onclick="editarEscala()"><i class="fa-regular fa-pen-to-square"></i> Editar</button>
                                                    <div class="dropdown-divider"></div>
                                                    <button class="dropdown-item text-danger" type="button" onclick="excluirEscala()"><i class="fa-regular fa-trash-can"></i> Excluir</button>
                                                </div>
                                            </div>
                                        </th>
                                    </tr>
                                </thead>
                            </table>
                        </div>
                        `);
                    }
                    $('#show_escala').modal('show');
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

        function editarEscala(){
            console.log(evento);

            let dataFim = evento.endStr.split('T') 
            let dataInicio = evento.startStr.split('T')

            let horaInicio = dataInicio[1]
            horaInicio = horaInicio.split(':', 2)
            horaInicio = horaInicio[0]+':'+horaInicio[1]

            let horaFim = dataFim[1]
            horaFim = horaFim.split(':', 2)
            horaFim = horaFim[0]+':'+horaFim[1]

            $('#edit_escala #id').val(evento.id),
            $('#edit_escala #evento').val(evento.title),
            $('#edit_escala #hora_inicio').val(horaInicio);
            $('#edit_escala #data_inicio').val(dataInicio[0].toLocaleString()),
            $('#edit_escala #hora_fim').val(horaFim);
            $('#edit_escala #data_fim').val(dataFim[0].toLocaleString()),
            $('#show_escala').modal('hide');
            $('#edit_escala').modal('show');
        }

        
    </script>
@endsection
