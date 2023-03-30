<?php
include_once('../services/db.php');
  database();

  // ONCLICK
  function updateProducts($uid){
    global $con;
     $_SESSION['uid'] = $uid;

     $call = "SELECT *, DATE(lastUpdate) AS dateUpdated,DATE(dateTime) AS prodDate FROM products WHERE id = '".$_SESSION['uid']."' ";
     $q = $con->query($call);
     $fetchUsers = $q->fetchAll(PDO::FETCH_ASSOC);

     foreach ($fetchUsers as $value) {
       $_SESSION['product'] = $value['product'];
       $_SESSION['qty'] = $value['qty'];
       $_SESSION['price'] = $value['price'];
       $_SESSION['wprice'] = $value['wprice'];
       $_SESSION['cat'] = $value['category'];
       $_SESSION['brand'] = $value['brand'];
       $_SESSION['desc'] = $value['description'];
       $_SESSION['image'] = $value['image'];
       $_SESSION['AddedBy'] = $value['addedBy'];
       $_SESSION['updatedBy'] = $value['updatedBy'];
       $_SESSION['lastUpdate'] = $value['dateUpdated'];
       $_SESSION['dateTime'] = $value['prodDate'];
     }
  }

  // ONUPDATE
  function updateProductsData(){
    global $con;


    $id = $_SESSION['uid'];
    $imgname = $_SESSION['image'];

    $pname = $_POST['pname'];
    $price = $_POST['price'];
    $wprice = $_POST['wprice'];
    $cat = $_POST['cat'];
    $brand = $_POST['brand'];
    $qty = $_POST['qty'];
    $desc = $_POST['desc'];
    $date = date('Y-m-d H:i:s');
    $cashierName = empty($_SESSION['fullname'])? 'CashierNotFound' : $_SESSION['fullname'];

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

      if (!empty($_FILES['image']['name'])) {

        if ($imgname == $_FILES['image']['name']) {

          $filenewname = uniqid('', False) .".". $fileActExt;
          $target = '../assets/products/' . $filenewname;
          $image = "UPDATE products SET image = '$filenewname' WHERE id = '$id' ";
          $mysql = $con->query($image);

          $path = '../assets/products/'.$imgname.'';

          if (file_exists($path)) {
            unlink('../assets/products/'.$imgname.'');
          }

          move_uploaded_file($temp_name,$target);

        }else {

          $filenewname = uniqid('', False) .".". $fileActExt;
          $target = '../assets/products/' . $filenewname;
            $image = "UPDATE products SET image = '$filenewname' WHERE id = '$id' ";
            $mysql = $con->query($image);
            $path = '../assets/products/'.$imgname.'';
            if (file_exists($path)) {
              unlink('../assets/products/'.$imgname.'');
            }
            move_uploaded_file($temp_name,$target);
        }
      }
    }

        try {
          $image = "UPDATE products SET  product = '$pname',
          wprice= '$wprice', category= '$cat', brand= '$brand',
           price= '$price',  qty='$qty', description='$desc', lastUpdate = '$date',updatedBy = '$cashierName' WHERE id = '$id' ";
          $mysql = $con->query($image);

          $_SESSION['errorHandlingProd'] = '<div id="ErrorHandle" class="alert alert-success" role="alert">
            <button type="button" class="close" data-dismiss="alert">&times;</button>
            <span>A Product Have Been updated </span>
          </div>';
        } catch (\Exception $e) {
          $_SESSION['errorHandlingProd'] = '<div id="ErrorHandle" class="alert alert-danger" role="alert">
            <button type="button" class="close" data-dismiss="alert">&times;</button>
            <span>Failed To update Product : '.$e.'.</span>
          </div>';
        }





  }

  function productsUpdateUnset(){
    unset($_SESSION["uid"]);
    unset($_SESSION["dateTime"]);
    unset($_SESSION["AddedBy"]);
    unset($_SESSION["updatedBy"]);
    unset($_SESSION["lastUpdate"]);
    unset($_SESSION["product"]);
    unset($_SESSION["price"]);
    unset($_SESSION["wprice"]);
    unset($_SESSION["brand"]);
    unset($_SESSION["cat"]);
    unset($_SESSION["qty"]);
    unset($_SESSION["desc"]);
    unset($_SESSION["image"]);
  }

?>
