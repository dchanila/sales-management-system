<?php include '../header.php';

if($view_order_act->num_rows > 0){

}
?>

<div class="contents" id="contents">
  <h6 style="padding: 6px;">Order <?php echo $product." "; ?></h6>
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
  <?php  while($row = $view_order_act->fetch_assoc()) { ?>
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
                        <td>
                          <form action="../backend/client.php" method="post" >
                            <input type="hidden" name="order_id" value="<?php echo $row['order_id']; ?>">
                            <input type="hidden" name="order_type" value="<?php echo $row['order_type']; ?>">
                            <input type="hidden" name="order_name" value="<?php echo $row['order_name']; ?>">
                            <input type="hidden" name="status" value="<?php echo $orderstatus;?>">
                            <input style="padding: 2%;color: green" type="submit" name="ordersact" value="<?php echo $states;?>">

                          </form>
                        </td>
     
  </tr>
  <?php } ?>
  
</table>
</div>
<?php include '../forter.php';?>