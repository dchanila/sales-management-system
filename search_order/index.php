<?php include '../header.php';
$view_order_actz = $db->fetch(" SELECT * FROM $looking ORDER by dates DESC");
if($view_order_actz->num_rows > 0){

}
?>
<div class="contents" id="contents">
<h6 style="padding: 6px;">Order <?php echo $product." "; ?></h6>
<div class="looking">
<form action="../backend/client.php" method="post">
<input type="text" name="prodctz" placeholder="product"><input type="date" name="datez"> <label>To</label> <input type="date" name="datec"> <input type="hidden" name="searc" value="<?php echo $looking;?>"><input type="submit" name="checkz" value="Search">
</form>
</div>
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
</tr>
<?php  while($row = $view_order_actz->fetch_assoc()) { ?>
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
</tr>
<?php } ?>
</table>
</div>
<?php include '../forter.php';?>