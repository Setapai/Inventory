<?php
include_once('../../services/db.php');
database();
global $con;

    $id = $_POST['id'];


    $call = "DELETE FROM orders_dummy WHERE id = $id";
    $q = $con->query($call);

 ?>
