<?php include '../header.php';

if($truckview_service_weekly->num_rows > 0){

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
    
  </tr>
  <?php  while($row =$truckview_service_weekly->fetch_assoc()) { ?>
  <tr>
                        <td><?php echo $row['dates']; ?></td>
                        <td><?php echo $row['truck_name']; ?></td>
                        <td><?php echo $row['type_of_service'];?></td>
                        <td><?php echo $row['total_service'];?></td>
                        <td><?php echo $row['price_per_each'];?></td>
                        <td><?php echo $row['total'];?></td>
     
  </tr>
  <?php } ?>
  
</table>

</div>
</div>

<?php include '../forter.php';?>