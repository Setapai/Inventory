<?php
include_once('../services/db.php');
database();

function getYear(){
  global $con;
  $date = date('Y-m-d H:i:s');
  $sql = "SELECT  DATE_FORMAT(date, '%Y') AS year FROM order_records
          WHERE loan_status != 'Loan'
          GROUP BY DATE_FORMAT(date, '%Y')";
  $statement = $con->query($sql);
  $res = $statement->fetchAll(PDO::FETCH_ASSOC);
  return $res;
}


 ?>
