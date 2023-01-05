<?php include '../header.php';

if($truckview_pay_weekly->num_rows > 0){

}
?>

<div class="contents" id="contents">
  <h6 style="padding: 6px;">Service <?php echo " ".$truckname; ?></h6>
<div class="table_contain">  
<table class="batles_pro">
  <tr>                  <th >dates</th>
                        <th >Truck Name</th>
                        <th >Pay for</th>
                        <th >Amount</th>
    
  </tr>
  <?php  while($row =$truckview_pay_weekly->fetch_assoc()) { ?>
  <tr>
                        <td><?php echo $row['dates']; ?></td>
                        <td><?php echo $row['truck_name']; ?></td>
                        <td><?php echo $row['pay_for'];?></td>
                        <td><?php echo $row['amount'];?></td>
     
  </tr>
  <?php } ?>
  
</table>
</div>
</div>

  
</div>
<?php include '../forter.php';?>