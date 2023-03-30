$(document).ready(function(){

 loadDefProd(1);

 function loadDefProd(page, query = '',cat  = '', brand = '')
 {

   $.ajax({
     url:"../controller/defectiveProducts/products.php",
     method:"POST",
     data:{page:page, query:query,  category:cat,  brand:brand},
     success:function(data)
     {
       $('#defProductsTableContents').html(data);
     }
   });
 }

 $(document).on('click', '.productsPageLink', function(){
   var page = $(this).data('page_number');
   var query = $('#search_box').val();
   var cat = $('#catSearch').val();
   var brand = $('#brandSearch').val();

   loadDefProd(page, query,cat,brand);
 });

 $('#search_box').keyup(function(){
   var query = $('#search_box').val();
   var cat = $('#catSearch').val();
   var brand = $('#brandSearch').val();
   loadDefProd(1, query,cat,brand);

 });
 // Category
   $(document).on('change','#catSearch',function(){
       var cat = $(this).val();
       var brand = $('#brandSearch').val();
       loadDefProd(1, '',cat,brand);
   });
 // Brands
   $(document).on('change','#brandSearch',function(){
       var brand = $(this).val();
       var cat = $('#catSearch').val();
       loadDefProd(1, '',cat,brand);
   });

});
