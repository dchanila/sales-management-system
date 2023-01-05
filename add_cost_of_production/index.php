<?php include '../header.php'; 
if($view_product_cost->num_rows > 0){

}
?>
<div class="contents" id="contents">
<h6 style="padding: 6px;">production cost for <?php echo $product;?></h6>
<div class="table_contain">
<table class="batles_pro">
<tr>
<th >Date</th>
<th >Product</th>
<th >Type of charge</th>
<th >Quantity</th>
<th >Per each</th>
<th >Total</th>
<th >Action</th>
</tr>
<?php  while($row = $view_product_cost->fetch_assoc()) { ?>
<tr>
<td><?php echo $row['dates']; $datess=$row['dates']; ?></td>
<td><?php echo $row['product'];  ?></td>
<td><?php echo $row['type_of_charge'];  ?></td>
<td><?php echo $row['quantity'];?></td>
<td><?php echo $row['per_each']; ?></td>
<td><?php echo $row['total']; array_push($totalcost, $row['total']); ?></td>
<td><a href="../add_cost_of_production?del_product=<?php echo $row['id'];  ?>" class="btns_danger"><span class="memb"><i class="fa fa-trash" aria-hidden="true" ></i></span> Delete</a></td>     
</tr>
<?php } ?>
<tr>
<td></td>
<td></td>
<td></td>
<td></td>
<td>Total</td>
<?php 
$totalproctioncost=array_sum($totalcost); ?>
<td colspan="2"><strong><?php echo ($totalproctioncost)." Tsh "; ?></strong></td>
</tr>
</table>
<form action="../backend/client.php" method="post" class="batles_pro_blocks" id="batles_pro_blocks">
<table class="batles_pro">
<tr>
<td><input type="hidden" name="product"  value="<?php echo $product; ?>" required></td>
<td><input type="text" name="type_of_charge" placeholder="Type of charge" required></td>
<td><input type="number" name="quantity" placeholder="quantity" required></td>
<td><input type="number" name="per_each" placeholder="per_each" required></td>
<td><input type="submit" name="add_cost" value="Add" class="btn_s" ></td>
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