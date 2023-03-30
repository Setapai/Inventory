  <!-- Sidebar  -->
    <nav id="sidebar">
        <div class="sidebar-header">
            <h3>Imanage</h3>
        </div>
        <ul class="list-unstyled components">
          <hr>
            <p class="text-center">Welcome <?php echo $_SESSION['fName']; ?></p>
            <hr>
            <p  id="panelTitle">&nbsp</p>

            <li id='homeBtn'>
                <a href="?dashboard"><i class="bi bi-speedometer2"></i> Home</a>
            </li>
            <?php if ($_SESSION['accStatus'] == 'Admin'): ?>
            <li id='usersBtn'>
              <a href="?users"><i class="bi bi-people"></i> Users</a>
            </li>
            <?php endif; ?>
            <li id='productsBtn'>
              <a href="?products"><i class="bi bi-box-seam"></i>  Products</a>
            </li>
              <li id='defProdBtn'>
                <a href="?defectiveProducts"><i class="bi bi-exclamation-square"></i> Defective Products</a>
              </li>
              <li id='ordersBtn'>
                <a href="?orders"><i class="bi bi-credit-card-2-front"></i> Orders</a>
              </li>
            <?php if ($_SESSION['accStatus'] == 'Admin'): ?>
            <li id='reportsBtn'>
                <a href="?reports"><i class="bi bi-bar-chart-line"></i> Reports</a>
            </li>
            <li id='salesReportsBtn'>
                <a href="?salesReports"><i class="bi bi-receipt"></i> Sales Reports</a>
            </li>
          <?php endif; ?>
        </ul>


        <ul class="list-unstyled CTAs">
            <li>
                <a href="?logout" class="logoutbtn">logout</a>
            </li>
        </ul>
    </nav>
