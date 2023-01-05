<?php include '../header.php';
$truckviewz= $db->fetch(" SELECT * FROM $looking ORDER by dates DESC");
if($truckviewz->num_rows > 0){

}
?>
<div class="contents" id="contents">
<h6 style="padding: 6px;">Roots <?php echo " ".$truckname; ?></h6>
<div class="looking">
<form action="../backend/client.php" method="post">
<input type="text" name="prodctz" placeholder="Truck"><input type="date" name="datez"> <label>To</label> <input type="date" name="datec"> <input type="hidden" name="searc" value="<?php echo $looking;?>"><input type="submit" name="checkz" value="Search">
</form>
</div>
<div class="table_contain">
<table class="batles_pro">
<tr><th >dates</th>
<th >Truck Name</th>
<th >From</th>
<th >To</th>
<th >Cargo type</th>
</tr>
<?php  while($row =$truckviewz->fetch_assoc()) { ?>
<tr>
<td><?php echo $row['dates']; ?></td>
<td><?php echo $row['truck_name']; ?></td>
<td><?php echo $row['froms'];?></td>
<td><?php echo $row['toz'];?></td>
<td><?php echo $row['cargo_type'];?></td>
<?php } ?>
</table>
</div>
</div>
<?php include '../forter.php';?>