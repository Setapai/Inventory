$(document).ready(function(){


  $('#discount').keyup(function() {
      var dInput = this.value;
      getTotal(dInput);
  });

  $('#discount').on('input', function () {
    var value = $(this).val();
    var maxVal = ($('#copyTotal').val() - $('#maxDiscount').val()) ;
    if ((value !== '') && (value.indexOf('.') === - 1)) {
      $(this).val(Math.max(Math.min(value, maxVal), - maxVal));
    }
  });
//

    function getTotal(discount)
    {
      $.ajax({
        url:"../controller/orders/getTotal.php",
        method:"POST",
        data:{discount:discount},
        success:function(data)
        {
          $('#getTotalContents').html(data);
          $('#copyTotal').val(data);
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
