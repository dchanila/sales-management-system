<?php include '../header.php';
$subtotal_amountpaid=array();
$subtotal_amountsold=array();
$subtotal_amountremaining=array();
$tatolamount_paid='';
$total_remaining='';
$totalamountsold='';
$percee='';
if($product_sales->num_rows > 0){

}
?>
<div class="contents" id="contents">
<h6 style="padding: 6px;"><?php echo $product; ?> Sales</h6>
<h6 style="padding: 6px; font-size: 10px;color: red"><?php echo $saleserr ?></h6>
<div class="table_contain">
<table class="batles_pro">
<tr>
<th >Date</th>
<th >Product</th>
<th >Open Balance</th>
<th >Produced</th>
<th >Sold</th>
<th >Price per each</th>
<th >Subtotal</th>
<th >Amount paid</th>
<th >percent</th>
<th >Amount remain</th>
<th >Closed</th> 
<th >Action</th> 
</tr>
<?php  while($row = $product_sales->fetch_assoc()) { ?>
<tr>
<td><?php echo $row['dates']; $datess=$row['dates']; ?></td>
<td><?php echo $row['product']; $products= $row['product']; ?></td>
<td><?php echo $row['open_with'];?></td> 
<td><?php echo $row['produce'];?></td>
<td><?php echo $row['sold'];array_push($sold, $row['sold']); ?></td>
<td><?php echo $row['price_per_each'];?></td>
<td><?php echo $row['subtotal_amount'];array_push($subtotal_amountsold, $row['subtotal_amount']); ?></td>
<td><?php echo $row['amount_paid'];array_push($subtotal_amountpaid, $row['amount_paid']); ?></td>
<td><?php echo $row['percentz'];?>%</td>
<td><?php echo $row['remaining'];array_push($subtotal_amountremaining, $row['remaining']); ?></td>
<td><?php echo $row['closed_with']; ?></td>
<td><a href="../sales?delete_sales=<?php echo $row['sales_id']; ?>" class="btns_danger"><span class="memb"><i class="fa fa-trash" aria-hidden="true" ></i></span> Delete</a></td>
</tr>
<?php } ?>
<tr>
<td><strong><?php echo $datess;?></strong></td>
<td><strong><?php echo $product;?></strong></td>
<td><strong><?php echo $open_wth;?></strong></td>
<td><strong><?php echo $prodce;?></strong></td>
<?php 
$totalsold=array_sum($sold); ?>
<td><strong><?php echo ($totalsold)." ".$product; ?></strong></td>
<td><strong>Tsh:-</strong></td>
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
<td colspan="2"><strong><?php echo $closed." ".$product ?></strong></td>
</tr>
</table>
<form action="../backend/client.php" method="post" class="batles_pro_blocks" id="batles_pro_blocks">
<table class="batles_pro">
<tr>
<input type="hidden" name="product"  value="<?php echo $product; ?>">
<input type="hidden" name="open_with" value="<?php echo $totalproduct;  ?>">
<td><input type="number" name="sold" placeholder="sold" required></td>
<td><input type="number" name="price_per_each" placeholder="price_per_each" required></td>
<td><input type="number" name="amount_paid" placeholder="amount paid" required></td>
<td><input type="submit" name="add_sales" value="Add" class="btn_s" ></td>
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