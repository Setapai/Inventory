  $(document).ready(function(){

   load_data(1);
   // lowSupply();

   function load_data(page, query = '',cat  = '', brand = '')
   {
     $.ajax({
       url:"../controller/products/products.php",
       method:"POST",
       data:{page:page, query:query,  category:cat,  brand:brand},
       success:function(data)
       {
         $('#productsTableContents').html(data);
       }
     });

     $.ajax({
       url:"../controller/products/productsLS.php",
       method:"POST",
       data:{page:page, query:query, category:cat,  brand:brand},
       success:function(data)
       {
         $('#lowSupProductsTableContents').html(data);
       }
     });
   }
   $('#resetProductSearch').click(function(){
     var query = $('#Search_Box').val('');
     var cat = $('#catSearch').val('');
     var brand = $('#brandSearch').val('');
     load_data(1, query,cat,brand);
   });

   $(document).on('click', '.page-link', function(){
     var page = $(this).data('page_number');
     var query = $('#Search_Box').val();
     var cat = $('#catSearch').val();
     var brand = $('#brandSearch').val();

     load_data(page, query,cat,brand);
   });

     $('#Search_Box').keyup(function(){
       var query = $('#Search_Box').val();
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

       // EXCEL
       $("#BrowseBtn").click(function(){
         if ($("#browseExcel").click()) {
         }
       });

       $('#browseExcel').change(function() {
         $('#excelPathName').text($(this).val().replace(/C:\\fakepath\\/i, ''));
         $('#browseDetails').removeClass('d-none').hide().fadeIn(500);
       });


 });
