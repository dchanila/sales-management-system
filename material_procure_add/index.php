<?php include '../header.php';

if($view_material_procure->num_rows > 0){

}
?>
 
<div class="contents" id="contents">
  <h6 style="padding: 6px;"><?php echo $materialname; ?></h6>
<div class="table_contain">
<table class="batles_pro">
  <tr>                  <th >dates</th>
                        <th >Material Name</th>
                        <th >Quantity</th>
                        <th >Price per each</th>
                        <th >Total</th>
                        <th >Action</th>
                      
    
  </tr>
  <?php  while($row = $view_material_procure->fetch_assoc()) { ?>
  <tr>
                        <td><?php echo $row['dates']; ?></td>
                        <td><?php echo $row['material_type']; ?></td>
                        <td><?php echo $row['quantity']; ?></td>
                        <td><?php echo $row['price_per_each'];?></td>
                        <td><?php echo $row['total'];?></td>
                        <td><a href="../material_procure_add?delete_material_procure=<?php echo $row['id']; ?>&&mname=<?php echo $materialname; ?>" class="btns_danger"><span class="memb"><i class="fa fa-trash" aria-hidden="true" ></i></span> Delete</a></td>
                      
     
  </tr>
  <?php } ?>
  
</table>
<form action="../backend/client.php" method="post" class="batles_pro_blocks" id="batles_pro_blocks">
  <table class="batles_pro">
  
  <tr>
                     
                        <input type="hidden" name="material_type" value="<?php echo $materialname ?>">
                        <td><input type="number" name="quantity" placeholder="add <?php echo $materialname ?>" required></td>
                        <td><input type="number" name="price_per_each" placeholder="price per each" required></td>
                        <td><input type="submit" name="material_procure" value="Add" class="btn_s" ></td>
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