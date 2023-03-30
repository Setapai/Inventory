$(document).ready(function(){

 load_data(1);

 function load_data(page, query = '',select = '')
 {
   $.ajax({
     url:"../controller/orders/loans/loans.php",
     method:"POST",
     data:{page:page, query:query,category:select},
     success:function(data)
     {
       $('#loansTableContents').html(data);
     }
   });
 }


 $(document).on('click', '.page-link', function(){
   var page = $(this).data('page_number');
   var query = $('#search_box').val();
   var select = $('#CategoryDate').val();
   load_data(page, query, select);
 });
// Select
 $('#search_box').keyup(function(){
   var query = $('#search_box').val();
   var select = $('#CategoryDate').val();
   load_data(1, query,select);
 });
// Select
  $(document).on('change','#CategoryDate',function(){
      var select = $(this).val();
      $('#search_box').val('');
      load_data(1, '', select);
  });

});
