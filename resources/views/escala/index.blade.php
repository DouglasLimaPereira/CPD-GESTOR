@extends('layout.app')

@section('title', 'Escala')

@section('page-title', 'Escala')

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

    {{-- @section('scripts') --}}
@endsection
<script>
    document.addEventListener('DOMContentLoaded', function() {
        var calendarEl = document.getElementById('calendar');
        var calendar = new FullCalendar.Calendar(calendarEl, {
            locale: 'pt-BR',
            dayMaxEventRows: true,
            views: {
                dayGridMonth: {
                    dayMaxEventRows: 3 // adjust to 6 only for timeGridWeek/timeGridDay
                }
            },
            events: @json($escala ?? ''),
            eventClick: function(info) {
                let dataFim = info.event.endStr.split('T') 
                let dataInicio = info.event.startStr.split('T')

                let horaInicio = dataInicio[1]
                horaInicio = horaInicio.split(':', 2)
                horaInicio = horaInicio[0]+':'+horaInicio[1]

                let horaFim = dataFim[1]
                horaFim = horaFim.split(':', 2)
                horaFim = horaFim[0]+':'+horaFim[1]

                console.log(horaInicio)
                // don't let the browser navigate
                info.jsEvent.preventDefault();
                $('#edit_escala #id').val(info.event.id),
                $('#edit_escala #evento').val(info.event.title),
                $('#edit_escala #hora_inicio').val(horaInicio);
                $('#edit_escala #data_inicio').val(dataInicio[0].toLocaleString()),
                $('#edit_escala #hora_fim').val(horaFim);
                $('#edit_escala #data_fim').val(dataFim[0].toLocaleString()),
                $('#edit_escala').modal('show');

                // change the border color just for fun
                info.el.style.borderColor = 'red';
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

    // document.addEventListener('DOMContentLoaded', function() {
    //     let calendarEl = document.getElementById('calendar');
    //     let calendar = new FullCalendar.Calendar(calendarEl, {
    //         initialView: 'dayGridMonth',
    //         themeSystem: 'bootstrap',
    //         timeZone: 'America/Fortaleza',
    //         locale: 'pt-BR',
    //         droppable: true,
    //         selectable: true,
    //         selecthelper: true,
    //         editable: true,
    //         eventLimit: true,
    //         contentHeight: 730,
            
    //         events: @json($escala ?? ''),
    //         eventDisplay: {
    //             backgroundColor: '#007bff',
    //         },
            
    //         dayMaxEventRows: true, // for all non-TimeGrid views
    //         views: {
    //             timeGrid: {
    //             dayMaxEventRows: 3 // adjust to 6 only for timeGridWeek/timeGridDay
    //             }
    //         },
    //         select: function(event) {
    //             console.log(event)
    //             $('#data_escala #evento').val(event.title);
    //             $('#data_escala #data_inicio').val(event.startStr);
    //             $('#data_escala #data_fim').val(event.endStr);
    //             $('#data_escala #user_id').val(event.usuario);
    //             $('#data_escala').modal('toggle');
    //         }
    //     });

    //         calendar.render();
    //     });            
</script>

