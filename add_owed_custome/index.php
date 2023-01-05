<?php 
include '../header.php';
$id_salx='';
$datesx='';
$productx='';
$soldx='';
$price_per_eachx='';
$subtotal_amountx='';
$amount_paidx='';
$percentzx='';
$remainingx='';
$username='';
if (isset($_GET['idz'])) {
$idz=$_GET['idz'];
$product_salezs = $db->fetch(" SELECT * FROM sales WHERE sales_id=$idz");
if($product_salezs->num_rows > 0){
while($row = $product_salezs->fetch_assoc()) {
$id_salx=$row['sales_id'];    
$datesx=$row['dates'];    
$productx=$row['product'];    
$soldx=$row['sold'];    
$price_per_eachx=$row['price_per_each'];    
$subtotal_amountx=$row['subtotal_amount'];    
$amount_paidx=$row['amount_paid'];    
$percentzx=$row['percentz'];    
$remainingx=$row['remaining'];    
}
}}
if (isset($_GET['username'])) {
$username=$_GET['username'];
}
?>
<div class="contents" id="contents">
<h6 style="padding: 6px;"><?php echo $product; ?> Owed</h6>
<div class="owed">
<div class="first_carryin_owen"> 
<p style="background: #171926;margin:1px;padding:10px;width:46%;float:left;">Date</p>
<p style="background:#171926;margin:1px;padding:10px;width:46%;float:left;"><?php echo $datesx;?></p>
</div>
<div class="first_carryin_owen"> 
<p >Product</p>
<p ><?php echo $productx;?></p>
</div>
<div class="second_carryin_owen"> 
<p >Quantity taken</p>
<p ><?php echo $soldx;?></p>
</div>
<div class="second_carryin_owen"> 
<p >Price per each</p>
<p ><?php echo $price_per_eachx;?></p>
</div>
<div class="second_carryin_owen"> 
<p >Subtotal</p>
<p ><?php echo $subtotal_amountx;?></p>
</div>
<div class="second_carryin_owen"> 
<p>Amount paid</p>
<p><?php echo $amount_paidx;?></p>
</div>
<div class="second_carryin_owen"> 
<p>percent</p>
<p><?php echo $percentzx;?></p>
</div>
<div class="second_carryin_owen"> 
<p>Amount remain</p>
<p><?php echo $remainingx;?></p>
</div> 
<form action="../backend/client.php" method="post">
<div class="owed_sendz">
<input type="hidden" name="datez" value="<?php echo $datesx;?>">
<input type="hidden" name="productx" value="<?php echo $productx;?>">
<input type="hidden" name="soldx" value="<?php echo $soldx;?>">
<input type="hidden" name="price_per_eachx" value="<?php echo $price_per_eachx;?>">
<input type="hidden" name="subtotal_amountx" value="<?php echo $subtotal_amountx;?>">
<input type="hidden" name="amount_paidx" value="<?php echo $amount_paidx;?>">
<input type="hidden" name="percentzx" value="<?php echo $percentzx;?>">
<input type="hidden" name="remainingx" value="<?php echo $remainingx;?>">
<input type="hidden" name="id_salx" value="<?php echo $id_salx;?>">
<input type="hidden" name="username" value="<?php echo $username;?>">
<input type="text" name="fname" style=" width: 100%; height:100%;border: none;" placeholder="Full name of owed customer" required>
</div> 
<div style="background:#171926;margin:1px;padding:10px;width:46%;float:left;height: 6%;">
<input type="text" name="comment" style=" width: 100%; height:100%;border: none;" placeholder=" comment">
</div>
<div style="background:#171926;margin:1px;padding:10px;width:92%;float:left;height: 6%;">
<input type="submit" name="owed_customer" value="submit" style=" width: 30%; height:100%;border: none;">
</div>
</form>
</div>
</div>
<?php include '../forter.php';?>