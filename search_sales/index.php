<?php include '../header.php';
$subtotal_amountsold=array();
$sold=array();
$cash=array();
$owe=array();
$totalamountsold='';
$totalamountsold='';
$totalamountcash='';
$totalamountowe='';
$percee='';
 $product_salesz = $db->fetch(" SELECT * FROM  $looking ORDER by dates DESC");
if($product_salesz->num_rows > 0){

}
?>
<div class="contents" id="contents">
<h6 style="padding: 6px;"><?php echo $product; ?> searching</h6>
<div class="looking">
<form action="../backend/client.php" method="post">
<input type="text" name="prodctz" placeholder="product"><input type="date" name="datez"> <label>To</label> <input type="date" name="datec"> <input type="hidden" name="searc" value="<?php echo $looking;?>"><input type="submit" name="checkz" value="Search">
</form>
</div>
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
</tr>
<?php  while($row = $product_salesz->fetch_assoc()) { ?>
<tr>
<td><?php echo $row['dates']; $datess=$row['dates']; ?></td>
<td><?php echo $row['product']; $products= $row['product']; ?></td>
<td><?php echo $row['open_with'];?></td> 
<td><?php echo $row['produce'];?></td>
<td><?php echo $row['sold'];array_push($sold, $row['sold']); ?></td>
<td><?php echo $row['price_per_each'];?></td>
<td><?php echo $row['subtotal_amount'];array_push($subtotal_amountsold, $row['subtotal_amount']); ?></td>
<td><?php echo $row['amount_paid'];array_push($cash, $row['amount_paid']); ?></td>
<td><?php echo $row['percentz'];?></td>
<td><?php echo $row['remaining'];array_push($owe, $row['remaining']); ?></td>
<td><?php echo $row['closed_with']; ?></td>
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
$totalamountcash=array_sum($cash); ?>
<td><strong><?php echo ($totalamountcash); ?>Tsh</strong></td>
<?php 
if($totalamountcash==0 or $totalamountsold==0) {
$percee=0;
}else{
$percee=round(($totalamountcash/$totalamountsold)*100);
}
?>
<td><strong><?php echo ($percee)."%"; ?></strong></td>
<?php 
$totalamountowe=array_sum($owe)."Tsh"; ?>
<td><strong><?php echo ($totalamountowe); ?></strong></td>
<td colspan="2"><strong><?php echo $closed." ".$product ?></strong></td>
</tr>
</table>
</div>
</div>
<?php include '../forter.php';?>