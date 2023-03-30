$(document).ready(function(){

    $(document).on("click", "#imageIDLink", function(){
      var image = $(this).text();
      $.ajax({
        url: "../controller/products/productsImages.php",
        method: "POST",
        data: {image:image},
        success: function(data) {
          $("#prodViewImageTableContents").html(data);
        }
      });
    });

});
