<?php
include_once('../services/db.php');
database();


    function addOrdersTruncate(){
      global $con;
      $delete = " TRUNCATE orders_dummy ";
      $q = $con->query($delete);
    }



 ?>
