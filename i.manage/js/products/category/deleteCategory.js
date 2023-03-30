$(document).ready(function(){
// User Delete
    $(document).on("click", "#categoryDelete", function(){
      var id = $(this).val();
      $.ajax({
        url: "../model/products/category/categoryDelete.php",
        method: "POST",
        data: {id:id},
        success: function(data) {
          $('#Search_Box').val('');
          $.getScript("../js/products/category/category.js");
        }
      });
    });

});
