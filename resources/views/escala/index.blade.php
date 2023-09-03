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
            document.addEventListener('DOMContentLoaded', function() {
                let calendarEl = document.getElementById('calendar');
                 
                let calendar = new FullCalendar.Calendar(calendarEl, {

                    header: {
                        left: 'dayGridMonth,timeGridWeek,timeGridDay custom1',
                        center: 'title',
                        right: 'custom2 prevYear,prev,next,nextYear'
                    },
                    footer: {
                        left: 'custom1,custom2',
                        center: '',
                        right: 'prev,next'
                    },

                    themeSystem: 'bootstrap',
                    timeZone: 'America/Fortaleza',
                    locale: 'pt-BR',
                    
                    dayMaxEventRows: true, 
                    views: {
                        timeGrid: {
                        dayMaxEventRows: 6
                        }
                    },
                    
                    initialView: 'dayGridMonth',
                    
                    contentHeight: 730,

                       left: 'prev, today',
                       center: 'title',
                       right: 'next, month,agendaWeek,agendaDay,listMonth',
                    

                     events: @json($escala ?? ''),
                     eventColor: '#007bff',
                     eventDisplay: {
                         backgroundColor: '#007bff',
                     },

                    eventClick: function(info) {
                        alert('Event: ' + info.event.title);
                    },

                    
                    dateClick: function(info) {
                        alert('Date: ' + info.dateStr);
                        alert('Resource ID: ' + info.resource.id);
                      }
                });

                 calendar.render();
             });            
        </script>
    {{-- @endsection --}}
@endsection

