$(document).ready(function(){


  $(document).on("click", "#getOrderItemsID", function(){
    var id = $(this).val();
    $.ajax({
      url: "../controller/orders/orderItemModal.php",
      method: "POST",
      data: {id:id},
      success: function(data) {
        $("#updateQtyModal").html(data);
        $("#updateQtyModal").fadeIn(500);
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

  $('input[name="number"]').keyup(function(e)
                                {
  if (/\D/g.test(this.value))
  {
    // Filter non-digits from input value.
    this.value = this.value.replace(/\D/g, '');
  }
});


  $(document).on("click", "#closeOrderItemModal", function(){
    $("#updateQtyModal").fadeOut(500);
  });


// User UpdateQTY
    $(document).on("click", "#update-btn", function(){
      var id = $(this).val();
      var qty = $('#orderItemQty').val();
      $("#updateQtyModal").fadeOut(500);
      $.ajax({
        url: "../model/orders/updateOrderItemsQty.php",
        method: "POST",
        data: {id:id,qty:qty},
        success: function(data) {
          console.log(data);
          getTotal();
          $.getScript("../js/orders/orderProducts.js");
          $.getScript("../js/orders/orderItems.js");
        }
      });
    });

    function getTotal()
    {
      $.ajax({
        url:"../controller/orders/getTotal.php",
        method:"POST",
        success:function(data)
        {
          $('#getTotalContents').html(data);
          $('#copyTotal').val($('#getTotalContents').text());
          getMaxDiscount();
        }
      });
    }
    function getMaxDiscount()
    {
      $.ajax({
        url:"../controller/orders/maxDiscount.php",
        method:"POST",
        success:function(data)
        {
          $('#maxDiscount').val(data);
        }
      });
    }

});
