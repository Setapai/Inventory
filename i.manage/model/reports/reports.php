<?php
include_once('../services/db.php');
database();


  function todaysIcome(){
    global $con;

    $sql = "SELECT
    SUM(orders.price * orders.qty) AS rprice,
    SUM(orders.wprice * orders.qty) AS wprice
    FROM orders
    INNER JOIN order_records	ON order_records.id	=	orders.order_recID
    WHERE DATE(order_records.date) = CURDATE() AND order_records.loan_status != 'Loan'";
    $q= $con->query($sql);
    $data = $q->fetchAll(PDO::FETCH_ASSOC);
    foreach ($data as $value) {
      $wprice = $value['wprice'];
      $rprice = $value['rprice'];
    }


    $getDiscount = "SELECT
    SUM(order_records.discount) AS discount
    FROM order_records
    WHERE DATE(order_records.date) = CURDATE() AND order_records.loan_status != 'Loan'";
    $q= $con->query($getDiscount);
    $getDisc = $q->fetchAll(PDO::FETCH_ASSOC);

    foreach ($getDisc as $value) {
      $disc = $value['discount'];
    }


    $loan ="SELECT SUM(payments) AS sumPay FROM loans
    INNER JOIN order_records	ON order_records.id	=	loans.order_recID
    WHERE DATE(order_records.date) = CURDATE() AND order_records.loan_status = 'Loan' ";
    $q= $con->query($loan);
    $loanData = $q->fetchAll(PDO::FETCH_ASSOC);
    foreach ($loanData as $value) {
      $getPayments = $value['sumPay'];
    }

    $final = ($rprice - $wprice) - $disc + $getPayments;
    return $final;
  }

  function yesterdaysIncome(){
    global $con;
      $sql = "SELECT
      SUM(orders.price * orders.qty) AS rprice,
      SUM(orders.wprice * orders.qty) AS wprice
      FROM orders
      INNER JOIN order_records	ON order_records.id	=	orders.order_recID
      WHERE DATE(order_records.date) = DATE_SUB(CURDATE(), INTERVAL 1 DAY) AND order_records.loan_status != 'Loan' ";
      $q= $con->query($sql);
      $data = $q->fetchAll(PDO::FETCH_ASSOC);

      foreach ($data as $value) {
        $wprice = $value['wprice'];
        $rprice = $value['rprice'];
      }


      $getDiscount = "SELECT
      SUM(order_records.discount) AS discount
      FROM order_records
      WHERE DATE(order_records.date) = DATE_SUB(CURDATE(), INTERVAL 1 DAY) AND order_records.loan_status != 'Loan' ";
      $q= $con->query($getDiscount);
      $getDisc = $q->fetchAll(PDO::FETCH_ASSOC);

      foreach ($getDisc as $value) {
        $disc = $value['discount'];
      }

      $loan =" SELECT SUM(payments) AS sumPay FROM loans
      INNER JOIN order_records	ON order_records.id	=	loans.order_recID
      WHERE DATE(order_records.date) = DATE_SUB(CURDATE(), INTERVAL 1 DAY) AND order_records.loan_status = 'Loan' ";
      $q= $con->query($loan);
      $loanData = $q->fetchAll(PDO::FETCH_ASSOC);
      foreach ($loanData as $value) {
        $getPayments = $value['sumPay'];
      }

      $final = ($rprice - $wprice) - $disc + $getPayments;
      return $final;
  }

 ?>
