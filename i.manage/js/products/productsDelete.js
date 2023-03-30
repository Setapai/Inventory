$(document).ready(function(){
// User Delete
    $(document).on("click", "#productDelete", function(){
      var id = $(this).val();
      var image = $('#getImage').val();
      $.ajax({
        url: "../controller/products/productsDelete.php",
        method: "POST",
        data: {id:id,image:image},
        success: function(data) {
          $('#Search_Box').val('');
          $('#statusSearch').val('');
          $('#catSearch').val('');
          $('#brandSearch').val('');
          $.getScript("../js/products/products.js");
        }
      });
    });

});
