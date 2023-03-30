<?php
include_once('../services/db.php');
  database();


    function insertUser(){
      global $con;
      $uname = $_POST['uName'];
      $pword = $_POST['pWord'];
      $email = $_POST['email'];
      $fname = $_POST['fName'];
      $lname = $_POST['lName'];
      $pnum = $_POST['pNum'];
      $gender = $_POST['gender'];
      $status = $_POST['status'];
      $date = date('Y-m-d H:i:s');

      try {
        $call ="INSERT INTO users
        VALUES(0,'$uname',  '$pword', '$email', '$fname', '$lname', '$pnum',  '$gender',  '$status',  '$date')";
        $q = $con->query($call);

        $_SESSION['errorHandling'] = '<div id="ErrorHandle" class="alert alert-success" role="alert">
          <button type="button" class="close" data-dismiss="alert">&times;</button>
          <span>A User Have Been Added </span>
        </div>';
      } catch (\Exception $e) {
        $_SESSION['errorHandling'] = '<div id="ErrorHandle" class="alert alert-danger" role="alert">
          <button type="button" class="close" data-dismiss="alert">&times;</button>
          <span>Failed To add User : Username Duplicate</span>
        </div>';


      }


    }

 ?>
