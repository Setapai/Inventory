$(document).ready(function(){
  var date =  new Date().toLocaleDateString();
  var time = new Date().toLocaleTimeString([], { hour: '2-digit', minute: "2-digit" });
  $('#getDate').text(date);
  $('#getTime').text(time);
  getTotal();

  function getTotal()
  {
    $.ajax({
      url:"../controller/orders/getTotal.php",
      method:"POST",
      success:function(data)
      {
        $('#getTotalContents').html(data);
        $('#copyTotal').val($('#getTotalContents').text());
      }
    });
  }
});
