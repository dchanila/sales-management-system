<?php include '../header.php';

if($view_product->num_rows > 0){

 }

?>

<div class="contents" id="contents">
  <h6 style="padding: 6px;">Production</h6>
<div class="table_contain">
<table class="batles_pro">
  <tr>
    <th>Product</th>
    <th>Price</th>
    <th>Total Available</th>
    <th>Action</th>
  </tr>
  <?php  while($row = $view_product->fetch_assoc()) { ?>
  <tr>
    <td><?php  echo $row['product_name']; ?></td>
    <td><?php  echo $row['price']; ?></td>
    <td><?php  echo $row['total']; ?></td>
    <td><span><i class="fa fa-eye" aria-hidden="true"></i></span><a href="../blocks_production?product=<?php  echo $row['product_name']; ?>">View and Add</a></td>  
  </tr>
  <?php } ?>
</table>
<form action="../backend/client.php" method="post" class="form_prodct" id="form_prodct">
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

<div class="buton_add" id="buton_add" onclick="add_prodct()">
  <div class="adds">+</div>
  
</div>
<div class="buton_close" id="buton_close" onclick="close_prodct()">
  <div class="closes">x</div>
  
</div>

<?php include '../forter.php';?>