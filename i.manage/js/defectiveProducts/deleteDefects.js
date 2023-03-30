$(document).ready(function(){
// User Delete
    $(document).on("click", "#deleteDefects", function(){
      var id = $(this).val();
      $.ajax({
        url: "../controller/defectiveProducts/deleteDefects.php",
        method: "POST",
        data: {id:id},
        success: function(data) {
          $('#Search_Box').val('');
          $.getScript("../js/defectiveProducts/defProd.js");
        }
      });
    });

});
