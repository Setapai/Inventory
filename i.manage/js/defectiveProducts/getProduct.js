$(document).ready(function(){

 loadDefProd();

 $(document).on("click", "#getDefProd", function(){
   var id = $(this).val();
   $.ajax({
     url:"../controller/defectiveProducts/getProduct.php",
     method:"POST",
     data:{id:id},
     success:function(data)
     {
       $('#getProductTableContents').html(data);
     }
   });
 });

 function loadDefProd()
 {
   $.ajax({
     url:"../controller/defectiveProducts/getProduct.php",
     method:"POST",
     success:function(data)
     {
       $('#getProductTableContents').html(data);
     }
   });
 }

});
