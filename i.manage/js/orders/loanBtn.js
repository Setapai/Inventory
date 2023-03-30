$(document).ready(function(){

  $("#loanBtn").click(function(){
  $("#downPayment").toggle();
  $("#downPayment").val(null);
  });

  $('#downPayment').on('input', function () {
    var value = $(this).val();
    var maxVal = $('#getTotalContents').text();

    if ((value !== '') && (value.indexOf('.') === -1)) {
      $(this).val(Math.max(Math.min(value, maxVal), -maxVal));
    }
  });

});
