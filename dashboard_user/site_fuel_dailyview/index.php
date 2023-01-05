<?php include '../header.php';

if($siteview_fuel_daily->num_rows > 0){

}
?>

<div class="contents" id="contents">
  <h6 style="padding: 6px;">Fuel site </h6>
<div class="table_contain">
<table class="batles_pro">
  <tr>                  <th >dates</th>
                        <th >Description</th>
                        <th >Liter</th>
                        <th >Prices per each</th>
                        <th >Total</th>
    
  </tr>
  <?php  while($row =$siteview_fuel_daily->fetch_assoc()) { ?>
  <tr>
                        <td><?php echo $row['dates']; ?></td>
                        <td><?php echo $row['description']; ?></td>
                        <td><?php echo $row['quantity'];?></td>
                        <td><?php echo $row['price_per_each'];?></td>
                        <td><?php echo $row['total'];?></td>
     
  </tr>
  <?php } ?>
  
</table>

</div>
</div>

<?php include '../forter.php';?>