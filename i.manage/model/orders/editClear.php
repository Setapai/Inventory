<?php
include_once('../services/db.php');
database();

function editBtn(){
  global $con;

  $call = "SELECT * FROM order_records";
  $q = $con->query($call);
  $fetch = $q->fetchAll(PDO::FETCH_ASSOC);

  foreach ($fetch as $value) {
    $status = $value['loan_status'];
    $id = $value['id'];
    if ($value['oldLoan_status'] == 'Paid' AND $value['loan_status'] == 'Refunded') {

      $call = "UPDATE order_records SET oldLoan_status = '$status',loan_status  = 'Paid' WHERE id = '$id' ";
      $q = $con->query($call);
    }elseif ($value['oldLoan_status'] == 'Inpass' AND $value['loan_status'] == 'Refunded') {

      $call = "UPDATE order_records SET oldLoan_status = '$status',loan_status  = 'Inpass' WHERE id = '$id' ";
      $q = $con->query($call);
    }elseif ($value['oldLoan_status'] == 'Loan' AND $value['loan_status'] == 'Refunded') {

      $call = "UPDATE order_records SET oldLoan_status = '$status',loan_status  = 'Loan' WHERE id = '$id' ";
      $q = $con->query($call);
    }
  }


}


?>
