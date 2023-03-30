<?php
include_once('../services/db.php');
database();

  function uploadExcel()
  {
    global $con;
// TBR
    $date = date('Y-m-d h:i:s');
    $cashierName = empty($_SESSION['fullname'])? 'CashierNotFound' : $_SESSION['fullname'];
    // getCsv
    $csv = $_FILES['excelData']['tmp_name'];
    // readCsv
    $file = fopen($csv,'r');
    // getCsvData
    $container = array();

    // CALL TABLE TO DETECT THE DUPLICATIONS
      // Products
        $call ="SELECT * FROM products";
        $q = $con->query($call);
        $res = $q->fetchAll(PDO::FETCH_ASSOC);
      // category
      $cat ="SELECT * FROM category";
      $qCat = $con->query($cat);
      $getCat = $qCat->fetchAll(PDO::FETCH_ASSOC);
      // Brands
      $bran ="SELECT * FROM brands";
      $qBran = $con->query($bran);
      $getBran = $qBran->fetchAll(PDO::FETCH_ASSOC);
    //

   while ($row = fgetcsv($file) ){
     array_push($container,$row);
   }
   try {
     foreach ($container As $key => $value) {
       //
       if ($key == 0) {
         $rowOne = "'".implode("','",$value)."'";
         if ($value == $rowOne) {
           break;
         }
       }
       elseif ($key > 0) {
         $rowTwo = "'".implode("','",$value)."'";
         $rowCat = $value['2'];
         $rowBran = $value['1'];

         $SQL ="INSERT IGNORE INTO brands VALUES (0,'$rowBran','$cashierName')  ";
         $q = $con->query($SQL);
         $SQL ="INSERT IGNORE INTO category VALUES (0,'$rowCat','$cashierName')  ";
         $q = $con->query($SQL);
         $sql = "INSERT IGNORE INTO products (product,brand,category,qty,price,wprice,description,image,dateTime,addedBy,updatedBy,lastUpdate)
         VALUES ($rowTwo,'','$date','$cashierName','',null) ";
         $q = $con->query($sql);
       }
       }

       fclose($file);

       $_SESSION['errorHandlingProd'] = '<div id="ErrorHandle" class="alert alert-success" role="alert">
         <button type="button" class="close" data-dismiss="alert">&times;</button>
         <span>import success </span>
       </div>';
     }catch (\Exception $e) {

       $_SESSION['errorHandlingProd'] = '<div id="ErrorHandle" class="alert alert-danger" role="alert">
         <button type="button" class="close" data-dismiss="alert">&times;</button>
         <span>Failed To Import : '.$e.'.</span>
       </div>';
   }

  }
 ?>
