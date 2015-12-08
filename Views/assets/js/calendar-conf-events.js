$(document).ready(function(){
    $('#calendar').fullCalendar({
        theme: true,
        header: {
            left: 'prev,next today',
            center: 'title',
            right: 'month,agendaWeek,agendaDay'
        },
        eventClick: function(calEvent, jsEvent, view) {

						$.ajax({
					url:"/event_detail.php",
					data:{id:calEvent.id},
					success:function(data){
						swal({   
							title: calEvent.title + "!",   
							showCancelButton: false,
							showConfirmButton: false,
							confirmButtonText: "Редактировать",
							cancelButtonText: "Закрыть",
							text: "<div>"+data+"</div>",   
							html: true
						});
					}
				});
			
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