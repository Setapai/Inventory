$(document).ready(function(){

  $('#addCatBtn').click(function(){
    var category =  $('#catName').val();
    $.ajax({
      url:"../model/products/category/categoryAdd.php",
      method: "POST",
      data: {category:category},
      success: function(data) {
        $('#catName').val('');
        $('#errorHandlingCat').html(data);
         $.getScript("../js/products/category/category.js");
       }
    });
    $('#addCatBtn').attr('data-dismiss', 'modal');
  })


});
