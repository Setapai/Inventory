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
SELECT * FROM products
";

if ($_POST['category']  !=  '' OR $_POST['brand']  !=  '') {
  $search = $_POST['query'];
  $cat = $_POST['category'];
  $brand = $_POST['brand'];
  $query .= "
  WHERE product LIKE '%$search%' AND category LIKE '%$cat%' AND brand LIKE '%$brand%'
  ";
}elseif ($_POST['category'] !='') {
  $cat = $_POST['category'];
  $query .= "
  WHERE category LIKE '%$cat%' AND product LIKE '%$search%'
  ";
}elseif ($_POST['brand']  !='') {
  $brand = $_POST['brand'];
  $query .= "
  WHERE brand LIKE '%$brand%' AND product LIKE '%$search%'
  ";
}
else {
  if($_POST['query'] != '')
  {
    $text = $_POST['query'];
    $query .= "
    WHERE product LIKE '%$text%'
    ";
  }
}


$query .= ' ORDER BY qty ASC ';

$filter_query = $query . 'LIMIT '.$start.', '.$limit.'';

$statement = $con->prepare($query);
$statement->execute();
$total_data = $statement->rowCount();

$statement = $con->prepare($filter_query);
$statement->execute();
$result = $statement->fetchAll();
$total_filter_data = $statement->rowCount();

$output = '
<label>Total Products - '.$total_data.'</label>
<style>
.clickableImage:hover{
  cursor: pointer ;
  text-decoration: underline ;
};
</style>
<table class="table-sm table table-bordered table-hover text-center" id="myTable">
<thead>
<tr>
<th class="p-2">Product</th>
<th class="p-2">Model</th>
<th class="p-2">Brand</th>
<th class="p-2">Retail Price</th>
<th class="p-2">Quantity</th>
<th class="p-2">Action</th>
</tr>
</thead>
';
if($total_data > 0)
{
  // <th class="p-2">Image</th>
  // <td class="align-middle text-primary">
  //   <span id="imageIDLink" class="clickableImage" data-toggle="modal" data-target="#prodViewImageModal">'.$row['image'].'</span>
  //  </td>
  foreach($result as $row)
  {
    if ($row['qty'] <= 10) {
      $output .= '
      <tbody>
      <tr class="text-danger">
      <td class="align-middle"> '.$row['product'].' </td>
      <td class="align-middle"> '.$row['category'].' </td>
      <td class="align-middle"> '.$row['brand'].' </td>
      <td class="align-middle"> '.$row['price'].' </td>
      <td class="align-middle"> '.$row['qty'].' </td>

      <td >
      <form action="?updateProducts" method="post">
      <div class="row justify-content-center align-items-center">
      <div class="col-sm">
      <button id="productUpdate" type="submit" class="m-2 btn btn-outline-info btn-sm" value='.$row['id'].' name="productUpdate"> <i class="bi bi-pencil-square"></i> Edit</button>
      <input hidden  id="getImage" type="text" value='.$row['image'].'>

      ';

      if ($_SESSION['accStatus'] == 'Admin') {
        $output .='
        <button id="productDelete" type="button" class="m-2 btn btn-outline-danger btn-sm" value='.$row['id'].'> <i class="bi bi-x-circle"></i> Delete</button>
        ';
      }

      $output .='
      </div>
      </div>
      </form>
      </td>
      </tr>
      </tbody>
      ';







    }else {
      $output .= '
      <tbody>
      <tr>
      <td class="align-middle"> '.$row['product'].' </td>
      <td class="align-middle"> '.$row['category'].' </td>
      <td class="align-middle"> '.$row['brand'].' </td>
      <td class="align-middle"> '.$row['price'].' </td>
      <td class="align-middle"> '.$row['qty'].' </td>

      <td >
      <form action="?updateProducts" method="post">
      <div class="row justify-content-center align-items-center">
      <div class="col-sm">
      <button id="productUpdate" type="submit" class="m-2 btn btn-outline-info btn-sm" value='.$row['id'].' name="productUpdate"> <i class="bi bi-pencil-square"></i> Edit</button>
      <input hidden  id="getImage" type="text" value='.$row['image'].'>

      ';

      if ($_SESSION['accStatus'] == 'Admin') {
        $output .='
        <button id="productDelete" type="button" class="m-2 btn btn-outline-danger btn-sm" value='.$row['id'].'> <i class="bi bi-x-circle"></i> Delete</button>

        ';
      }

      $output .='
      </div>
      </div>
      </form>
      </td>

      </tr>
      </tbody>
      ';

    }

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
