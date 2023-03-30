$(document).ready(function(){

 load_data(1);
 // lowSupply();
 function load_data(page, query = '')
 {
   $.ajax({
     url:"../controller/products/category/category.php",
     method:"POST",
     data:{page:page, query:query},
     success:function(data)
     {
       $('#categoriesTableContents').html(data);
     }
   });
 }

 $(document).on('click', '.page-link', function(){
   var page = $(this).data('page_number');
   var query = $('#Search_Box').val();
   load_data(page, query);
 });

 $('#Search_Box').keyup(function(){
   var query = $('#Search_Box').val();
   load_data(1, query);
 });


});
