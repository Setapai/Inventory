$(document).ready(function(){

   load_data();
   function load_data(query) {
     $.ajax({
       url:"../controller/orders/loans/viewLoanRecords.php",
       method: "POST",
       data: {query:query},
       success: function(data) {
         $("#viewLoansDataContents").html(data);
       }
     });
   }

});
