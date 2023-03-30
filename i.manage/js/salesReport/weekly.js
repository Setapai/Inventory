$(document).ready(function(){

 load_data(1);

 function load_data(page, query = '')
 {
   $.ajax({
     url:"../controller/salesReport/weekly.php",
     method:"POST",
     data:{page:page, query:query},
     success:function(data)
     {
       $('#weeklySalesReport').html(data);
     }
   });
 }

 $(document).on('click', '.page-link', function(){
   var page = $(this).data('page_number');
   var query = $('#search_box_w').val();
   load_data(page, query);
 });
// Select
 $('#search_box_w').keyup(function(){
   var query = $('#search_box_w').val();
   load_data(1, query);
 });

});
