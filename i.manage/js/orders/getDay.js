$(document).ready(function(){

  getDay();

 function getDay(year = '',month = '')
 {
   $.ajax({
     url:"../controller/orders/getDay.php",
     method:"POST",
     data:{year:year,month:month},
     success:function(data)
     {
       $('#getDay').html(data);
     }
   });
 }
 $(document).on('change','#month',function(){
   var month = $(this).val();
   var year = $('#year').val();
     $('#search_box').val('');
     // CLear Day
     getDay(year,month);
 });

 $(document).on('change','#year',function(){
   var year = $(this).val();
   var month = $('#month').val();
   $('#search_box').val('');
     // CLear Day
     getDay(year,month);
 });

});
