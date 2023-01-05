<?php include '../header.php';
$subtotalestmtweekly=array();
$totalestmtweekly='';
if($estimateview_weekly->num_rows > 0){
}
?>
<div class="contents" id="contents">
<h6 style="padding: 6px;">Estimation add weekly</h6>
<div class="table_contain">  
<table class="batles_pro">
<tr><th >Date from</th>
<th >To Date</th>
<th >Description</th>
<th >Quantity</th>
<th >Price per each</th>
<th >Total amount</th>
<th >Action</th>
</tr>
<?php  while($row =$estimateview_weekly->fetch_assoc()) { ?>
<tr>
<td><?php echo $row['dates']; ?></td>
<td><?php echo $row['to_date']; ?></td>
<td><?php echo $row['detail'];?></td>
<td><?php echo $row['quantity'];?></td>
<td><?php echo $row['price_per_each'];?></td>
<td><?php echo $row['total_amount']; array_push($subtotalestmtweekly, $row['total_amount']); ?></td>
<td><a href="../site_estimation_weekly?delete_estimation_weekly=<?php echo $row['id']; ?>" class="btns_danger"><span class="memb"><i class="fa fa-trash" aria-hidden="true" ></i></span> Delete</a></td>
</tr>
<?php } ?>
<tr>
<td></td>
<td></td>
<td></td>
<td></td>
<td><strong>Total:</strong></td>
<?php 
$totalestmtweekly=array_sum($subtotalestmtweekly); ?>
<td><strong><?php echo ($totalestmtweekly)." "; ?>Tsh</strong></td>
<td></td>
</tr>
</table>
<form action="../backend/client.php" method="post" class="batles_pro_blocks" id="batles_pro_blocks">
<table class="batles_pro">
<tr> 
<td><input type="text" name="detail" placeholder=" cost for " required></td>
<td><input type="text" name="quantity" placeholder=" quantity " required></td>
<td><input type="text" name="price_per_each" placeholder="price per each" required></td>
<td><input type="submit" name="add_estmtweely" value="Add" class="btn_s" ></td>
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