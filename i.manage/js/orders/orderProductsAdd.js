$(document).ready(function(){
  SaveBtn();
// orderProductADd ADD
    $(document).on("click", "#orderProduct", function(){
      var id = $(this).val();
      $.ajax({
        url: "../controller/orders/OrderProductsAdd.php",
        method: "POST",
        data: {id:id},
        success: function(data) {
          getTotal();
          SaveBtn();
          // $('#search_box').val('');
          // $.getScript("../js/orders/orderProducts.js");
          $.getScript("../js/orders/orderItems.js");
        }
      });
    });

    function SaveBtn()
    {
      $.ajax({
        url:"../controller/orders/saveBtn.php",
        method:"POST",
        success:function(data)
        {
          $('#getBtn').html(data);
        }
      });
    }

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
