$(document).ready(function(){

  $(document).on("click", "#deleteRefund", function(){
    var id = $(this).val();
    $.ajax({
      url:"../model/orders/refunds/deleteRefund.php",
      method: "POST",
      data: {id:id},
      success: function(data) {
        $.getScript("../js/orders/viewOrders.js");
        $.getScript("../js/orders/refunds/viewOrderRefunds.js");
        $.getScript("../js/orders/viewOrdersGetTotal.js");
      }
    });
  });

});
