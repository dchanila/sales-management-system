<?php include '../header.php';

if($siteview_fuel_daily->num_rows > 0){

}
?>

<div class="contents" id="contents">
  <h6 style="padding: 6px;">Fuel site</h6>
<div class="table_contain">
<table class="batles_pro">
  <tr>                  <th >dates</th>
                        <th >Description</th>
                        <th >Liter</th>
                        <th >Prices per each</th>
                        <th >Total</th>
                        <th >Action</th>
    
  </tr>
  <?php  while($row =$siteview_fuel_daily->fetch_assoc()) { ?>
  <tr>
                        <td><?php echo $row['dates']; ?></td>
                        <td><?php echo $row['description']; ?></td>
                        <td><?php echo $row['quantity'];?></td>
                        <td><?php echo $row['price_per_each'];?></td>
                        <td><?php echo $row['total'];?></td>
                         <td><a href="../site_fuel_add?delete_fuel_site=<?php echo $row['id']; ?>" class="btns_danger"><span class="memb"><i class="fa fa-trash" aria-hidden="true" ></i></span> Delete</a></td>
  </tr>
  <?php } ?>
  
</table>
<form action="../backend/client.php" method="post" class="batles_pro_blocks" id="batles_pro_blocks">
  <table class="batles_pro">
  <tr> 
                        <td><input type="text" name="description" placeholder=" fuel For ? " ></td>
                        <td><input type="text" name="quantity" placeholder=" liter ? " required></td>
                        <td><input type="text" name="price_per_each" placeholder="price per liter" required></td>
                        <td><input type="submit" name="add_sitefuel" value="Add" class="btn_s" ></td>
  </tr>

  
</table>
</form>
</div>
</div>


<div class="buton_add" id="buton_add" onclick="add_prodction()">
  <div class="adds">+</div>
  
</div>
<div class="buton_close" id="buton_close" onclick="close_prodction()">
  <div class="closes">x</div>
  
</div>
<?php include '../forter.php';?>