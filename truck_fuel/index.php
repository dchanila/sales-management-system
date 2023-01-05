<?php include '../header.php';

if($view_truck->num_rows > 0){

 }



?>

<div class="contents" id="contents">
  <h6 style="padding: 6px;">Truck Fuel</h6>
<div class="table_contain">
<table class="batles_pro">
  <tr>
    <th>Truck Name</th>
    <th colspan="2">Action</th>
  </tr>
  <?php  while($row = $view_truck->fetch_assoc()) { ?>
  <tr>
    <td><?php  echo $row['truck_name']; ?></td>
    <td><span><i class="fa fa-plus" aria-hidden="true"></i></span><a href="../truck_add_fuel?tname=<?php  echo $row['truck_name']; ?>"> Add</a></td> 
     <td><span><i class="fa fa-eye" aria-hidden="true"></i></span><a href="../truck_view_fuel?tname=<?php  echo $row['truck_name']; ?>">View </a></td>  
  </tr>
  <?php } ?>
</table>

</div>
</div>



<?php include '../forter.php';?>


                  