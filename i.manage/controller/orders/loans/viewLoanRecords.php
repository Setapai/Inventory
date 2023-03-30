<?php
session_start();
include_once('../../../services/db.php');
database();
global $con;


$sessionID = $_SESSION['orderRecID'];

$sql = "
SELECT payments,DATE(dateTime) AS dateTime, addedBy FROM loans WHERE loans.order_recID = '$sessionID'
";

// if($_POST['query'] != '')
// {
//   $text = $_POST['query'];
//   $sql .= "
//     AND product LIKE '%$text%'
//   ";
// }

$sql .= 'ORDER BY id ASC ';

$statement = $con->query($sql);
$res = $statement->fetchAll(PDO::FETCH_ASSOC);
$rowCount = $statement->rowCount();

foreach($res AS $row) {
  if ($rowCount > 0) {
    ?>
      <tr>
        <td><?php echo $row['addedBy']; ?></td>
        <td><?php echo $row['payments']; ?> ₱</td>
        <td><?php echo $row['dateTime']; ?></td>
      </tr>
    <?php
  }else {
    ?>
    <tr>
      <td colspan="2"> No Data </td>
    </tr>
    <?php
  }
}
?>
