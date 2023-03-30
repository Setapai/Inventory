<?php
include_once('../../services/db.php');
database();

  global $con;
  $date = date('Y-m-d H:i:s');
  $year =$_POST['year'];
  $month =$_POST['month'];

  $sql = "
   SELECT DATE_FORMAT(date, '%d')
    AS day FROM order_records
  ";

  if (!empty($year) AND !empty($month)) {
    $sql .= "
    WHERE DATE_FORMAT(date, '%M') = '$month'
    AND YEAR(date) = '$year'
    AND order_records.loan_status != 'Loan'
    ";
  }elseif (!empty($year)) {
    $sql .= "
      WHERE YEAR(date) = '$year'
        AND loan_status != 'Loan'
    ";
  }elseif (!empty($month)) {
      $sql .= "
       WHERE DATE_FORMAT(date, '%M') = '$month'
        AND loan_status != 'Loan'
      ";
  }else {
      $sql .= "
      WHERE order_records.loan_status != 'Loan'
      ";
  }

  $sql .= " GROUP BY DATE_FORMAT(date, '%d')
    ORDER BY  DATE_FORMAT(date, '%d') ";


  $statement = $con->query($sql);
  $res = $statement->fetchAll(PDO::FETCH_ASSOC);
 ?>
  <select class="form-control" id="day">
    <option hidden selected disabled>Date Search</option>
    <option value="">Show All</option>
     <?php foreach ($res as $value): ?>
     <option value="<?php echo $value['day'] ?>"><?php echo $value['day'] ?></option>
   <?php endforeach; ?>
   </select>
