<?php include '../header.php';
$view_money_receivedz= $db->fetch(" SELECT * FROM $looking ORDER by dates DESC");
if($view_money_receivedz->num_rows > 0){

}
?>
<div class="contents" id="contents">
<h6 style="padding: 6px;">Money</h6>
<div class="looking">
<form action="../backend/client.php" method="post">
<input type="text" name="prodctz" placeholder="product"><input type="date" name="datez"> <label>To</label> <input type="date" name="datec"> <input type="hidden" name="searc" value="<?php echo $looking;?>"><input type="submit" name="checkz" value="Search">
</form>
</div>
<div class="table_contain">
<table class="batles_pro">
<tr>        
<th >Date</th>
<th >Open with</th>
<th >Receive from</th>
<th >Amount received</th>
<th >Total</th>
<th >Used</th>
<th >Closed</th>
</tr>
<?php  while($row = $view_money_receivedz->fetch_assoc()) { ?>
<tr>
<td><?php echo $row['dates']; ?></td>
<td><?php echo $row['open_with'];  ?></td>
<td><?php echo $row['receive_from']; ?></td>
<td><?php echo $row['amount_received'];  ?></td>
<td><?php echo $row['total'];?></td>
<td><?php echo $row['used']; ?></td>
<td><?php echo $row['remaining']; ?></td>
<?php } ?>
</table>
</div>
</div>
<?php include '../forter.php';?>