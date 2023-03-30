$(document).ready(function(){

  $(document).on("click", "#defectiveRefund", function(){
    var id = $(this).val();
    $.ajax({
      url:"../model/orders/refunds/refundDefective.php",
      method: "POST",
      data: {id:id},
      success: function(data) {
        $.getScript("../js/orders/viewOrders.js");
        $.getScript("../js/orders/refunds/viewOrderRefunds.js");
      }
    });
  });

});
