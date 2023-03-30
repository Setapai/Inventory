<?php
session_start();
date_default_timezone_set('Asia/Manila');
include_once('../controller/dashboard/dashboard.php');
include '../controller/homeController.php';
?>

<!DOCTYPE html>
<html lang="en" dir="ltr">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <title>Imanage</title>
  <link rel="shortcut icon" href="../assets/fav.png">
  <!-- Bootstrap -->
  <link rel="stylesheet" href="../css/bootstrap.min.css">
  <link rel="stylesheet" href="../css/bootstrap-icons.css">

  <!-- CustomScrollBar -->
  <link rel="stylesheet" href="../css/jquery.mCustomScrollbar.min.css">
  <!-- Data Tables -->
  <link rel="stylesheet" href="../css/datatables.min.css">
  <!-- stylesheet -->
  <link rel="stylesheet" href="../css/defaults.css">
  <link rel="stylesheet" href="../css/style2.css">
</head>
<body>
  <div class="container-fluid">
    <div class="row">
      <div class="wrapper">

        <?php include 'panel.php';  ?>
        <!-- Page Content  -->
        <div id="content">
          <?php

          if (empty($_SESSION['accStatus'])) {
            header('location:../');
          }else {
            //ADMIN
            if ($_SESSION['accStatus'] == 'Admin') {
              // ADMIN LINKS
              if(isset($_GET['users'])){
                include 'users/users.php';
                usersUpdateUnset();
                unset($_SESSION["errorHandling"]);
              }elseif (isset($_GET['addUsers'])) {
                include 'users/addUsers.php';
                unset($_SESSION["errorHandling"]);
              }elseif (isset($_GET['updateUsers'])) {
                include 'users/usersUpdate.php';
                unset($_SESSION["errorHandling"]);
              }
              //Products
              elseif (isset($_GET['products'])) {
                include 'products/products.php';
                productsUpdateUnset();

                unset($_SESSION["errorHandlingProd"]);
              }elseif (isset($_GET['addProducts'])) {
                include 'products/addProducts.php';
                unset($_SESSION["errorHandlingProd"]);
              }elseif (isset($_GET['updateProducts'])) {
                include 'products/productsUpdate.php';
                unset($_SESSION["errorHandlingProd"]);
              }
              // Def Products
              elseif (isset($_GET['defectiveProducts'])) {
                include 'defectiveProducts/defProd.php';
                unset($_SESSION["errorHandlingDefProd"]);
              }
              elseif (isset($_GET['addDefectiveProduct'])) {
                include 'defectiveProducts/addDefProd.php';
                unset($_SESSION["errorHandlingDefProd"]);
              }
              elseif (isset($_GET['editDefects'])) {
                include 'defectiveProducts/editDefProd.php';
                unset($_SESSION["errorHandlingDefProd"]);
              }
              // Category
              elseif (isset($_GET['category'])) {
                include 'products/category/category.php';
              }
              // Brands
              elseif (isset($_GET['brands'])) {
                include 'products/brands/brands.php';
              }
              //Orders
              elseif (isset($_GET['orders'])) {
                editBtn();
                include 'orders/orders.php';
                unset($_SESSION["orderRecID"]);

              }elseif (isset($_GET['addOrders'])) {
                addOrdersTruncate();
                include 'orders/addOrders.php';
              }elseif (isset($_GET['viewOrders'])) {
                include 'orders/viewOrders.php';
              }
              // Loans
              elseif (isset($_GET['loans'])) {
                editBtn();
                include 'orders/loans/loans.php';
              }
              //reports
              elseif (isset($_GET['reports'])) {
                include 'reports/reports.php';
              }
              elseif (isset($_GET['salesReports'])) {
                unset($_SESSION["salesReportReturn"]);
                include 'salesReport/salesReport.php';
              }

              // dashboard
              else{
                fetchDashboardBox();
                include 'dashboard/Dashboard.php';
              }
            } else {
              // USER LINKS
              // PRODUCTS VIEW
              if (isset($_GET['products'])) {
                include 'products/products.php';
                productsUpdateUnset();
                unset($_SESSION["errorHandlingProd"]);
              }elseif (isset($_GET['addProducts'])) {
                include 'products/addProducts.php';
                unset($_SESSION["errorHandlingProd"]);
              }elseif (isset($_GET['updateProducts'])) {
                include 'products/productsUpdate.php';
                unset($_SESSION["errorHandlingProd"]);
              }
              // Category
              elseif (isset($_GET['category'])) {
                include 'products/category/category.php';
              }
              // Brands
              elseif (isset($_GET['brands'])) {
                include 'products/brands/brands.php';
              }
              // Def Products
              elseif (isset($_GET['defectiveProducts'])) {
                include 'defectiveProducts/defProd.php';
                unset($_SESSION["errorHandlingDefProd"]);
              }
              elseif (isset($_GET['addDefectiveProduct'])) {
                include 'defectiveProducts/addDefProd.php';
                unset($_SESSION["errorHandlingDefProd"]);
              }
              elseif (isset($_GET['editDefects'])) {
                include 'defectiveProducts/editDefProd.php';
                unset($_SESSION["errorHandlingDefProd"]);
              }
              // Orders
              elseif (isset($_GET['viewOrders'])) {
                include 'orders/viewOrders.php';
              }elseif (isset($_GET['orders'])) {
                include 'orders/orders.php';
                unset($_SESSION["orderRecID"]);
              }
              // Loans
              elseif (isset($_GET['loans'])) {
                include 'orders/loans/loans.php';
              }
              //
              else {
                addOrdersTruncate();
                unset($_SESSION["viewOrderCondition"]);
                include 'orders/addOrders.php';
                unset($_SESSION["orderRecID"]);
              }
            }
          }


          ?>
        </div>
      </div>
    </div>
  </div>
</div>
<!-- Jquery -->
<script src="../js/jquery.min.js" charset="utf-8"></script>
<script src="../js/popper.min.js" charset="utf-8"></script>
<!-- Bootstrap -->
<script src="../js/bootstrap.min.js" charset="utf-8"></script>
<!-- TableSorter -->
<script src="../js/jquery.tablesorter.min.js" charset="utf-8"></script>
<script src="../js/jquery.tablesorter.widgets.js" charset="utf-8"></script>
<!-- CustomScrollbar -->
<script src="../js/jquery.mCustomScrollbar.concat.min.js" charset="utf-8"></script>
<!-- FontAwsome -->
<script src="../js/fontawesome.js" charset="utf-8"></script>
<script src="../js/solid.js" charset="utf-8"></script>
<!-- ChartJs -->
<script src="../js/Chart.min.js"></script>
<!-- Custom Script -->
<script src="../js/panel.js" charset="utf-8"></script>
<!-- Users -->

<script src="../js/table.js" charset="utf-8"></script>


</body>
</html>
