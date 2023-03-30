$(document).ready(function(){



   load_data();
   function load_data(query) {
     $.ajax({
       url:"../controller/orders/ordersView.php",
       method: "POST",
       data: {query:query},
       success: function(data) {
         $("#viewOrderItemsTableContents").html(data);
       }
     });
   }

   $("#search").keyup(function(){
     var search = $(this).val();
     if(search != "") {
       load_data(search);
     } else {
       load_data();
     }
   });

  $('#printBtn').click(function(){
    window.print();
  });


});
