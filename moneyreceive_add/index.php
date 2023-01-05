<?php include '../header.php';
if($view_money_received->num_rows > 0){

}
?>
<div class="contents" id="contents">
<h6 style="padding: 6px;">Money</h6>
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
<th >Action</th>
</tr>
<?php  while($row = $view_money_received->fetch_assoc()) { ?>
<tr>
<td><?php echo $row['dates']; ?></td>
<td><?php echo $row['open_with'];  ?></td>
<td><?php echo $row['receive_from']; ?></td>
<td><?php echo $row['amount_received'];  ?></td>
<td><?php echo $row['total'];?></td>
<td><?php echo $row['used']; ?></td>
<td><?php echo $row['remaining']; ?></td>
<td><a href="../moneyreceive_add?delete_money=<?php echo $row['id_budget']; ?>" class="btns_danger"><span class="memb"><i class="fa fa-trash" aria-hidden="true" ></i></span> Delete</a></td>
</tr>
<?php } ?>
</table>
<form action="../backend/client.php" method="post" class="batles_pro_blocks" id="batles_pro_blocks">
<table class="batles_pro">
<tr>
<td><input type="text" name="open_with"  placeholder="open with" required></td>
<td><input type="text" name="receive_from" placeholder="receive from who" required></td>
<td><input type="number" name="amount_received" placeholder="amount received" required></td>
<td><input type="number" name="used" placeholder="used" required></td>
<td><input type="submit" name="add_money" value="Add" class="btn_s" ></td>
</tr>
</table>
</form>
</div>
</div>
<div class="buton_add" id="buton_add" onclick="add_prodction()">
<div class="adds">+</div>
</div>
<div class="buton_close" id="buton_close" onclick="close_prodction()">
<div class="closes">x</div>
</div>
<?php include '../forter.php';?>