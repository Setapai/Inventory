
<?php
include_once('../services/db.php');
database();
function export()
{
  global $con;
  header('Content-Type: text/csv; charset=utf-8');
  header('Content-Disposition: attachment; filename=Products.csv');
  //CALL OUTPUT STREAM
  $output = fopen("php://output", "w");
  //Csv Header row 1
  fputcsv($output,array('Products','brand','category','quantity','Retail Price','WholeSale Price','Description'));
  $call ="SELECT product,brand,category,qty,price,wprice,description FROM products ORDER BY id desc";
  $q = $con->query($call);
  $res = $q->fetchAll(PDO::FETCH_ASSOC);
  //CSV DATA AFTER ROW 1
  foreach ($res as $value) {
      fputcsv($output,$value);
  }
  //CLOSE THE OUTPUT STREAM
  fclose($output);
  exit();



}
 ?>
