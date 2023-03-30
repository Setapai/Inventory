<?php
include_once('../services/db.php');
database();


function getYear(){
  global $con;

  $getYearSql = "SELECT DATE_FORMAT(date,'%Y') AS year
  FROM order_records GROUP BY DATE_FORMAT(date,'%Y')";
  $qy= $con->query($getYearSql);
  $getYear = $qy->fetchAll(PDO::FETCH_ASSOC);
  return $getYear;

}

 ?>
