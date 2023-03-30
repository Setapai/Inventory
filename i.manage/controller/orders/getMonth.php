<?php
include_once('../../services/db.php');
database();

  global $con;
  $year = $_POST['year'];

  $sql = "
   SELECT  DATE_FORMAT(date, '%M') AS month
   FROM order_records
  ";

  if ($_POST['year']  !=  '') {
    $sql .= "
    WHERE YEAR(date) = '$year'  AND loan_status != 'Loan'
    ";
  }else {
    $sql .= "
      WHERE loan_status != 'Loan'
    ";
  }
  $sql .= " GROUP BY DATE_FORMAT(date, '%M') ";


  $statement = $con->query($sql);
  $res = $statement->fetchAll(PDO::FETCH_ASSOC);
 ?>
   <select class="form-control " id="month" >
     <option hidden selected disabled >Month Search</option>
     <option value="">Show All</option>
     <?php foreach ($res as $value): ?>
     <option value="<?php echo $value['month'] ?>"><?php echo $value['month'] ?></option>
   <?php endforeach; ?>
   </select>
