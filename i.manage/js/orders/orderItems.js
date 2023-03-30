$(document).ready(function(){

 load_data(1);

 function load_data(page)
 {
   $.ajax({
     url:"../controller/orders/orderItems.php",
     method:"POST",
     data:{page:page},
     success:function(data)
     {
       $('#orderItemsTableContents').html(data);
     }
   });
 }

 $(document).on('click', '.orderPageLink', function(){
   var page = $(this).data('page_number');
   load_data(page);
 });

});
