<?php
include_once('../../services/db.php');
database();
global $con;

    $UID = $_POST['id'];
    $image = $_POST['image'];

    $sql = "DELETE FROM products WHERE id = $UID";
    $q = $con->query($sql);

    $path = '../assets/products/'.$image.'';

    if (file_exists($path)) {
      unlink('../assets/products/'.$image.'');
    }
 ?>
