<?php include '../header.php';
if($view_product->num_rows > 0){

}
?>
<div class="contents" id="contents">
<h6 style="padding: 6px;">Owing me</h6>
<div class="table_contain">
<table class="batles_pro">
<tr>
<th>Product</th>
<th colspan="2">Action</th>
</tr>
<?php  while($row = $view_product->fetch_assoc()) { ?>
<tr>
<td><?php  echo $row['product_name']; ?></td>
<td><span><i class="fa fa-plus-circle" aria-hidden="true"></i></span><a href="../add_order?product=<?php  echo $row['product_name']; ?>">Add</a></td>  
<td><span><i class="fa fa-eye" aria-hidden="true"></i></span><a href="../order_status?product=<?php  echo $row['product_name']; ?>">view  status</a></td>
</tr>
<?php } ?>
</table>
<form action="backend/client.php" method="post" class="form_prodct" id="form_prodct">
<table class="batles_pro">
<tr>
<td><input type="text" name="product" style="width: 100%;height: 5vh;padding: 5px;" placeholder="Enter product"></td>
<td><input type="number" name="price" style="width: 100%;height: 5vh;padding: 5px;" placeholder="price"></td>
<td><input type="submit" name="addproduct" value="Add" class="btn" ></td>
</tr>
</table>
</form>
</div>
</div>
<?php include '../forter.php';?>