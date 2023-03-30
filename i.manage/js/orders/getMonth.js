$(document).ready(function(){

  getMonth();

 function getMonth(year = '')
 {
   $.ajax({
     url:"../controller/orders/getMonth.php",
     method:"POST",
     data:{year:year},
     success:function(data)
     {
       $('#getMonth').html(data);
     }
   });
 }
// CLEAR Year
  $(document).on('change','#year',function(){
      var year = $(this).val();
      $('#search_box').val('');
      // CLear Day
      getMonth(year);
  });

});
