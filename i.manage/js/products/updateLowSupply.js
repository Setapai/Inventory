$(document).ready(function(){
  $('#lsUpdateBtn').click(function(){

    var getid = $('#getInputID').val();
    var qty = $('#lsGetQty').val();
    $.ajax({
      url:"../model/products/productsUpdateLS.php",
      method: "POST",
      data: {getid:getid,qty:qty},
      success: function(data) {
        $('#Search_Box').val(data);
        $('#statusSearch').val('');
        $('#catSearch').val('');
        $('#brandSearch').val('');
        $.getScript("../js/products/products.js");
      }
    });
    $('#lsUpdateBtn').attr('data-dismiss', 'modal');


  });

});
