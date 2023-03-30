$(document).ready(function(){

 load_data(1);

 function load_data(page, query = '',cat  = '', brand = '')
 {

   $.ajax({
     url:"../controller/orders/orderProducts.php",
     method:"POST",
     data:{page:page, query:query,  category:cat,  brand:brand},
     success:function(data)
     {
       $('#orderProductsTableContents').html(data);
     }
   });
 }

 $(document).on('click', '.productsPageLink', function(){
   var page = $(this).data('page_number');
   var query = $('#search_box').val();
   var cat = $('#catSearch').val();
   var brand = $('#brandSearch').val();

   load_data(page, query,cat,brand);
 });

 $('#search_box').keyup(function(){
   var query = $('#search_box').val();
   var cat = $('#catSearch').val();
   var brand = $('#brandSearch').val();
   load_data(1, query,cat,brand);

 });
 // Category
   $(document).on('change','#catSearch',function(){
       var cat = $(this).val();
       var brand = $('#brandSearch').val();
       load_data(1, '',cat,brand);
   });
 // Brands
   $(document).on('change','#brandSearch',function(){
       var brand = $(this).val();
       var cat = $('#catSearch').val();
       load_data(1, '',cat,brand);
   });

});
