$(document).ready(function(){

  $(document).on("click", "#loanUpdate", function(){
    var id = $(this).val();
    var newBal = $('#newBal').val();
    var rembal = $('#remBal').val();
    var total = $('#total').val();
    var disTotal = $('#disTotal').val();
    var curbal = $('#curbal').val();

    var inpassCheck = parseInt(curbal) + parseInt(newBal);


    $("#loanDepositModal").fadeOut(500);
    $.ajax({
      url: "../model/orders/loans/depositLoan.php",
      method: "POST",
      data: {id:id,newBal:newBal,rembal:rembal,total:total,disTotal:disTotal,inpassCheck:inpassCheck},
      success: function(data) {
        $.getScript("../js/orders/loans/loans.js");
      }
    });
  });

});
