$(document).ready(function(){

 loadWeeklyTotal();

 function loadWeeklyTotal()
 {
   $.ajax({
     url:"../controller/salesReport/mTotal.php",
     method:"POST",
     success:function(data)
     {
       $('#SRmonthlyTotal').html(data);
     }
   });
 }

});
