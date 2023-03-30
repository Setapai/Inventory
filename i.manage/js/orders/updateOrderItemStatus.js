$(document).ready(function(){


  $(document).on("click", "#updateOrderItemsStatus", function(){
    var id = $(this).val();
    $.ajax({
      url:"../model/orders/updateOrderItemStatus.php",
      method: "POST",
      data: {id:id},
      success: function(data) {
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
      }
    });
  }


});
