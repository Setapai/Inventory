$(document).ready(function(){

  vOGetTotal();
  function vOGetTotal()
  {
    $.ajax({
      url:"../controller/orders/viewOGetTotal.php",
      method:"POST",
      success:function(data)
      {
        $('#vOrdersTotalAmount').html(data);
      }
    });
  }

});
