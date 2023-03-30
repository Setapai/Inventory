$(document).ready(function(){

 load_data(1);

 function load_data(page, query = '',select = '')
 {
   $.ajax({
     url:"../controller/defectiveProducts/defProd.php",
     method:"POST",
     data:{page:page, query:query,category:select},
     success:function(data)
     {
       $('#defTableContents').html(data);
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
      load_data(1, '', select);
  });

});
