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
        let calendarEl = document.getElementById('calendar');
        let calendar = new FullCalendar.Calendar(calendarEl, {
            initialView: 'dayGridMonth',
            themeSystem: 'bootstrap',
            timeZone: 'America/Fortaleza',
            locale: 'pt-BR',
            droppable: true,
            selectable: true,
            selecthelper: true,
            contentHeight: 730,
            
            events: @json($escala ?? ''),
            eventDisplay: {
                backgroundColor: '#007bff',
            },
            
            dayMaxEventRows: true, // for all non-TimeGrid views
            views: {
                timeGrid: {
                dayMaxEventRows: 3 // adjust to 6 only for timeGridWeek/timeGridDay
                }
            },
            select: function(event) {
                console.log(event)
                $('#data_escala #evento').val(event.title);
                $('#data_escala #data_inicio').val(event.startStr);
                $('#data_escala #data_fim').val(event.endStr);
                $('#data_escala #user_id').val(event.usuario);
                $('#data_escala').modal('toggle');
            }
        });

            calendar.render();
        });            
</script>

