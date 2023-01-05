<?php include '../header.php';

if($view_product->num_rows > 0){

 }



?>

<div class="contents" id="contents">
  <h6 style="padding: 6px;">Sales</h6>
<div class="table_contain">
<table class="batles_pro">
  <tr>
    <th>Product</th>
    <th>available</th>
    <th>Action</th>
  </tr>
  <?php  while($row = $view_product->fetch_assoc()) { ?>
  <tr>
    <td><?php  echo $row['product_name']; ?></td>
    <td><?php  echo $row['total']; ?></td>
    <td><span><i class="fa fa-eye" aria-hidden="true"></i></span><a href="../sales?product=<?php  echo $row['product_name']; ?>">View and Add</a></td>  
  </tr>
  <?php } ?>
</table>

</div>
</div>



<?php include '../forter.php';?>