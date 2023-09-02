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
            // document.addEventListener('DOMContentLoaded', function() {
            //     var calendarEl = document.getElementById('calendar');
            //     var calendar = new FullCalendar.Calendar(calendarEl, {
            //         header: { start:'prev'},
            //         initialView: 'dayGridMonth'
            //     });
            //     calendar.render();
            // });

            $(document).ready(function() {
                $('#calendar').FullCalendar({
                    height: 250,
                    contentHeight: 273,
                    editable: false,
                    eventLimit: false,
                    events: 'eventos.php',
                    eventColor: '#dd6777',

                    eventClick:  function(event, jsEvent, view) {
                    $('#modalTitle').html("<i class=\"fa fa-hand-o-right\" aria-hidden=\"true\"></i> " + event.title);
                    $('#modalBody').html(event.description);
                    $('#eventUrl').attr('href',event.url);
                    $('#fullCalModal').modal();
                }
                });
            });

            // document.addEventListener('DOMContentLoaded', function() {
            //     var calendarEl = document.getElementById('calendar');
            //     var calendar = new FullCalendar.Calendar(
            //     calendarEl, 
            //     {
            //         themeSystem: 'bootstrap',
            //         initialView: 'dayGridMonth',
            //         selectable: true
            //     }
            //     header, 
            //     {
            //         start: 'prev',
            //         center: 'title',
            //         end: 'next',
            //     }
                
            //     );
            //     calendar.render();
            // });

            // $('#calendar').fullCalendar({
            //     height: auto,
            //     aspectRatio: 2,
            //     header: {
            //             left: "prev",
            //             center: "title",
            //             right: "next"
            //         },
            //     selectable: true,
            //     editable: true,
            //     selectHelper: true,
            //     defaultView: 'month',
            //     events: "/agendamento/get",
            //     eventRender: function eventRender( event, element, view ) {
            //         element.append( "<button class='editon btn btn-default' id='editSchedule'><span class='glyphicon glyphicon-pencil'></span></button>" );
            //         element.append( "<button class='btn btn-danger'><span class='closeon'>X</span></button>");
            //         element.find(".closeon").click(function() {
            //         $('#mycalendar').fullCalendar('removeEvents',event._id);
            //         });
            //         element.find('.editon').click(function () {
            //             $('#ScheduleEdit').modal('show');
            //         });
            //         return ['all', event.doctor].indexOf($('#selector').val()) >= 0
            //     },
            //     select: function(start, end,  jsEvents) {
            //         var inicio = moment(start).format("DD-MM-YYYY");
            //         $scope.$apply(function () {
            //             $scope.Schedule.horario = inicio ;
            //         });

            //         $scope.createSchedule();
            //     }
            // });
        </script>
    {{-- @endsection --}}
@endsection

