$(document).ready(function(){

  $('#addBrandBtn').click(function(){
    var brands =  $('#brandsName').val();
    $.ajax({
      url:"../model/products/brands/brandsAdd.php",
      method: "POST",
      data: {brands:brands},
      success: function(data) {
        $('#brandsName').val('');
        $('#errorHandlingBrand').html(data);
         $.getScript("../js/products/brands/brands.js");
       }
    });
    $('#addBrandBtn').attr('data-dismiss', 'modal');
  })


});
