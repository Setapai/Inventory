$(document).ready(function(){

      $(document).on("click", "#depositLoan", function(){
        var id = $(this).val();
        $.ajax({
          url: "../controller/orders/loans/loansDepositModal.php",
          method: "POST",
          data: {id:id},
          success: function(data) {
            $("#loanDepositModal").html(data);
            $("#loanDepositModal").fadeIn(500);
            $('#newBal').on('input', function () {
              var value = $(this).val();
              var maxVal = $('#remBal').val();

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


      $(document).on("click", "#closeOrderItemModal", function(){
        $("#loanDepositModal").fadeOut(500);
      });

});
