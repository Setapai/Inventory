$(document).ready(function(){

 load_data(1);

 function load_data(page, query = '')
 {
   $.ajax({
     url:"../controller/reports/loanRecordsMonth.php",
     method:"POST",
     data:{page:page, query:query},
     success:function(data)
     {
       $('#monthlyLoansTableContents').html(data);
     }
   });
 }


 $(document).on('click', '.page-link', function(){
   var page = $(this).data('page_number');
   var query = $('#search_box_m').val();
   load_data(page, query);
 });
// Select
 $('#search_box_m').keyup(function(){
   var query = $('#search_box_m').val();
   load_data(1, query);
 });

});
