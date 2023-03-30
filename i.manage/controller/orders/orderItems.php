<?php
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
od.status,
p.product,
p.category,
p.brand,
od.qty,
od.price,
od.wprice,
od.id
FROM orders_dummy od INNER JOIN products p ON od.prodID = p.id
";

$query .= ' ORDER BY od.id ASC ';

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
<table class="table-sm table table-hover text-center" id="myTable">
  <thead>
    <tr>
      <th class="p-2">Product</th>
      <th class="p-2">Model</th>
      <th class="p-2">Brand</th>
      <th class="p-2">Qty</th>
      <th class="p-2">Price</th>
      <th class="p-2">Action</th>
    </tr>
  </thead>
';
// <th class="p-2">Status</th>
// <td class="align-middle">
//   <button id="updateOrderItemsStatus" type="button"  value='.$row['id'].' class="btn btn-sm btn-info mb-1 mt-1">'.$row['status'].'</button>
// </td>

if($total_data > 0)
{
  foreach($result as $row)
  {
    if ($row['status'] == 'WholeSale') {
      $getPrice =  $row['wprice'];
    }else {
      $getPrice =  $row['price'];
    }
    $output .= '
    <tbody>
      <tr>

        <td class="align-middle">'.$row['product'].'</td>
        <td class="align-middle">'.$row['category'].'</td>
        <td class="align-middle">'.$row['brand'].'</td>

        <td class="align-middle">
        <button id="getOrderItemsID"  type="button" class="btn-sm btn btn-outline-info"
        value='.$row['id'].'>'.$row['qty'].'</button>
        </td>
        <td class="align-middle">'.$getPrice.'₱</td>
        <td class="align-middle">
        <button id="orderItemsDelete" value='.$row['id'].' type="button" class="btn btn-sm btn-outline-danger mb-1 mt-1">X</button>
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
    <td colspan="6" align="center">No Orders Yet</td>
  </tr>
  ';
}

$output .= '
</table>
<br />
<div class="row">
  <div class="col-12">
  <ul class="pagination pagination-sm justify-content-center align-items-center">
';

$total_links = ceil($total_data/$limit);
$previous_link = '';
$next_link = '';
$page_link = '';

// echo $total_links;

if($total_links > 5)
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
if ($page_array){
  for($count = 0; $count < count($page_array); $count++)
  {
    if($page == $page_array[$count])
    {
      $page_link .= '
      <li class="page-item active">
        <a class="page-link orderPageLink  " href="#">'.$page_array[$count].' <span class="sr-only">(current)</span></a>
      </li>
      ';
  
      $previous_id = $page_array[$count] - 1;
      if($previous_id > 0)
      {
        $previous_link = '<li class="page-item"><a class="page-link orderPageLink  " href="javascript:void(0)" data-page_number="'.$previous_id.'"><</a></li>';
      }
      else
      {
        $previous_link = '
        <li class="page-item disabled">
          <a class="page-link orderPageLink " href="#"><</a>
        </li>
        ';
      }
      $next_id = $page_array[$count] + 1;
      if($next_id >= $total_links)
      {
        $next_link = '
        <li class="page-item disabled">
          <a class="page-link orderPageLink " href="#">></a>
        </li>
          ';
      }
      else
      {
        $next_link = '<li class="page-item"><a class="page-link orderPageLink" href="javascript:void(0)" data-page_number="'.$next_id.'">></a></li>';
      }
    }
    else
    {
      if($page_array[$count] == '...')
      {
        $page_link .= '
        <li class="page-item disabled">
            <a class="page-link orderPageLink" href="#">...</a>
        </li>
        ';
      }
      else
      {
        $page_link .= '
        <li class="page-item"><a class="page-link orderPageLink" href="javascript:void(0)" data-page_number="'.$page_array[$count].'">'.$page_array[$count].'</a></li>
        ';
      }
    }
  }
}else{
  $page_link = '';
}

$output .= $previous_link . $page_link . $next_link;
$output .= '
  </ul>
  </div>

</div>
';

echo $output;

?>
