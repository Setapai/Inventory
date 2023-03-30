$(document).ready(function(){

 loadWeeklyTotal();

 function loadWeeklyTotal()
 {
   $.ajax({
     url:"../controller/salesReport/wTotal.php",
     method:"POST",
     success:function(data)
     {
       $('#SRweekTotal').html(data);
     }
   });
 }

});
