<?php include '../header.php';
if($view_order_act->num_rows > 0){

}
?>
<div class="contents" id="contents">
<h6 style="padding: 6px;">Order <?php echo $product." "; ?></h6>
<div class="table_contain">
<table class="batles_pro">
<tr>                  <th >Dates</th>
<th >Name</th>
<th >Type</th>
<th >Date to deliver</th>
<th >Quantity</th>
<th >Price per each</th>
<th >Total amount</th>
<th >Status</th>
<th >Paid</th>
<th >Amount Paid</th>
<th >Remaining</th>
<th >Action</th>
</tr>
<?php  while($row = $view_order_act->fetch_assoc()) { ?>
<tr>
<td><?php echo $row['dates']; ?></td>
<td><?php echo $row['order_name']; ?></td>
<td><?php echo $row['order_type']; ?></td>
<td><?php echo $row['date_to_deliver'];?></td>
<td><?php echo $row['quantity'];?></td>
<td><?php echo $row['price_per_each'];?></td>
<td><?php echo $row['total_amount'];?></td>
<td><?php echo $row['statuz'];?></td>
<td><?php echo $row['paid']."%";?></td>
<td><?php echo $row['amount_paid'];?>
</td>
<td><?php echo $row['remaining'];?></td>
<?php if ($row['statuz']=='not confirmed'): ?>
<td><span><i class="fa fa-plus-circle" aria-hidden="true"></i></span><a href="../add_order_amount?order_id=<?php  echo $row['order_id']; ?>&&product=<?php echo $product?>" >add amount</a></td>
<?php endif ?>
<?php if ($row['statuz']=='confirmed'): ?>
<td>
<form action="../backend/client.php" method="post" >
<input type="hidden" name="order_id" value="<?php echo $row['order_id']; ?>">
<input type="hidden" name="product" value="<?php echo $product; ?>">
<input type="hidden" name="open_with" value="<?php echo $totalproduct; ?>">
<input type="hidden" name="sold" value="<?php echo $row['quantity']; ?>">
<input type="hidden" name="price_per_each" value="<?php echo $row['price_per_each']; ?>">
<input type="hidden" name="amount_paid" value="<?php echo $row['amount_paid']; ?>">
<input style="padding: 2%;color: green" type="submit" name="add_sales" value="<?php echo $states;?>">
</form>
</td>
<?php endif ?>
<?php if ($row['statuz']=='delivered'): ?>
<td>
<span><i class="fa fa-check-circle" aria-hidden="true" style="padding: 2%;color: green"></i></span>
</td>
<?php endif ?>
</tr>
<?php } ?>
</table>
</div>
<?php include '../forter.php';?>