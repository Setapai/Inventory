$(document).ready(function(){

 load_data(1);

 function load_data(page, query = '',year = '',month = '', day = '')
 {
   $.ajax({
     url:"../controller/orders/orders.php",
     method:"POST",
     data:{page:page, query:query,year:year,month:month,day:day},
     success:function(data)
     {
       $('#ordersTableContents').html(data);
     }
   });
 }

 $('#resetRecords').click(function(){
   var query = $('#search_box').val('');
   var year = $('#year').val('');
   var month = $('#month').val('');
   var day = $('#day').val('');
   load_data(1, query,year,month,day);
 });


 $(document).on('click', '.page-link', function(){
   var page = $(this).data('page_number');
   var query = $('#search_box').val();
   var year = $('#year').val();
   var month = $('#month').val();
   var day = $('#day').val();
   load_data(page, query, year,month,day);
 });
// Select
 $('#search_box').keyup(function(){
   var query = $('#search_box').val();
   var year = $('#year').val();
   var month = $('#month').val();
   var day = $('#day').val();
   load_data(1, query,year,month,day);
 });
// year
  $(document).on('change','#year',function(){
      var year = $(this).val();
      $('#search_box').val('');
      load_data(1, '', year,'','');
  });
  // month
    $(document).on('change','#month',function(){
        var month = $(this).val();
        var year = $('#year').val();
        $('#search_box').val('');
        load_data(1, '', year,month,'');
    });
    // day
      $(document).on('change','#day',function(){
          var day = $(this).val();
          var year = $('#year').val();
          var month = $('#month').val();
          $('#search_box').val('');
          load_data(1, '', year,month,day);
      });

});
