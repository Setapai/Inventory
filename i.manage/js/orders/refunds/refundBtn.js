$(document).ready(function(){


  refundsBtn();
  function refundsBtn() {
    var id = $("#getViewID").val();
    $.ajax({
      url:"../controller/orders/refunds/refundsBtn.php",
      method: "POST",
      data: {id:id},
      success: function(data) {
        $("#getRefundsBtn").html(data);
      }
    });
  }
  $(document).on("click", "#refundBtn", function(){
    var id = $(this).val();
    $.ajax({
      url:"../model/orders/refunds/refundsBtn.php",
      method: "POST",
      data: {id:id},
      success: function(data) {
        refundsBtn();
        $.getScript("../js/orders/viewOrders.js");
        $.getScript("../js/orders/viewOrdersGetTotal.js");
      }
    });
  });




});
