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
                    droppable: true,
                    selectable: true,
                    selecthelper: true,
                    contentHeight: 730,
                    initialView: 'dayGridMonth',
                    
                    dayMaxEventRows: true, 
                    views: {
                        timeGrid: {
                        dayMaxEventRows: 6
                        }
                    },
                    
                    events: @json($escala ?? ''),
                    eventDisplay: {
                        backgroundColor: '#007bff',
                    },

                    select: function(event) {
                       console.log(event.event.id);
                            


                        // function getEscala(event.id){
                        //     console.log(event.id);
                        //     if(val != ""){
                        //         $.ajax({
                        //             url: "{{url('/')}}/api/escala/"+val+"/get-escala",
                        //             method: 'GET',
                        //             success: function(val){
                        //                 $('#email').val(val)
                        //             },
                        //             error: function(e){
                        //                 console.log(e)
                        //             }
                        //         })
                        //     }
                        // }

                        // $('#data_escala #evento').val(event.title);
                        // $('#data_escala #data_inicio').val(event.start);
                        // $('#data_escala #data_fim').val(event.end);
                        // $('#data_escala #user_id').val(event.usuario);
                        // $('#data_escala').modal('toggle');
                    },
                    
                });

                 calendar.render();
             });            
        </script>
    {{-- @endsection --}}
@endsection

