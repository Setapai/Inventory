$(document).ready(function(){

 showProduct();

 $(document).on("click", "#getProduct", function(){
   var id = $(this).val();
   $.ajax({
     url:"../controller/orders/refunds/changeShowProduct.php",
     method:"POST",
     data:{id:id},
     success:function(data)
     {
       $('#showProducts').html(data);
     }
   });
 });

 function showProduct()
 {
   $.ajax({
     url:"../controller/orders/refunds/changeShowProduct.php",
     method:"POST",
     success:function(data)
     {
       $('#showProducts').html(data);
     }
   });
 }

});
