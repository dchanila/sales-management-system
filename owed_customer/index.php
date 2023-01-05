<?php include '../header.php';
$subtotal_amountpaid=array();
$subtotal_amountsold=array();
$subtotal_amountremaining=array();
$tatolamount_paid='';
$total_remaining='';
$totalamountsold='';
$percee='';
if($owed_customerz->num_rows > 0){
}
?>
<div class="contents" id="contents">
<h6 style="padding: 6px;"> Owed customer</h6>
<table class="batles_pro">
<tr>
<th >Date</th>
<th >Customer name</th>
<th >Product</th>
<th >Quantity taken</th>
<th >Price per each</th>
<th >Total</th>
<th >Amount paid</th>
<th >percent</th>
<th >Amount remain</th>
<th >Comment</th> 
<th >Action</th> 
</tr>
<?php  while($row =  $owed_customerz ->fetch_assoc()) { ?>
<tr>
<td><?php echo $row['dates']; ?></td>
<td><?php echo $row['customer_name']; ?></td>
<td><?php echo $row['product'];?></td> 
<td><?php echo $row['quantity_taken'];?></td>
<td><?php echo $row['price_per_each']; ?></td>
<td><?php echo $row['total']; array_push($subtotal_amountsold, $row['total']);?></td>
<td><?php echo $row['paid']; array_push($subtotal_amountpaid, $row['paid']);?></td>
<td><?php echo $row['percent']; ?>%</td>
<?php if ($row['remain']< 0): ?>
<td style="color:green;"><?php echo $row['remain']; array_push($subtotal_amountremaining, $row['remain']);?></td>
<?php endif ?>
<?php if ($row['remain']> 0): ?>
<td style="color:red;"><?php echo $row['remain']; array_push($subtotal_amountremaining, $row['remain']);?></td>
<?php endif ?>
<?php 
$id=$row['id'];
$view_comment = $db->fetch("SELECT * FROM comment WHERE reasons_id=$id and from_table='owed_customer' and timescom like '%$dates%'");
if($view_comment->num_rows > 0): ?>
<td><a href="../comment?owed_comment=<?php echo $row['id']; ?>" style="color:green"><span class="memb" style="color:green"><i class="fa fa-eye" aria-hidden="true"></i></span> view +1</a></td>
<?php endif ?>
<?php 
$id=$row['id'];
$view_comment = $db->fetch("SELECT * FROM comment WHERE reasons_id=$id and from_table='owed_customer' and timescom like '%$dates%'");
if($view_comment->num_rows <= 0): ?>
<td><a href="../comment?owed_comment=<?php echo $row['id']; ?>"><span class="memb"><i class="fa fa-eye" aria-hidden="true"></i></span> view</a></td>
<?php endif ?>
<td><a href="../pay_debt?pay_owe_id=<?php echo $row['id']; ?>"><span class="memb"><i class="fa fa-plus" aria-hidden="true"></i></span>Add amount</a></td>
</tr>
<?php } ?>
<tr>
<td></td>
<td></td>
<td></td>
<td></td>
<td><strong></strong></td>
<?php 
$totalamountsold=array_sum($subtotal_amountsold); ?>
<td><strong><?php echo ($totalamountsold); ?>Tsh</strong></td>
<?php 
$tatolamount_paid=array_sum($subtotal_amountpaid); ?>
<td><strong><?php echo ($tatolamount_paid); ?>Tsh</strong></td>
<?php 
if ($tatolamount_paid==0 or $totalamountsold==0) {
$percee=0;
}else{
$percee=round(($tatolamount_paid/$totalamountsold)*100);
}
?>
<td><strong><?php echo ($percee)."%"; ?></strong></td>
<?php 
$total_remaining=array_sum($subtotal_amountremaining)."Tsh"; ?>
<td><strong><?php echo ($total_remaining); ?></strong></td>
<td ></td>
<td ></td>
</tr>
</table>
</div>
<?php include '../forter.php';?>