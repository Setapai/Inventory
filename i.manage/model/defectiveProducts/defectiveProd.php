<?php
include_once('../services/db.php');
database();

  function viewDefects(){
    global $con;

    $id = $_POST['viewDefects'];
    $copyOrder = " SELECT
    products.product,
    products.brand,
    products.category,
    def_products.id,
    def_products.qty,
    def_products.description,
    def_products.acc,
    def_products.updateAcc,
    DATE(def_products.lastUpdate) AS lastUpdate,
    DATE(def_products.dateTime) AS date
    FROM def_products INNER JOIN products ON products.id = def_products.prodID WHERE def_products.id = '$id' ";
    $q = $con->query($copyOrder);
    $fetch = $q->fetchAll(PDO::FETCH_ASSOC);
    return $fetch;

  }

 ?>
