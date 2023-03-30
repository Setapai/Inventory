<?php
include_once('./services/db.php');
database();

function LoginAccount($postUname, $postPword)
{
  global $con;

  $uname = $postUname;
  $pword = $postPword;

  $sql = "SELECT * FROM users WHERE uName = '$uname' AND pWord = '$pword' ";
  $statement = $con->query($sql);
  $rowCount = $statement->rowCount();
  if($rowCount > 0){
    $result = $statement->fetch(PDO::FETCH_ASSOC);
      $_SESSION['fullname'] = $result['fName'] ." ". $result['lName'];
      $_SESSION['fName'] = $result['fName'];
      $_SESSION['accStatus'] = $result['status'];
      header('location:./view/home.php?dashboard');
  }
  else{
    $_SESSION['loginErrorHand'] = '<div class="alert alert-danger" role="alert">
      <button type="button" class="close" data-dismiss="alert">&times;</button>
      <span> User Not Found </span>
    </div>';
  }
}


?>
