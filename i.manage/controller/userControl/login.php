<?php
// LoginChecker
include_once('./model/userControl/login.php');

if(isset($_POST['login'])){
  LoginAccount($_POST['uname']  , $_POST['pword']);
}

 ?>
