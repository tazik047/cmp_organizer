$(document).ready(function(){
    $('#calendar').fullCalendar({
        theme: true,
        header: {
            left: 'prev,next today',
            center: 'title',
            right: 'month,agendaWeek,agendaDay'
        },
        eventClick: function(calEvent, jsEvent, view) {

            $(this).avgrund({
                holderClass: 'custom',
                showClose: true,
                showCloseText: 'закрыть',
                onBlurContainer: '.container',
                onLoad: function(elem){
                    $.ajax({
                        url:"/event_detail.php",
                        data:{id:calEvent.id},
                        success:function(data){
                            $('.avgrund-popin').append(data);
                        }
                    });
                },
                template: ''
            });
            $(this).click();
        },
        loading:function(isLoading){
            if(isLoading){
                $('#loading').show();
            }
            else{
                $('#loading').hide();
            }
            console.log(isLoading);
        },
        events: "/events.php",
        allDaySlot: false
    });
});