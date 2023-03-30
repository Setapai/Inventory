<?php
include_once('../../services/db.php');
database();
global $con;

  $id = $_POST['id'];
  // updateQty
  $qty = 1;
  //
    $sql = "SELECT * FROM orders_dummy WHERE prodID = '$id' ";
    $state = $con->query($sql);
    $res = $state->fetchAll(PDO::FETCH_ASSOC);

    foreach ($res as $value) {
      $prodID = $value['prodID'];
      $qty = $value['qty'];
    }

    if ($id == $prodID) {

      $callRelation = "SELECT orders_dummy.id AS orderID, orders_dummy.prodID, products.qty AS productQty,  orders_dummy.qty AS orderQty
      FROM orders_dummy INNER JOIN products ON orders_dummy.prodID = products.id WHERE orders_dummy.prodID = '$id'  ";
      $getQuery = $con->query($callRelation);
      $result = $getQuery->fetchAll(PDO::FETCH_ASSOC);

        foreach ($result as $value) {
          if ($value['orderQty'] <= $value['productQty']) {
            if ($value['orderQty'] == $value['productQty']) {
              $qty - 1;
            }else {
              $qty++;
            }
            $callUp = "UPDATE orders_dummy SET qty = '$qty' WHERE prodID = '$id' ";
            $q = $con->query($callUp);
          }
        }

    }else {
      // Add
      $addOrder = "INSERT INTO orders_dummy SELECT 0,id,wprice,price,'$qty',dateTime,'Retail'
      FROM products WHERE id = '$id' ";
      $q = $con->query($addOrder);

      $updateID = $con->lastInsertId();

      // Update
      $callUp = "UPDATE orders_dummy SET qty = '$qty' WHERE id = '$updateID' ";
      $q = $con->query($callUp);

    }


 ?>
