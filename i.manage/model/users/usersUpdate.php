<?php
include_once('../services/db.php');
  database();

  // ONCLICK
  function updateUser($uid){
    global $con;
     $_SESSION['uid'] = $uid;

     $call = "SELECT * FROM users WHERE id = '".$_SESSION['uid']."' ";
     $q = $con->query($call);
     $fetchUsers = $q->fetchAll(PDO::FETCH_ASSOC);

     foreach ($fetchUsers as $value) {
       $_SESSION['uname'] = $value['uName'];
       $_SESSION['pword'] = $value['pWord'];
       $_SESSION['email'] = $value['email'];
       $_SESSION['fname'] = $value['fName'];
       $_SESSION['lname'] = $value['lName'];
       $_SESSION['pnum'] = $value['pNum'];
       $_SESSION['gender'] = $value['gender'];
       $_SESSION['status'] = $value['status'];
     }
  }

  // ONUPDATE
  function updateUserData(){
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

          $call = " UPDATE users SET uName = '$uname', pWord= '$pword',  email='$email', fName='$fname', lName='$lname', pNum='$pnum', gender='$gender',  status='$status', dateTime ='$date' WHERE id = '".$_SESSION['uid']."'  ";
          $q = $con->query($call);

          $_SESSION['errorHandling'] = '<div id="ErrorHandle" class="alert alert-success" role="alert">
            <button type="button" class="close" data-dismiss="alert">&times;</button>
            <span>A user Have Been Updated </span>
          </div>';
    } catch (\Exception $e) {
      $_SESSION['errorHandling'] = '<div id="ErrorHandle" class="alert alert-danger" role="alert">
        <button type="button" class="close" data-dismiss="alert">&times;</button>
        <span>Failed To add User : Username Duplicate</span>
      </div>';
    }


  }

  function usersUpdateUnset(){
    unset($_SESSION["uid"]);
    unset($_SESSION["uname"]);
    unset($_SESSION["pword"]);
    unset($_SESSION["email"]);
    unset($_SESSION["fname"]);
    unset($_SESSION["lname"]);
    unset($_SESSION["pnum"]);
    unset($_SESSION["gender"]);
    unset($_SESSION["status"]);
  }

?>
