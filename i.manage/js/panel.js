$(document).ready(function(){

  $('#panelTitle').hide();

// Dashboard
  if (window.location.href.indexOf("dashboard") > -1) {
    $('#panelTitle').text('Dashboard').hide().fadeIn(1000);
    $('#homeBtn').addClass('active');
    $.getScript("../js/reports/weekly.js");
    //
    // User
    $.getScript("../js/orders/orders.js");
    $.getScript("../js/orders/addOrders.js");
    $.getScript("../js/orders/orderProducts.js");
    $.getScript("../js/orders/orderProductsAdd.js");
    //
    $.getScript("../js/orders/orderItems.js");
    $.getScript("../js/orders/orderItemsUpdateQty.js");
    $.getScript("../js/orders/updateOrderItemStatus.js");
    $.getScript("../js/orders/orderItemsDelete.js");
    $.getScript("../js/orders/discount.js");
    $.getScript("../js/orders/orderDelete.js");
    $.getScript("../js/orders/loanBtn.js");

  }
// Users
  else if(window.location.href.indexOf("users") > -1){
    $('#panelTitle').text('User').hide().fadeIn(1000);
    $('#usersBtn').addClass('active');
    $.getScript("../js/users/users.js");
    $.getScript("../js/users/usersDelete.js");
  }else if(window.location.href.indexOf("addUsers") > -1){
    $('#panelTitle').text('Add User').hide().fadeIn(1000);
    $('#usersBtn').addClass('active');
  }else if(window.location.href.indexOf("updateUsers") > -1){
    $('#panelTitle').text('Update User').hide().fadeIn(1000);
    $('#usersBtn').addClass('active');
  }
// Products
  else if(window.location.href.indexOf("products") > -1){
    $('#panelTitle').text('Products').hide().fadeIn(1000);
    $('#productsBtn').addClass('active');
    $.getScript("../js/products/products.js");
    $.getScript("../js/products/productsDelete.js");
    $.getScript("../js/products/productsLSInputs.js");
    $.getScript("../js/products/updateLowSupply.js");
    $.getScript("../js/products/productViewImage.js");

  }else if(window.location.href.indexOf("addProducts") > -1){
    $('#panelTitle').text('Add Products').hide().fadeIn(1000);
    $('#productsBtn').addClass('active');
    $.getScript("../js/products/addProducts.js");
  }
  else if(window.location.href.indexOf("updateProducts") > -1){
    $('#panelTitle').text('Update Products').hide().fadeIn(1000);
    $('#productsBtn').addClass('active');
  }
  //DFECT
  else if(window.location.href.indexOf("defectiveProducts") > -1){
    $('#panelTitle').text('Defective Products').hide().fadeIn(1000);
    $('#defProdBtn').addClass('active');
    $.getScript("../js/defectiveProducts/defProd.js");
    $.getScript("../js/defectiveProducts/deleteDefects.js");


  }
  else if(window.location.href.indexOf("addDefectiveProduct") > -1){
    $('#panelTitle').text('Add Defective Products').hide().fadeIn(1000);
    $('#defProdBtn').addClass('active');
    $.getScript("../js/defectiveProducts/products.js");
    $.getScript("../js/defectiveProducts/defProdQty.js");
    $.getScript("../js/defectiveProducts/getProduct.js");
  }
  else if(window.location.href.indexOf("editDefects") > -1){
    $('#panelTitle').text('Edit Defective Products').hide().fadeIn(1000);
    $('#defProdBtn').addClass('active');
  }


// Category
  else if(window.location.href.indexOf("category") > -1){
    $('#panelTitle').text('Category').hide().fadeIn(1000);
    $('#productsBtn').addClass('active');
    $.getScript("../js/products/category/category.js");
    $.getScript("../js/products/category/addCategory.js");
    $.getScript("../js/products/category/deleteCategory.js");

  }
// Brands
  else if(window.location.href.indexOf("brands") > -1){
    $('#panelTitle').text('Brands').hide().fadeIn(1000);
    $('#productsBtn').addClass('active');
    $.getScript("../js/products/brands/brands.js");
    $.getScript("../js/products/brands/addBrands.js");
    $.getScript("../js/products/brands/deleteBrands.js");

  }
// Orders
  else if(window.location.href.indexOf("orders") > -1){
    $('#panelTitle').text('Orders').hide().fadeIn(1000);
    $('#ordersBtn').addClass('active');
    $.getScript("../js/orders/orders.js");
    $.getScript("../js/orders/orderDelete.js");
    $.getScript("../js/orders/getMonth.js");
    $.getScript("../js/orders/getDay.js");

  }else if(window.location.href.indexOf("addOrders") > -1){
    $('#panelTitle').text('Add Orders').hide().fadeIn(1000);
    $('#ordersBtn').addClass('active');
    $.getScript("../js/orders/orders.js");
    $.getScript("../js/orders/addOrders.js");
    $.getScript("../js/orders/orderProducts.js");
    $.getScript("../js/orders/orderProductsAdd.js");
    //
    $.getScript("../js/orders/orderItems.js");
    $.getScript("../js/orders/orderItemsUpdateQty.js");
    $.getScript("../js/orders/updateOrderItemStatus.js");
    $.getScript("../js/orders/orderItemsDelete.js");
    $.getScript("../js/orders/discount.js");
    $.getScript("../js/orders/loanBtn.js");

  }else if(window.location.href.indexOf("viewOrders") > -1){
    $('#panelTitle').text('View Orders').hide().fadeIn(1000);
    $('#ordersBtn').addClass('active');
    $.getScript("../js/orders/viewOrders.js");
    $.getScript("../js/orders/viewOrdersGetTotal.js");

    $.getScript("../js/orders/loans/viewLoanRecords.js");
    $.getScript("../js/orders/refunds/refundBtn.js");
    //
    $.getScript("../js/orders/refunds/refundsModal.js");
    $.getScript("../js/orders/refunds/viewOrderRefunds.js");
    $.getScript("../js/orders/refunds/deleteRefund.js");
    $.getScript("../js/orders/refunds/refundDefective.js");
    // Change
    // $.getScript("../js/orders/refunds/change.js");

  }
  //
  else if(window.location.href.indexOf("loans") > -1){
    $('#panelTitle').text('Loans').hide().fadeIn(1000);
    $('#ordersBtn').addClass('active');
    $.getScript("../js/orders/loans/loans.js");
    $.getScript("../js/orders/loans/depositModal.js");
    $.getScript("../js/orders/loans/depositLoan.js");
  }
  // Reports
  if (window.location.href.indexOf("reports") > -1) {
    $('#panelTitle').text('Reports').hide().fadeIn(1000);
    $('#reportsBtn').addClass('active');
    $.getScript("../js/reports/weekly.js");
    $.getScript("../js/reports/weeklyTotal.js");
    $.getScript("../js/reports/weeklyLoans.js");
    //
    $.getScript("../js/reports/monthly.js");
    $.getScript("../js/reports/monthlyTotal.js");
    $.getScript("../js/reports/monthlyLoans.js");
    //
    $.getScript("../js/reports/yearly.js");
    $.getScript("../js/reports/yearlyTotal.js");
    $.getScript("../js/reports/yearlyLoans.js");


  }
  // Reports
  if (window.location.href.indexOf("salesReports") > -1) {
    $('#panelTitle').text('Sales Reports').hide().fadeIn(1000);
    $('#salesReportsBtn').addClass('active');

    $.getScript("../js/salesReport/weekly.js");
    $.getScript("../js/salesReport/weeklyTotal.js");
    //
    $.getScript("../js/salesReport/monthly.js");
    $.getScript("../js/salesReport/monthlyTotal.js");
    //
    $.getScript("../js/salesReport/yearly.js");
    $.getScript("../js/salesReport/yearlyTotal.js");

  }
//

      $("#sidebar").mCustomScrollbar({
          theme: "minimal"
      });

      $('#sidebarCollapse').on('click', function () {
          $('#sidebar, #content').toggleClass('active');
          $('.collapse.in').toggleClass('in');
          $('a[aria-expanded=true]').attr('aria-expanded', 'false');
      });
});
