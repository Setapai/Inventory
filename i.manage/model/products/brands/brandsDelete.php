<?php
include_once('../../../services/db.php');
database();
global $con;

    $id = $_POST['id'];

    $sql = "DELETE FROM brands WHERE id = $id";
    $q = $con->query($sql);
 ?>
