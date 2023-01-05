 <?php include '../header.php';

if($view_product->num_rows > 0){

 }

?>

<div class="contents" id="contents">
  <h6 style="padding: 6px;">Production Cost</h6>
<div class="table_contain">
<table class="batles_pro">
  <tr>
    <th>Product</th>
    <th colspan="2">Action</th>
  </tr>
  <?php  while($row = $view_product->fetch_assoc()) { ?>
  <tr>
    <td><?php  echo $row['product_name']; ?></td>  
    <td><span><i class="fa fa-eye" aria-hidden="true"></i></span><a href="../view_cost_of_production?product=<?php  echo $row['product_name']; ?>">View</a></td> 
  </tr>
  <?php } ?>
</table>

</div>
</div>



<?php include '../forter.php';?>