$(document).ready(function(){

 loadYearlyTotal();

 function loadYearlyTotal(yearSelect = '')
 {
   $.ajax({
     url:"../controller/reports/yearlyTotal.php",
     method:"POST",
     data:{yearSelectTotal:yearSelect},
     success:function(data)
     {
       $('#yearlyReports').html(data);
     }
   });
 }

 $(document).on('change','#SelectYear',function(){
   var yearSelect = $(this).val();
   loadYearlyTotal(yearSelect);
 });


});
