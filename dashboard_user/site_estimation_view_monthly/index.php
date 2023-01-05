<?php include '../header.php';

if($estimateview_monthly->num_rows > 0){

}
?>

<div class="contents" id="contents">
  <h6 style="padding: 6px;">Estimation add monthly</h6>
<div class="table_contain">  
<table class="batles_pro">
  <tr>                  <th >Date from</th>
                         <th >To Date</th>
                        <th >Description</th>
                        <th >Quantity</th>
                        <th >Price per each</th>
                        <th >Total amount</th>
    
  </tr>
  <?php  while($row =$estimateview_monthly->fetch_assoc()) { ?>
  <tr>
                        <td><?php echo $row['dates']; ?></td>
                        <td><?php echo $row['to_date']; ?></td>
                        <td><?php echo $row['detail'];?></td>
                        <td><?php echo $row['quantity'];?></td>
                        <td><?php echo $row['price_per_each'];?></td>
                        <td><?php echo $row['total_amount'];?></td>
     
  </tr>
  <?php } ?>
  
</table>

</div>
</div>


<?php include '../forter.php';?>