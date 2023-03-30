<?php
include_once('../services/db.php');
database();

  function addDefects(){
    global $con;

    $prodID = $_POST['prodID'];
    $qty = empty($_POST['newQty'])?1:$_POST['newQty'];
    $desc = $_POST['defDesc'];
    $curQty = $_POST['curQty'];
    $cashierName = empty($_SESSION['fullname'])? 'CashierNotFound' : $_SESSION['fullname'];

    $ProdNewQty = $curQty - $qty;

    try {
      $date = date('Y-m-d H:i:s');
      $copyOrder = "INSERT INTO def_products SELECT 0,'$prodID','$qty','$desc','$date','$cashierName','',null,'defective' FROM products WHERE id = '$prodID' ";
      $q = $con->query($copyOrder);

      $call = "UPDATE products SET qty  = '$ProdNewQty' WHERE id = '$prodID' ";
      $q = $con->query($call);

      $_SESSION['errorHandlingDefProd'] = '<div id="ErrorHandle" class="alert alert-success" role="alert">
      <button type="button" class="close" data-dismiss="alert">&times;</button>
      <span>A Defective Product Have Been added </span>
      </div>';
    } catch (\Exception $e) {
      $_SESSION['errorHandlingDefProd'] = '<div id="ErrorHandle" class="alert alert-danger" role="alert">
      <button type="button" class="close" data-dismiss="alert">&times;</button>
      <span>Failed To add Defective Product : '.$e.'.</span>
      </div>';
    }



  }

 ?>
