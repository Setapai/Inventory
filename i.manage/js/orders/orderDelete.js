$(document).ready(function(){
// User Delete
    $(document).on("click", "#orderDelete", function(){
      var id = $(this).val();
      $.ajax({
        url: "../controller/orders/orderDelete.php",
        method: "POST",
        data: {id:id},
        success: function(data) {
          $('#search_box').val('');
          $.getScript("../js/orders/orders.js");
        }
      });
    });

});
