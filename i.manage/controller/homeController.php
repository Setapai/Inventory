<?php
// UserPrev
include_once('../model/userControl/logout.php');
// User
include_once('../model/users/usersUpdate.php');
include_once('../model/users/usersAdd.php');
// Product
include_once('../model/products/productsAdd.php');
include_once('../model/products/productsUpdate.php');
include_once('../model/products/importExcel.php');
include_once('../model/products/exportExcel.php');
// Products Defective
include_once('../model/defectiveProducts/addDefects.php');
include_once('../model/defectiveProducts/updateDefects.php');
// Orders
include_once('../model/orders/ordersAdd.php');
include_once('../model/orders/truncateDummy.php');
include_once('../model/orders/editClear.php');
// Loans
include_once('../model/orders/loans/viewLoans.php');
// SalesReport
include_once('../model/salesReport/viewOrders.php');

// User
if(isset($_GET['logout'])){
  logout();
}


//  UpdateUserFetchSessions
if(isset($_POST['userUpdate'])){
  usersUpdateUnset();
  updateUser($_POST['userUpdate']);
}
// UpdateUserData
if(isset($_POST['saveUsersUpdate'])){
  updateUserData();
}
// Adduser
if(isset($_POST['addUser'])){
  insertUser();
}
// FetchProductsSessions
if(isset($_POST['productUpdate'])){
  productsUpdateUnset();
  updateProducts($_POST['productUpdate']);
}
// updateProductsData
if(isset($_POST['saveProductsUpdate'])){
  updateProductsData();
}
// addProducts
if(isset($_POST['addProducts'])){
  insertProduct();
}
// Excel Import
if(isset($_POST['importExcel'])){
  uploadExcel();
}
// Export Excell
if(isset($_POST['exportExcel'])){
  export();
}
// ProductDefectsADD
if(isset($_POST['defectiveBtn'])){
  addDefects();
}
// UpdateDefects
if(isset($_POST['updateDefects'])){
  updateDefects();
}

// Ordersadd
if(isset($_POST['saveOrder'])){
  addOrders();
}
if(isset($_POST['viewOrder'])){
  editBtn();
  unset($_SESSION['orderRecID']);
  viewOrders();
}
//loans
if(isset($_POST['viewLoans'])){
  unset($_SESSION['orderRecID']);
  viewLoans();
}
//SalesReport
if(isset($_POST['SRviewOrder'])){
  unset($_SESSION['orderRecID']);
  SRviewOrders();
}



 ?>
