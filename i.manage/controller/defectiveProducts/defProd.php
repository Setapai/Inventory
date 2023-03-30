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
products.product,
products.brand,
products.category,
def_products.id,
def_products.qty,
DATE(def_products.dateTime) AS date
FROM def_products INNER JOIN products ON products.id = def_products.prodID ";

if ($_POST['category']  !=  '') {
  $search = $_POST['query'];
  $select = $_POST['category'];
  $query .= "
  WHERE DATE(def_products.dateTime) LIKE '%$select%' AND products.product LIKE '%$search%'
  OR DATE(def_products.dateTime) LIKE '%$select%' AND products.brand LIKE '%$search%'
  OR DATE(def_products.dateTime) LIKE '%$select%' AND products.category LIKE '%$search%'
  ";

}else {
  if($_POST['query'] != '')
  {
    $text = $_POST['query'];
    $query .= "
    WHERE  product LIKE '%$text%'
    ";
  }
}


$query .= 'ORDER BY def_products.id ASC ';

$filter_query = $query . 'LIMIT '.$start.', '.$limit.'';

$statement = $con->prepare($query);
$statement->execute();
$total_data = $statement->rowCount();

$statement = $con->prepare($filter_query);
$statement->execute();
$result = $statement->fetchAll();
$total_filter_data = $statement->rowCount();

$output = '
<label>Defective Records - '.$total_data.'</label>
<table class="table-sm table table-bordered table-hover text-center" id="myTable">
<thead>
<tr>
<th class="p-2">Products</th>
<th class="p-2">Model</th>
<th class="p-2">Brands</th>
<th class="p-2">Defective Items</th>
<th class="p-2">Date</th>

';
if ($_SESSION['accStatus'] == 'Admin') {
  $output .= '
  <th class="p-2">Action</th>
  ';
}

$output .= '
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
    <td class="align-middle"> '.$row['product'].' </td>
    <td class="align-middle"> '.$row['category'].' </td>
    <td class="align-middle"> '.$row['brand'].' </td>
    <td class="align-middle"> '.$row['qty'].' </td>
    <td class="align-middle"> '.$row['date'].' </td>
    <td >
    <div class="row justify-content-center align-items-center">
    <form action="?editDefects" method="post">
    <button name="viewDefects"  type="submit" class="m-2 btn btn-outline-info btn-sm" value='.$row['id'].'><i class="bi bi-pencil-square"></i> Edit</button>
    </form>
    ';

    if ($_SESSION['accStatus'] == 'Admin') {

      $output .= '
      <form action="?editDefects" method="post">
      <button id="deleteDefects" type="button" class="m-2 btn btn-outline-danger btn-sm" value='.$row['id'].'> <i class="bi bi-x-circle"></i> Delete</button>
      </form>
      </div>
      ';
    }

    $output .= '
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
  <td colspan="6" align="center">No Data Found</td>
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
 if($page_array){
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
 } else {
  $page_link = '';
 }

 


$output .= $previous_link . $page_link . $next_link;
$output .= '
</ul>

</div>
';

echo $output;

?>
