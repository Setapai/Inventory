<?php
include_once('../services/db.php');
database();

function getDates(){
  global $con;
  $date = date('Y-m-d H:i:s');
  $sql = "SELECT  DATE_FORMAT(date, '%m-%d-%Y') AS showdate,
  DATE_FORMAT(date, '%Y-%m-%d') AS cdate FROM order_records
  WHERE loan_status = 'Loan'
  GROUP BY cdate,showdate";
  $statement = $con->query($sql);
  $res = $statement->fetchAll(PDO::FETCH_ASSOC);
  return $res;
}


 ?>
