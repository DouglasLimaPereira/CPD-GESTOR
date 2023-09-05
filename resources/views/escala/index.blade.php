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
            
            dayMaxEventRows: true, 
            views: {
                timeGrid: {
                dayMaxEventRows: 3
                }
            },
            
            events: @json($escala ?? ''),
            eventDisplay: {
                backgroundColor: '#007bff',
            },

            select: function(info) {
                $('#data_escala').modal('show')
                console.log(info.startStr);
                console.log(info.event.id);
            },
            
        });

            calendar.render();
        });            
</script>

