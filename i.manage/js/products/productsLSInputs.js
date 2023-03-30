$(document).ready(function(){

    $(document).on("click", "#updateLS", function(){
      var id = $(this).val();
      $.ajax({
        url: "../controller/products/productsInputs.php",
        method: "POST",
        data: {id:id},
        success: function(data) {
          $("#productsLSInputsTableContents").html(data);
        }
      });
    });

});
