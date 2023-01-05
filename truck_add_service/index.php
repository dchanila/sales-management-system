<?php include '../header.php';

if($truckview_service_daily->num_rows > 0){

}
?>

<div class="contents" id="contents">
  <h6 style="padding: 6px;">Service <?php echo " ".$truckname; ?></h6>
<div class="table_contain">
<table class="batles_pro">
  <tr>                  <th >dates</th>
                        <th >Truck Name</th>
                        <th >Type of service</th>
                        <th >Total service</th>
                        <th >Price per each</th>
                        <th >Total</th>
                        <th >Action</th>

    
  </tr>
  <?php  while($row =$truckview_service_daily->fetch_assoc()) { ?>
  <tr>
                        <td><?php echo $row['dates']; ?></td>
                        <td><?php echo $row['truck_name']; ?></td>
                        <td><?php echo $row['type_of_service'];?></td>
                        <td><?php echo $row['total_service'];?></td>
                        <td><?php echo $row['price_per_each'];?></td>
                        <td><?php echo $row['total'];?></td>
                        <td><a href="../truck_add_service?delete_service=<?php echo $row['id']; ?>&&tname=<?php echo $row['truck_name']; ?>" class="btns_danger"><span class="memb"><i class="fa fa-trash" aria-hidden="true" ></i></span> Delete</a></td>
     
  </tr>
  <?php } ?>
  
</table>
<form action="../backend/client.php" method="post" class="batles_pro_blocks" id="batles_pro_blocks">
  <table class="batles_pro">
  
  <tr> 
                        <input type="hidden" name="truckname" value="<?php echo $truckname; ?>">
                        <td><input type="text" name="type_of_service" placeholder="Type of service" required></td>
                        <td><input type="text" name="total_service" placeholder="Total service" required></td>
                        <td><input type="text" name="price_per_each" placeholder="Price per each" required></td>
                        <td><input type="submit" name="add_truckservice" value="Add" class="btn_s" ></td>
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