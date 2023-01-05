<?php include '../header.php';

if($view_order_status->num_rows > 0){

 }



?>

<div class="contents" id="contents">
  <h6 style="padding: 6px;">Order status</h6>
<div class="table_contain">
<table class="batles_pro">
  <tr>
    <th>Order status</th>
    <th>Action</th>
  </tr>
  <?php  while($row = $view_order_status->fetch_assoc()) { ?>
  <tr>
    <td><?php  echo $row['statuz']; ?></td>
    <td><span><i class="fa fa-eye" aria-hidden="true"></i></span><a href="../order_view?orderstatus=<?php  echo $row['statuz']; ?>&&product=<?php echo $product; ?>">View</a></td>  
  </tr>
  <?php } ?>
</table>

</div>
</div>



<?php include '../forter.php';?>


                  