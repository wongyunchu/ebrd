console.log('test---------------------------------------');
$(document).ready(function () {
/*    $('#myModal').on('show.bs.modal', function (event) {
        var button = $(event.relatedTarget) // Button that triggered the modal
        var recipient = button.data('whatever') // Extract info from data-* attributes
        // If necessary, you could initiate an AJAX request here (and then do the updating in a callback).
        // Update the modal's content. We'll use jQuery here, but you could use a data binding library or other methods instead.
        var modal = $(this)
        modal.find('.modal-title').text('New message to ' + recipient)
        modal.find('.modal-body input').val(recipient)
    })*/


    //success,info,warning,error
    toastr.options.escapeHtml = true;
    toastr.options = {
        "closeButton": true,
        "debug": true,
        "newestOnTop": true,
        "progressBar": true,
        "positionClass": "toast-top-right",
        "preventDuplicates": false,
        "showDuration": "1000",
        "hideDuration": "100",
        "timeOut": "2000",
        "extendedTimeOut": "1000",
        "showEasing": "swing",
        "hideEasing": "linear",
        "showMethod": "slideDown", //fadeIn, fadeOut
        "hideMethod": "slideUp"
    }

    $('#external-events div').each(function() {

        // store data so the calendar knows to render an event upon drop
/*        $(this).data('event', {
            title: $.trim($(this).text()), // use the element's text as the event title
            stick: true // maintain when user navigates (see docs on the renderEvent method)
        });*/

        // make the event draggable using jQuery UI
        $(this).draggable({
            zIndex: 999,
            revert: true,      // will cause the event to go back to its
            revertDuration: 0  //  original position after the drag
        });
    });

    $calendar=$('#calendar').fullCalendar({
        editable: true,
        selectable: true,

        //eventOverlap: false,
        minTime:"07:00:00",
        maxTime:"21:00:00",
        height: 650,
        allDayDefault: true, // 기본 하루 full 시간 사용시
        defaultTimedEventDuration: "00:30:00", // drag시 기본 칸 설정
        slotDuration:"0:30:00",
        snapDuration:"0:30:00",
        /*locale: 'ko',*/

        //defaultDate: '2017-11-12',
        navLinks: true, // can click day/week names to navigate views

        eventLimit: true, // allow "more" link when too many events
        droppable: true, // this allows things to be dropped onto the calendar
        eventDurationEditable: true,
        //aspectRatio: 1.8,
        //scrollTime: '00:10',
        select:function(start, end, jsEvent, view) {
            $('#myModal').modal('show');


//            $('#startdt').datepicker('setDate',start.format('YYYY-MM-DD'));

            $('#myModal').find('#startdt').val(start.format('YYYY-MM-DD'));
/*          var title = prompt('이벤트를 입력하세요.') ;
          if(title != null) {
              var event = {
                  title:title.trim() != "" ? title : 'new Event',
                  start:start,
                  end:end
              };
              $calendar.fullCalendar("renderEvent", event, true);
          }*/
        },

        eventClick: function (calEvent, jsEvent, view) {
            $('#myModal').modal('show');
            $('#myModal').find('#myModalLabel').html("<b>" + calEvent.title + "</b>");
            //$('#myModal').find('#myModalLabel').html("<b>" + calEvent.start.format("dddd, MMMM Do YYYY") + " from " + calEvent.start.format("hh:mm a") + " to " + calEvent.end.format("hh:mm a") + "</b>");

            //alert('Event: ' + calEvent.title+ 'View: ' + view.name);
            //$(this).css('border-color', 'red');
        },/*
        drop: function(date, jsEvent, ui, resourceId) {
            console.log('drop', date.format(), resourceId);

/!*            if ($('#drop-remove').is(':checked')) {
                $(this).remove();
            }*!/
        },*/
      /* */
        eventDrop: function( event, delta, revertFunc, jsEvent, ui, view  ){

            delete event.source;
            save_event(event);
        },
        eventResize: function( event, delta, revertFunc, jsEvent, ui, view ){
            delete event.source;
            save_event(event);
        },



        // Event is already dropped and rendered
        eventReceive: function(event){

/*
            var event = {
                title: 'new Event',
                start:event.start,
                end:event.end
            };
            $calendar.fullCalendar("renderEvent", event, true);*/

            event.end = moment(event.start).add(event.eventDuration, "minutes");
            $("#calendar").fullCalendar("updateEvent", event, true);

            save_event(event);

        },
        header: {
            left: 'today prev,next',
            center: 'title',
            right: 'month,agendaWeek,agendaDay,listWeek'
        },

        events: [
            {
                title: '근태',
                start: '2017-11-01 16:00',
                color:"#6A9FCF"
            },
            {
                title: '휴가',
                start: '2017-11-06',
                end: '2017-11-09',
                color:'#74BB5B'
            },
            {
                id: 999,
                title: '출장',
                start: '2017-11-09T16:00:00',
                color:'#E34342'
            },
            {
                id: 999,
                title: '출장',
                start: '2017-11-16T16:00:00',
                color:'#E34342'
            },
            {
                title: '근태',
                start: '2017-11-11',
                end: '2017-11-13',
                color:"#6A9FCF"
            },
            {
                title: '근태',
                start: '2017-11-12T10:30:00',
                end: '2017-11-12T12:30:00',
                color:"#6A9FCF"
            },
            {
                title: '휴가',
                start: '2017-11-12T12:00:00',
                color:'#74BB5B'
            }


        ]
    });


    var $notification = $("#notification");
    var $calendar = $("#calendar");

    $notification.hide();

    function remove_event(event){
        toastr["error"]("이벤트가 삭제되었습니다.", "성공")
        $notification.css({"background-color":"#FFC0CB", "color":"red", "padding":"4px"})
            .html("Event removed")
            .fadeIn("slow")
            .delay(1000)
            .fadeOut();

    }

    function save_event(event){
        toastr["success"]("이벤트가 저장되었습니다.", "성공")
/*        $notification.css({"background-color":"#90EE90", "color":"#077707", "padding":"4px"})
            .html("Event saved")
            .fadeIn("slow")
            .delay(1000)
            .fadeOut();*/
    };
    ;
});