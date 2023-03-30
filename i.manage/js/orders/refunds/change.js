$(document).ready(function(){

  $(document).on("click", "#changeUpdate", function(){
    var id = $(this).val();
    $.ajax({
      url: "../controller/orders/refunds/changeModal.php",
      method: "POST",
      data: {id:id},
      success: function(data) {
        $("#changeRefunds").html(data);
        $("#changeRefunds").fadeIn(500);
        $('#orderItemQty').on('input', function () {
          var value = $(this).val();
          var maxVal = $('#orderProdQty').val();

          if ((value !== '') && (value.indexOf('.') === -1)) {
            $(this).val(Math.max(Math.min(value, maxVal), -maxVal));
          }
        });
        $.getScript("../js/orders/refunds/changeProducts.js");
        $.getScript("../js/orders/refunds/changeShowProducts.js");
      }
    });
  });

  // $('#orderItemQty').keyup(function(e){
  //   if (/\D/g.test(this.value))
  //   {
  //     // Filter non-digits from input value.
  //     this.value = this.value.replace(/\D/g, '');
  //   }
  // });

  $(document).on("click", "#closeRefundModal", function(){
    $("#changeRefunds").fadeOut(500);
  });


// User UpdateQTY
    $(document).on("click", "#updateOrdersModal", function(){
      var id = $(this).val();
      // uploadable
      $("#changeRefunds").fadeOut(500);
      $.ajax({
          url:"../model/orders/refunds/refundItem.php",
        method: "POST",
        data: {id:id,qty:qty,note:note},
        success: function(data) {
              $.getScript("../js/orders/viewOrders.js");
              $.getScript("../js/orders/refunds/viewOrderRefunds.js");
              $.getScript("../js/orders/viewOrdersGetTotal.js");
        }
      });
    });


});
