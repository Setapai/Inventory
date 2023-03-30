<?php
session_start();
include_once('../../services/db.php');
database();
global $con;

$limit = '5';
$page = 1;
if($_POST['page'] > 1)
{
  $start = (($_POST['page'] - 1) * $limit);
  $page = $_POST['page'];
}
else
{
  $start = 0;
}

$query = "
SELECT
order_records.id,
order_records.receipt,
order_records.name,
order_records.pnum,
order_records.loan_status,
DATE_FORMAT(order_records.date, '%b/%d/%Y') AS date,
(SUM(orders.price * orders.qty) - order_records.discount) AS totalprice,
COUNT(orders.qty) AS totalitems
FROM order_records  INNER JOIN orders
ON order_records.id	=	orders.order_recID
WHERE order_records.loan_status != 'Loan' ";

if ($_POST['year']  !=  '' OR $_POST['month']  !=  '' OR $_POST['day']  !=  '') {
  $search = $_POST['query'];
  $year = $_POST['year'];
  $month = $_POST['month'];
  $day = $_POST['day'];

  $query .= "
  AND DATE_FORMAT(date, '%Y') LIKE '%$year%'
  AND DATE_FORMAT(date, '%M') LIKE '%$month%'
  AND DATE_FORMAT(date, '%d') LIKE '%$day%'
  AND order_records.receipt LIKE '%$search%'
  OR order_records.loan_status != 'Loan'
  AND DATE_FORMAT(date, '%Y') LIKE '%$year%'
  AND DATE_FORMAT(date, '%M') LIKE '%$month%'
  AND DATE_FORMAT(date, '%d') LIKE '%$day%'
  AND order_records.name LIKE '%$search%'
  ";

}elseif ($_POST['year']  !=  '') {
  $search = $_POST['query'];
  $year = $_POST['year'];
  $query .= "
  AND DATE_FORMAT(date, '%Y') LIKE '%$year%'
  AND order_records.receipt LIKE '%$search%'
  OR order_records.loan_status != 'Loan'
  AND DATE_FORMAT(date, '%Y') LIKE '%$year%'
  AND order_records.name LIKE '%$search%'
  ";
}elseif ($_POST['month'] != '') {
  $search = $_POST['query'];
  $month = $_POST['month'];
  $query .= "
  AND DATE_FORMAT(date, '%M') LIKE '%$month%'
  AND order_records.receipt LIKE '%$search%'
  OR order_records.loan_status != 'Loan'
  AND DATE_FORMAT(date, '%M') LIKE '%$month%'
  AND order_records.name LIKE '%$search%'
  ";
  // code...
}elseif ($_POST['day'] != '') {
  $search = $_POST['query'];
  $day = $_POST['day'];
  $query .= "
  AND DATE_FORMAT(date, '%d') LIKE '%$day%'
  AND order_records.receipt LIKE '%$search%'
  OR order_records.loan_status != 'Loan'
  AND DATE_FORMAT(date, '%d') LIKE '%$day%'
  AND order_records.name LIKE '%$search%'
  ";
}else {
  if($_POST['query'] != '')
  {
    $text = $_POST['query'];
    $query .= "
    AND order_records.receipt LIKE '%$text%'
    OR	order_records.loan_status !='Loan'
    AND order_records.name LIKE '%$text%'
    OR 	order_records.loan_status !='Loan'
    AND order_records.pnum LIKE '%$text%'
    ";
  }
}


$query .= 'GROUP BY order_records.id,order_records.name ';
$query .= 'ORDER BY id DESC ';

$filter_query = $query . 'LIMIT '.$start.', '.$limit.'';

$statement = $con->prepare($query);
$statement->execute();
$total_data = $statement->rowCount();

$statement = $con->prepare($filter_query);
$statement->execute();
$result = $statement->fetchAll();
$total_filter_data = $statement->rowCount();


