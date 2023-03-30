<?php
include_once('../../services/db.php');
database();
global $con;

    $id = $_POST['id'];
    $qty = $_POST['qty'];

    $call = "UPDATE orders_dummy SET qty  = '$qty' WHERE id = '$id' ";
    $q = $con->query($call);

 ?>
