<?php
include_once('../services/db.php');
database();

function getDates(){
  global $con;
  $sql = "SELECT  DATE(dateTime) AS showdate FROM def_products GROUP BY showdate";
  $statement = $con->query($sql);
  $res = $statement->fetchAll(PDO::FETCH_ASSOC);
  return $res;
}

 ?>
