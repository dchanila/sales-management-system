<?php include '../header.php';
$subtotalestmtweekly=array();
$totalestmtweekly='';
if ($dateFrom==''){
$estimateview_weeklyz= $db->fetch("SELECT * FROM $looking WHERE detail LIKE '%$product%' or  detail LIKE '%$product' or detail LIKE '$product%' ORDER by dates DESC");
}elseif ($product=='') {
$estimateview_weeklyz= $db->fetch("SELECT * FROM $looking WHERE dates BETWEEN '$dateFrom' AND '$dateTo' ORDER by dates DESC");
}else{
$estimateview_weeklyz= $db->fetch("SELECT * FROM $looking WHERE dates BETWEEN '$dateFrom' AND '$dateTo' AND detail LIKE '%$product%' ORDER by dates DESC");
}
if($estimateview_weeklyz->num_rows > 0){

}
?>
<div class="contents" id="contents">
<h6 style="padding: 6px;">Estimation add weekly</h6>
<div class="looking">
<form action="../backend/client.php" method="post">
<input type="text" name="prodctz" placeholder="product"><input type="date" name="datez"> <label>To</label> <input type="date" name="datec"> <input type="hidden" name="searc" value="<?php echo $looking;?>"><input type="submit" name="checkz" value="Search">
</form>
</div>
<div class="table_contain">  
<table class="batles_pro">
<tr>                  <th >Date from</th>
<th >To Date</th>
<th >Description</th>
<th >Quantity</th>
<th >Price per each</th>
<th >Total amount</th>
</tr>
<?php  while($row =$estimateview_weeklyz->fetch_assoc()) { ?>
<tr>
<td><?php echo $row['dates']; ?></td>
<td><?php echo $row['to_date']; ?></td>
<td><?php echo $row['detail'];?></td>
<td><?php echo $row['quantity'];?></td>
<td><?php echo $row['price_per_each'];?></td>
<td><?php echo $row['total_amount'];  array_push($subtotalestmtweekly, $row['total_amount']);?></td>
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
</tr>
</table>
</div>
</div>
<?php include '../forter.php';?>