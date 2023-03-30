<?php
include_once('../services/db.php');
database();

  function addOrders(){
    global $con;

    $custname = $_POST['custname'];
    $custpnum = empty($_POST['custPnum']) ?' ': $_POST['custPnum'];
    $discount = empty($_POST['discount']) ?'0': $_POST['discount'];
    $dpayment = empty($_POST['dPayment']) ?'0': $_POST['dPayment'];
    $loanStatus = empty($_POST['dPayment']) ?'Paid': 'Loan';
    $cashierName = empty($_SESSION['fullname'])? 'CashierNotFound' : $_SESSION['fullname'];
    $total = $_POST['total'];

    $date = date('Y-m-d H:i:s');
    $billname = uniqid(false);

    $call ="INSERT INTO order_records
    VALUES(0,'$billname','$custname','$custpnum','$date','$discount','$cashierName','$loanStatus','Refunded','$date')";
    $q = $con->query($call);

    $lastid = $con->lastInsertId();

    $_SESSION['orderRecID'] = $lastid;

    $copyOrder = "INSERT INTO orders SELECT 0,prodID,wprice,price,qty,'$date','$lastid',status,'$loanStatus' FROM orders_dummy";
    $q = $con->query($copyOrder);

    if($loanStatus == 'Loan'){
      $call = "SELECT SUM(price * qty) AS total FROM orders_dummy";
      $q = $con->query($call);
      $fetch = $q->fetchAll(PDO::FETCH_ASSOC);

      foreach ($fetch as $value) {
        $getTotal = $value['total'];
      }

      $loans ="INSERT INTO loans
      VALUES(0,'$total', '$getTotal','$dpayment', '$date', '$lastid','$cashierName')";
      $q = $con->query($loans);

    }

// PRODUCTS

    $getProd = "SELECT (p.qty - o.qty) AS qty, p.id AS pid, o.order_recID AS oID FROM products p
                INNER JOIN orders o ON p.id = o.prodID WHERE o.order_recID = '$lastid' ";
    $q = $con->query($getProd);
    $fetch = $q->fetchAll(PDO::FETCH_ASSOC);

    foreach ($fetch as $value) {
      $newQty = $value['qty'];
      $prodID = $value['pid'];
      $update = " UPDATE products SET qty = '$newQty' WHERE id = '$prodID'  ";
      $q = $con->query($update);
    }


    if ($_SESSION['accStatus'] != 'Admin') {
      $_SESSION['viewOrderCondition'] = 'StaffActive';
    }


    $delete = " TRUNCATE orders_dummy ";
    $q = $con->query($delete);
  }


  function viewOrders(){
    global $con;

    if (empty($_SESSION['orderRecID'])) {
      $id = $_POST['viewOrder'];
      $_SESSION['orderRecID'] = $id;
    }else {
      $id = $_SESSION['orderRecID'];
    }
    if (!empty($id)) {

      $sql = "SELECT * FROM order_records WHERE id = '$id'  ";
      $q = $con->query($sql);
      $fetch = $q->fetchAll(PDO::FETCH_ASSOC);
      foreach ($fetch as $value) {
        $getStatus = $value['loan_status'];
      }

      if ($getStatus == 'Loan') {
        // GET LOANDS STATUS
        $sql ="SELECT
        order_records.id,
        order_records.receipt,
        order_records.name,
        order_records.pnum,
        order_records.date,
        order_records.discount,
        order_records.date,
        order_records.loan_status,
        order_records.sold_by,
        DATE(order_records.inpassDate) AS inDate,
        loans.total AS totalprice,
        loans.discountedTotal AS discTotal,
        SUM(loans.payments) AS balance,
        (loans.discountedTotal - SUM(loans.payments)) AS remBalanace
        FROM order_records
        INNER JOIN loans ON	order_records.id = loans.order_recID
        WHERE order_records.id = '$id'
        GROUP BY loans.Total,loans.discountedTotal,order_records.id";

        $q = $con->query($sql);
        $fetch = $q->fetchAll(PDO::FETCH_ASSOC);
        return $fetch;
      }else {
        // Get PAID STATUS
        $viewData="SELECT
                  a.id,
                  a.receipt,
                  a.name,
                  a.pnum,
                  a.date,
                  a.discount,
                  a.sold_by,
                  DATE(a.inpassDate) AS inDate,
                  a.loan_status,
                  SUM((IF(b.status = 'WholeSale',b.wprice,b.price) * b.qty)-((IF(b.status = 'WholeSale',b.wprice,b.price) * b.qty) * a.discount / 100))
                   AS discTotal,
                      SUM(IF(b.status = 'WholeSale',(b.wprice * b.qty),(b.price * b.qty))) AS totalprice,
                  COUNT(b.qty) AS totalItems
                  FROM order_records a INNER JOIN orders b
                  ON a.id	=	b.order_recID WHERE a.id = '$id'
                  GROUP BY a.id, a.name";
          $q = $con->query($viewData);
          $fetchUsers = $q->fetchAll(PDO::FETCH_ASSOC);
          return $fetchUsers;
      }


    }

  }
 ?>
