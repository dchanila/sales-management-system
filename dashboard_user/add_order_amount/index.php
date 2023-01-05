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
                        <td><span><i class="fa fa-plus-circle" aria-hidden="true"></i></span><a href="../add_order_amount?order_id=<?php  echo $row['order_id']; ?>&&product=<?php echo $product; ?>" >add amount</a></td>
     
  </tr>
  <?php } ?>
  
</table>

<form action="../backend/client.php" method="post">
                            <div style="padding:20px;">
                              <h6>order from <?php echo ' '.$order_name; ?></h6>
                              <h6>current amount paidis <?php echo ' '.$amount_paids; ?> </h6>
                              <input type="hidden" name="order_id" value="<?php echo $order_id; ?>">
                              <input type="hidden" name="order_type" value="<?php echo $order_type; ?>">
                              <input type="hidden" name="order_name" value="<?php echo $order_name; ?>">
                              <input type="hidden" name="total_amounts" value="<?php echo $total_amounts; ?>">
                              <input type="hidden" name="amount_paid_og" value="<?php echo $amount_paids; ?>">
                              <input type="number" name="amount_paid" placeholder="add amount paid"><br>
                              <input type="submit" name="add_amount_paid" value="Add amount" class="btn_s" >
                            </div>
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