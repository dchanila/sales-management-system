<?php include '../header.php';

if($view_order->num_rows > 0){

}
?>

<div class="contents" id="contents">
  <h6 style="padding: 6px;">Order <?php echo $product; ?></h6>
<div class="table_contain">
<table class="batles_pro">
  <tr>                  <th >Dates</th>
                        <th >Order name</th>
                        <th >Order type</th>
                        <th >Date to deliver</th>
                        <th >Quantity</th>
                        <th >Price per each</th>
                        <th >Total amount</th>
                        <th >Status</th>
                        <th >Paid</th>
                        <th >Amount Paid</th>
                        <th >Remaining</th>
                        <th >Action</th>
    
  </tr>
  <?php  while($row = $view_order->fetch_assoc()) { ?>
  <tr>
                        <td><?php echo $row['dates']; ?></td>
                        <td><?php echo $row['order_name']; ?></td>
                        <td><?php echo $row['order_type']; ?></td>
                        <td><?php echo $row['date_to_deliver'];?></td>
                        <td><?php echo $row['quantity'];?></td>
                        <td><?php echo $row['price_per_each'];?></td>
                        <td><?php echo $row['total_amount'];?></td>
                        <td><?php echo $row['statuz'];?></td>
                        <td><?php echo $row['paid']."%";?></td>
                        <td><?php echo $row['amount_paid'];?>
                        </td>
                        <td><?php echo $row['remaining'];?></td>
                        <td><span><i class="fa fa-plus-circle" aria-hidden="true"></i></span><a href="../add_order_amount?order_id=<?php  echo $row['order_id']; ?>&&product=<?php echo $product?>" >add amount</a></td>
     
  </tr>
  <?php } ?>
  
</table>
<form action="../backend/client.php" method="post" class="batles_pro_blocks" id="batles_pro_blocks">
  <table class="batles_pro">
  
    <tr>


      <td><input type="hidden" name="product" value="<?php echo $product; ?>"><input type="text" name="order_name" placeholder="order for who" required></td>
      <td><input type="date" name="date_to_deliver"  required></td>
      <td><input type="number" name="quantity" placeholder="Quantity" required></td>
      <td><input type="number" name="price_per_each" placeholder="price" required></td>
      <td><input type="number" name="amount_paid" placeholder="amount paid" required></td>
      <td><input type="submit" name="add_order" value="Add" class="btn_s" ></td>
    </tr>

  
</table>
</form>
</div>
 


<div class="buton_add" id="buton_add" onclick="add_prodction()">
  <div class="adds">+</div>
  
</div>
<div class="buton_close" id="buton_close" onclick="close_prodction()">
  <div class="closes">x</div>
  
</div>
<?php include '../forter.php';?>