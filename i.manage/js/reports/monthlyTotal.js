$(document).ready(function(){

 loadMonthlyTotal();

 function loadMonthlyTotal()
 {
   $.ajax({
     url:"../controller/reports/monthlyTotal.php",
     method:"POST",
     success:function(data)
     {
       $('#monthlyReports').html(data);
     }
   });
 }

});
