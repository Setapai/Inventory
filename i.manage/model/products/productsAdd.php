<?php
include_once('../services/db.php');
database();


function insertProduct(){
  global $con;


  if (empty($_FILES['image']['name'])) {
    $pname = $_POST['pname'];
    $price = $_POST['price'];
    $wprice = $_POST['wprice'];
    $cat = $_POST['cat'];
    $brand = $_POST['brand'];
    $qty = $_POST['qty'];
    $desc = $_POST['desc'];
    $date = date('Y-m-d H:i:s');
    $cashierName = empty($_SESSION['fullname'])? 'CashierNotFound' : $_SESSION['fullname'];

    try {
      $call ="INSERT INTO products
      VALUES(0,'$pname','$brand','$cat', '$qty','$price','$wprice', '$desc', '', '$date','$cashierName','',null)";
      $q = $con->query($call);

      $_SESSION['errorHandlingProd'] = '<div id="ErrorHandle" class="alert alert-success" role="alert">
      <button type="button" class="close" data-dismiss="alert">&times;</button>
      <span>A Product Have Been added </span>
      </div>';
    } catch (\Exception $e) {
      $_SESSION['errorHandlingProd'] = '<div id="ErrorHandle" class="alert alert-danger" role="alert">
      <button type="button" class="close" data-dismiss="alert">&times;</button>
      <span>Failed To add Product : '.$e.'.</span>
      </div>';
    }


  }else {
    $temp_name = $_FILES['image']['tmp_name'];
    $basename = basename($_FILES["image"]["name"]);
    $filename = $_FILES['image']['name'];
    $size =$_FILES['image']['size'];
    $fileExt = explode('.',$filename);
    $fileActExt = strtolower(end($fileExt));
    $max = (8*1000)*10000;


    if ($size > $max) {
      $_SESSION['LargeFile'] = "Failed To Upload File Is Too Large Please Try Again";
    } else {
      if (empty($_FILES['image']['name'])) {
        $filenewname = "No Image";

        $image = "INSERT INTO products (image) VALUES ('$filenewname')";
        $mysql = $con->query($image);
      }
      else {
        $filenewname = uniqid('', False) .".". $fileActExt;
        $target = '../assets/products/' . $filenewname;

        $pname = $_POST['pname'];
        $price = $_POST['price'];
        $wprice = $_POST['wprice'];
        $cat = $_POST['cat'];
        $brand = $_POST['brand'];
        $qty = $_POST['qty'];
        $desc = $_POST['desc'];
        $date = date('Y-m-d H:i:s');

        $call ="INSERT INTO products
        VALUES(0,'$pname','$brand','$cat', '$qty','$price','$wprice', '$desc', '$filenewname', '$date','$cashierName','',null)";
        $q = $con->query($call);
        move_uploaded_file($temp_name,$target);




      }
    }

  }


}

?>
