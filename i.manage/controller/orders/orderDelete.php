<?php
include_once('../../services/db.php');
database();
global $con;

    $UID = $_POST['id'];

    $sql = "DELETE FROM order_records WHERE id = $UID";
    $q = $con->query($sql);

    $sql = "DELETE FROM orders WHERE order_recID = $UID";
    $q = $con->query($sql);

 ?>
