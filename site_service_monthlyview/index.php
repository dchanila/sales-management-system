<?php include '../header.php';

if($siteview_service_monthly->num_rows > 0){

}
?>

<div class="contents" id="contents">
  <h6 style="padding: 6px;">Service site monthly view</h6>
<div class="table_contain">
<table class="batles_pro">
<tr>                  
<th >Dates</th>
<th >Description</th>
<th >Type of service</th>
<th >Total service</th>
<th >Price per each</th>
<th >Total</th>
</tr>
<?php  while($row =$siteview_service_monthly->fetch_assoc()) { ?>
<tr>
<td><?php echo $row['dates']; ?></td>
<td><?php echo $row['description']; ?></td>
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