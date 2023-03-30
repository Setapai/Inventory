<?php
include_once('../../services/db.php');
database();
global $con;

    $UID = $_POST['id'];

    $sql = "DELETE FROM users WHERE id = $UID";
    $q = $con->query($sql);

    echo '<div id="ErrorHandle" class="alert alert-success" role="alert">
    <button type="button" class="close" data-dismiss="alert">&times;</button>
    <span>A User Have Been Deleted </span>
    </div>';
 ?>
