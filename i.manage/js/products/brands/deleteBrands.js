$(document).ready(function(){
// User Delete
    $(document).on("click", "#brandsDelete", function(){
      var id = $(this).val();
      $.ajax({
        url: "../model/products/brands/brandsDelete.php",
        method: "POST",
        data: {id:id},
        success: function(data) {
          $('#Search_Box').val('');
          $.getScript("../js/products/brands/brands.js");
        }
      });
    });

});
