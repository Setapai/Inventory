<?php
include_once('../services/db.php');
database();

  function updateDefects(){
    global $con;

    $id = $_POST['updateDefects'];
    $qty = $_POST['qty']; //newQTY
    $desc = $_POST['defDesc'];
    $cashierName = empty($_SESSION['fullname'])? 'CashierNotFound' : $_SESSION['fullname'];
    $date = date('Y-m-d H:i:s');

    try {
      $defProd = "SELECT * FROM def_products WHERE id = '$id' ";
      $q = $con->query($defProd);
      $fetch = $q->fetchAll(PDO::FETCH_ASSOC);
      foreach ($fetch as $value) {
        $curVal = $value['qty'];
        $prodID = $value['prodID'];
      }
      //
      $prod = "SELECT * FROM products WHERE id = '$prodID' ";
      $q = $con->query($prod);
      $fetch = $q->fetchAll(PDO::FETCH_ASSOC);
      foreach ($fetch as $value) {
        $prodQty = $value['qty'] + $curVal;
        $prodID = $value['id'];
        $call = "UPDATE Products SET qty  = '$prodQty' WHERE id = '$prodID' ";
        $q = $con->query($call);
      }

      $newQTY = $prodQty - $qty;

      $call = "UPDATE def_products SET qty  = '$qty', description = '$desc',updateAcc='$cashierName',lastUpdate='$date' WHERE id = '$id' ";
      $q = $con->query($call);

      $call = "UPDATE Products SET qty  = '$newQTY' WHERE id = '$prodID' ";
      $q = $con->query($call);

      $_SESSION['errorHandlingDefProd'] = '<div id="ErrorHandle" class="alert alert-success" role="alert">
      <button type="button" class="close" data-dismiss="alert">&times;</button>
      <span>A Defective Product Have Been Updated </span>
      </div>';
    } catch (\Exception $e) {
      $_SESSION['errorHandlingDefProd'] = '<div id="ErrorHandle" class="alert alert-danger" role="alert">
      <button type="button" class="close" data-dismiss="alert">&times;</button>
      <span>Failed To Update Defective Product : '.$e.'.</span>
      </div>';
    }


  }

 ?>
