$(document).ready(function(){


  $(document).on("click", "#defProdQtyUpdate", function(){
    var id = $('#getProdID').val();
    $.ajax({
      url: "../controller/defectiveProducts/defProdModal.php",
      method: "POST",
      data: {id:id},
      success: function(data) {
        $("#defProdmodal").html(data);
        $("#defProdmodal").fadeIn(500);
        $('#defProdItemQty').val($('#defProdQtyUpdate').text());
        $('#defProdItemQty').on('input', function () {
          var value = $(this).val();
          var maxVal = $('#defProdQty').val();
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


  $(document).on("click", "#closeProdItemModal", function(){
    $("#defProdmodal").fadeOut(500);
  });


// User UpdateQTY
    $(document).on("click", "#defProdQtyUpBtn", function(){
      var id = $(this).val();
      var qty = $('#defProdItemQty').val();
      $("#defProdmodal").fadeOut(500);
      $('#defProdQtyUpdate').text($('#defProdItemQty').val());
      $('#defProdGetQty').val($('#defProdItemQty').val());

    });


});
