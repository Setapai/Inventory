$(document).ready(function(){

 loadYearlyTotal();

 function loadYearlyTotal(yearSelect = '')
 {
   $.ajax({
     url:"../controller/salesReport/yTotal.php",
     method:"POST",
     data:{yearSelectTotal:yearSelect},
     success:function(data)
     {
       $('#SRyearlyTotal').html(data);
     }
   });
 }

 $(document).on('change','#SelectYear',function(){
   var yearSelect = $(this).val();
   loadYearlyTotal(yearSelect);
 });


});
