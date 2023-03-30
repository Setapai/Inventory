<?php
include_once('../services/db.php');
database();


  function viewCategory(){
    global $con;
    $call ="SELECT * FROM category";
    $q = $con->query($call);
    $fetch = $q->fetchAll(PDO::FETCH_ASSOC);
    return $fetch;
  }

 ?>
