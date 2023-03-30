$(document).ready(function(){

   viewRefunds();
   function viewRefunds(query) {
     $.ajax({
       url:"../controller/orders/refunds/ordersViewRefunds.php",
       method: "POST",
       data: {query:query},
       success: function(data) {
         $("#viewRefundsItemsTableContents").html(data);
       }
     });
   }

   $("#search").keyup(function(){
     var search = $(this).val();
     if(search != "") {
       viewRefunds(search);
     } else {
       viewRefunds();
     }
   });

});
