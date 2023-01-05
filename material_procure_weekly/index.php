<?php include '../header.php';

if($view_material_procure_weekly ->num_rows > 0){

}
?>
 
<div class="contents" id="contents">
  <h6 style="padding: 6px;"><?php echo $materialname ?></h6>
<div class="table_contain">
<table class="batles_pro">
  <tr>                  <th >dates</th>
                        <th >Material Name</th>
                        <th >Quantity</th>
                        <th >Price per each</th>
                        <th >Total</th>
                      
    
  </tr>
  <?php  while($row = $view_material_procure_weekly ->fetch_assoc()) { ?>
  <tr>
                        <td><?php echo $row['dates']; ?></td>
                        <td><?php echo $row['material_type']; ?></td>
                        <td><?php echo $row['quantity']; ?></td>
                        <td><?php echo $row['price_per_each'];?></td>
                        <td><?php echo $row['total'];?></td>
                      
     
  </tr>
  <?php } ?>
  
</table>

</div>
</div>

<?php include '../forter.php';?>