$output = '
<label>Order Records - '.$total_data.'</label>
<table class="table-sm table table-bordered table-hover text-center" id="myTable">
<thead>
<tr>
<th class="p-2">Receipt</th>
<th class="p-2">Name</th>
<th class="p-2">Phone Number</th>
<th class="p-2">Date</th>
<th class="p-2">Total Products</th>
<th class="p-2">Total Amount</th>
<th class="p-2">Status</th>
<th class="p-2">Action</th>
</tr>
</thead>
';
if($total_data > 0)
{
  foreach($result as $row)
  {
    $output .= '
    <tbody>
    <tr>
    <td class="align-middle p-3"> '.$row['receipt'].' </td>
    <td class="align-middle"> '.$row['name'].' </td>
    <td class="align-middle"> '.$row['pnum'].' </td>
    <td class="align-middle p-3"> '.$row['date'].' </td>
    <td class="align-middle"> '.$row['totalitems'].' </td>
    <td class="align-middle"> '.round($row['totalprice']).' '.'₱'.' </td>
    <td class="align-middle"> '.$row['loan_status'].' </td>
    <td >
    <div class="row m-2 justify-content-center align-items-center">
    <div class="col">
    <form action="?viewOrders" method="post">
    <button name="viewOrder"type="submit" class=" btn btn-outline-info btn-sm" value='.$row['id'].'>
    <i class="bi bi-border-style"></i> View</button>
    </form>
    </div>
    ';

    if ($_SESSION['accStatus'] == 'Admin') {
      $output .='
      <div class="col m-2">
      <form>
      <button id="orderDelete" type="button" class="btn btn-outline-danger btn-sm" value='.$row['id'].'>
      <i class="bi bi-x-circle"></i> delete</button>
      </form>
      </div>
      ';
    }

    $output .='
    </div>
    </td>
    </tr>
    </tbody>
    ';
  }
}
else
{
  $output .= '
  <tr>
  <td colspan="8" align="center">No Data Found</td>
  </tr>
  ';
}

$output .= '
</table>
<br />
<div align="center">
<ul class="pagination float-right m-0">
';

$total_links = ceil($total_data/$limit);
$previous_link = '';
$next_link = '';
$page_link = '';

// echo $total_links;

if($total_links > 4)
{
  if($page < 5)
  {
    for($count = 1; $count <= 5; $count++)
    {
      $page_array[] = $count;
    }
    $page_array[] = '...';
    $page_array[] = $total_links;
  }
  else
  {
    $end_limit = $total_links - 5;
    if($page > $end_limit)
    {
      $page_array[] = 1;
      $page_array[] = '...';
      for($count = $end_limit; $count <= $total_links; $count++)
      {
        $page_array[] = $count;
      }
    }
    else
    {
      $page_array[] = 1;
      $page_array[] = '...';
      for($count = $page - 1; $count <= $page + 1; $count++)
      {
        $page_array[] = $count;
      }
      $page_array[] = '...';
      $page_array[] = $total_links;
    }
  }
}
else
{
  for($count = 1; $count <= $total_links; $count++)
  {
    $page_array[] = $count;
  }
}

error_reporting(E_ERROR | E_PARSE);
for($count = 0; $count < count($page_array); $count++)
{
  if($page == $page_array[$count])
  {
    $page_link .= '
    <li class="page-item active">
    <a class="page-link" href="#">'.$page_array[$count].' <span class="sr-only">(current)</span></a>
    </li>
    ';

    $previous_id = $page_array[$count] - 1;
    if($previous_id > 0)
    {
      $previous_link = '<li class="page-item"><a class="page-link" href="javascript:void(0)" data-page_number="'.$previous_id.'">Previous</a></li>';
    }
    else
    {
      $previous_link = '
      <li class="page-item disabled">
      <a class="page-link" href="#">Previous</a>
      </li>
      ';
    }
    $next_id = $page_array[$count] + 1;
    if($next_id >= $total_links)
    {
      $next_link = '
      <li class="page-item disabled">
      <a class="page-link" href="#">Next</a>
      </li>
      ';
    }
    else
    {
      $next_link = '<li class="page-item"><a class="page-link" href="javascript:void(0)" data-page_number="'.$next_id.'">Next</a></li>';
    }
  }
  else
  {
    if($page_array[$count] == '...')
    {
      $page_link .= '
      <li class="page-item disabled">
      <a class="page-link" href="#">...</a>
      </li>
      ';
    }
    else
    {
      $page_link .= '
      <li class="page-item"><a class="page-link" href="javascript:void(0)" data-page_number="'.$page_array[$count].'">'.$page_array[$count].'</a></li>
      ';
    }
  }
}

$output .= $previous_link . $page_link . $next_link;
$output .= '
</ul>

</div>
';

echo $output;

?>
