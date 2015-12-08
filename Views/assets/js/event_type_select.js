$(document).ready(function(){
    $("#event_type").prop("selectedIndex", -1);
   $('#event_type').change(function(e){
       $(this).css('background-color', $(this).find(':selected').css('background-color'));
   });
});