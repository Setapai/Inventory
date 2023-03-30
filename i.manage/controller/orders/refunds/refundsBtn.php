<?php
  include_once('../../../services/db.php');
  database();
  global $con;

  $id = $_POST['id'];

  $call = "SELECT * FROM order_records WHERE id = $id";
  $q = $con->query($call);
  $fetch = $q->fetchAll(PDO::FETCH_ASSOC);

  foreach ($fetch as $value) {
    if($value['loan_status'] == 'Refunded'){
      ?>
      <button id="refundBtn" type="button"
      name="button" value="<?php echo $value["id"] ?>"
      class="btn btn-primary float-right">Edit <i class="bi bi-check-circle"></i></button>
      <?php
    }else {
      ?>
      <button id="refundBtn" type="button"
      name="button" value="<?php echo $value["id"] ?>"
      class="btn btn-secondary float-right">Edit <i class="bi bi-check-circle"></i></button>
      <?php
    }
  }


 ?>
