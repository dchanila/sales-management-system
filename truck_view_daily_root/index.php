<?php include '../header.php';

if($truckview->num_rows > 0){

}
?>

<div class="contents" id="contents">
  <h6 style="padding: 6px;">Roots <?php echo " ".$truckname; ?></h6>
<div class="table_contain">
<table class="batles_pro">
  <tr>                  <th >dates</th>
                        <th >Truck Name</th>
                        <th >From</th>
                        <th >To</th>
                        <th >Cargo type</th>
    
  </tr>
  <?php  while($row =$truckview->fetch_assoc()) { ?>
  <tr>
                        <td><?php echo $row['dates']; ?></td>
                        <td><?php echo $row['truck_name']; ?></td>
                        <td><?php echo $row['froms'];?></td>
                        <td><?php echo $row['toz'];?></td>
                        <td><?php echo $row['cargo_type'];?></td>
     
  </tr>
  <?php } ?>
  
</table>

</div>
</div>


  
</div>
<?php include '../forter.php';?>