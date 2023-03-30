<?php
include_once('../services/db.php');
database();


  function viewBrands(){
    global $con;
    $call ="SELECT * FROM brands";
    $q = $con->query($call);
    $fetch = $q->fetchAll(PDO::FETCH_ASSOC);
    return $fetch;
  }

 ?>
