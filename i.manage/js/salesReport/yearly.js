$(document).ready(function(){

 load_data(1);

 function load_data(page, query = '',select = '')
 {
   $.ajax({
     url:"../controller/salesReport/yearly.php",
     method:"POST",
     data:{page:page, query:query,  yearSelect:select},
     success:function(data)
     {
       $('#yearsSalesReport').html(data);
     }
   });
 }


 $(document).on('click', '.page-link', function(){
   var page = $(this).data('page_number');
   var query = $('#search_box_y').val();
   var select = $('#SelectYear').val();
   load_data(page, query,select);
 });
// Select
 $('#search_box_y').keyup(function(){
   var query = $('#search_box_y').val();
   var select = $('#SelectYear').val();
   load_data(1, query,select);
 });

 $(document).on('change','#SelectYear',function(){
   var select = $(this).val();
   $('#search_box_y').val('');
   load_data(1,'',select);
 });

});
