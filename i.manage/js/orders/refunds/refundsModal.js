$(document).ready(function(){

  $(document).on("click", "#refundsModal", function(){
    var id = $(this).val();
    $.ajax({
      url: "../controller/orders/refunds/refundsModal.php",
      method: "POST",
      data: {id:id},
      success: function(data) {
        $("#updateRefundsQty").html(data);
        $("#updateRefundsQty").fadeIn(500);
        $('#orderItemQty').on('input', function () {
          var value = $(this).val();
          var maxVal = $('#orderProdQty').val();

          if ((value !== '') && (value.indexOf('.') === -1)) {
            $(this).val(Math.max(Math.min(value, maxVal), -maxVal));
          }
        });
      }
    });
  });

  $('#orderItemQty').keyup(function(e){
    if (/\D/g.test(this.value))
    {
      // Filter non-digits from input value.
      this.value = this.value.replace(/\D/g, '');
    }
  });



  $(document).on("click", "#closeRefundModal", function(){
    $("#updateRefundsQty").fadeOut(500);
  });


// User UpdateQTY
    $(document).on("click", "#update-btn", function(){
      var id = $(this).val();
      var qty = $('#orderItemQty').val();
      var note = $('#note').val();
      // uploadable
      $("#updateRefundsQty").fadeOut(500);
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

    // REFUNDITEM
    // $(document).on("click", "#removeRefund", function(){
      // var id = $(this).val();
      // var note = $('#removeRefundDetails').val();
      // var qty = $(this).attr('data-qty');
      // var x = $(this).attr('data-qty');
      // alert(x);
      // $.ajax({
      //   url:"../model/orders/refunds/refundItem.php",
      //   method: "POST",
      //   data: {id:id,note:note,qty:qty},
      //   success: function(data) {
      //     $.getScript("../js/orders/viewOrders.js");
      //     $.getScript("../js/orders/refunds/viewOrderRefunds.js");
      //     $.getScript("../js/orders/viewOrdersGetTotal.js");
      //   }
      // });
    // });


});
