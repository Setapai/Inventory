$(document).ready(function(){

 loadWeeklyTotal();

 function loadWeeklyTotal()
 {
   $.ajax({
     url:"../controller/reports/weeklyTotal.php",
     method:"POST",
     success:function(data)
     {
       $('#WeeklyReports').html(data);
     }
   });
 }

});
