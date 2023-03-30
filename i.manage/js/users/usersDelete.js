$(document).ready(function(){
// User Delete
    $(document).on("click", "#userDelete", function(){
      var id = $(this).val();
      $.ajax({
        url: "../controller/users/usersDelete.php",
        method: "POST",
        data: {id:id},
        success: function(data) {
          $('#Search_Box').val('');
          $.getScript("../js/users/users.js");
        }
      });
    });

});
