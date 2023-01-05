<?php include '../header.php';

if($truckview_fuel_monthly->num_rows > 0){

}
?>

<div class="contents" id="contents">
  <h6 style="padding: 6px;">Fuel <?php echo " ".$truckname; ?></h6>
<div class="table_contain">
<table class="batles_pro">
  <tr>                  <th >dates</th>
                        <th >Truck Name</th>
                        <th >Liter</th>
                        <th >Prices per each</th>
                        <th >Total</th>
    
  </tr>
  <?php  while($row =$truckview_fuel_monthly->fetch_assoc()) { ?>
  <tr>
                        <td><?php echo $row['dates']; ?></td>
                        <td><?php echo $row['truck_name']; ?></td>
                        <td><?php echo $row['liters'];?></td>
                        <td><?php echo $row['price_per_liter'];?></td>
                        <td><?php echo $row['total'];?></td>
     
  </tr>
  <?php } ?>
  
</table>
</div>
</div>

<?php include '../forter.php';?>