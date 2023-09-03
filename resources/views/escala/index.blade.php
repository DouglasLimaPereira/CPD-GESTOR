@extends('layout.app')

@section('title', 'Escala')

@section('page-title', 'Escala')

@section('content')

    <div class="row">
        <div class="col-md-12">
            <div class="card">
                <div class="card-body">
                    <div id="calendar"></div>
                </div>
            </div>
        </div>
    </div>

    {{-- @section('scripts') --}}
        <script>
            {{--  <script src="https://cdn.jsdelivr.net/npm/fullcalendar@6.1.8/index.global.min.js"></script>  --}}
            {{--  <script src="https://cdn.jsdelivr.net/npm/fullcalendar@6.1.8/index.global.min.js"></script>  --}}
            document.addEventListener('DOMContentLoaded', function() {
                let calendarEl = document.getElementById('calendar');
                 
                let calendar = new FullCalendar.Calendar(calendarEl, {
                    locale: 'pt-BR',
                    initialView: 'dayGridMonth',
                    timeZone: 'America/Fortaleza',
                    header: {
                       left: 'prev, today',
                       center: 'title',
                       right: 'next, month,agendaWeek,agendaDay,listMonth'
                    },
                     events: @json($events),
                });

                 calendar.render();
             });            
        </script>
    {{-- @endsection --}}
@endsection

