<?php include '../header.php';
$subtotal_amountpaid=array();
$subtotal_amountsold=array();
$subtotal_amountremaining=array();
$tatolamount_paid='';
$total_remaining='';
$totalamountsold='';
$percee='';
$pay_id='';
$total='';
$paid='';
$salz_id='';
if (isset($_GET['pay_owe_id'])) {
$pay_id=$_GET['pay_owe_id'];
}
$owed_customerpay = $db->fetch(" SELECT * FROM  owed_customer WHERE id=$pay_id");
if($owed_customerpay->num_rows > 0){
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
<?php  while($row =  $owed_customerpay ->fetch_assoc()) { ?>
<tr>
<td><?php echo $row['dates']; ?></td>
<td><?php echo $row['customer_name']; ?></td>
<td><?php echo $row['product'];?></td> 
<td><?php echo $row['quantity_taken'];?></td>
<td><?php echo $row['price_per_each']; $salz_id=$row['sales_id']?></td>
<td><?php echo $row['total']; array_push($subtotal_amountsold, $row['total']); $total=$row['total'];?></td>
<td><?php echo $row['paid']; array_push($subtotal_amountpaid, $row['paid']); $paid=$row['paid'];?></td>
<td><?php echo $row['percent']; ?>%</td>
<td><?php echo $row['remain']; array_push($subtotal_amountremaining, $row['remain']);?></td>
<td><a href="../comment?owed_comment=<?php echo $row['id']; ?>"><span class="memb"><i class="fa fa-eye" aria-hidden="true"></i></span> view</a></td>
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
<div class="owed">
<form action="../backend/client.php" method="post">
<div style="background:#171926;margin-top:5px;padding:10px;width:46%;float:left; height: 6%;">
<input type="hidden" name="pay_id" value="<?php echo $pay_id;?>">
<input type="hidden" name="total" value="<?php echo $total;?>">
<input type="hidden" name="paid" value="<?php echo $paid;?>">
<input type="hidden" name="salz_id" value="<?php echo $salz_id;?>">
<input type="number" name="addPayz" style=" width: 100%; height:100%;border: none;" placeholder="+amount">
</div> 
<div style="background:#171926;margin-top:5px;padding:10px;width:46%;float:left;height: 6%;">
<input type="submit" name="pay_owed" value="Add" style=" width: 30%; height:100%;border: none;">
</div>
</form>
</div>
</div>
<?php include '../forter.php';?>