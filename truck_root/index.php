<?php include '../header.php';

if($view_truck->num_rows > 0){

 }



?>

<div class="contents" id="contents">
  <h6 style="padding: 6px;">Truck</h6>
<div class="table_contain">
<table class="batles_pro">
  <tr>
    <th>Truck Name</th>
    <th colspan="2">Action</th>
  </tr>
  <?php  while($row = $view_truck->fetch_assoc()) { ?>
  <tr>
    <td><?php  echo $row['truck_name']; ?></td>
    <td><span><i class="fa fa-plus" aria-hidden="true"></i></span><a href="../truck_add_root?tname=<?php  echo $row['truck_name']; ?>"> Add</a></td> 
     <td><span><i class="fa fa-eye" aria-hidden="true"></i></span><a href="../truck_view_root?tname=<?php  echo $row['truck_name']; ?>">View </a></td>  
  </tr>
  <?php } ?>
</table>
<form action="../backend/client.php" method="post" class="form_prodct" id="form_prodct">
  <table class="batles_pro">
  
  <tr>
    <td><input type="text" name="truckname" style="width: 100%;height: 5vh;padding: 5px;" placeholder="Enter Truck name"></td>
    <td><input type="submit" name="addtruck" value="Add" class="btn" ></td>
  </tr>

  
</table>
</form>
</div>
</div>

<div class="buton_add" id="buton_add" onclick="add_prodct()">
  <div class="adds">+</div>
  
</div>
<div class="buton_close" id="buton_close" onclick="close_prodct()">
  <div class="closes">x</div>
  
</div>

<?php include '../forter.php';?>


                  