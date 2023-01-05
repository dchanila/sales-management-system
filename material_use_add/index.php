<?php include '../header.php';

if($materialview->num_rows > 0){

}
?>

<div class="contents" id="contents">
  <h6 style="padding: 6px;"><?php echo $materialname ?></h6>
  <h6 style="padding: 6px; font-size: 10px;color: red"><?php echo $matarialserr; ?></h6>
<div class="table_contain">
<table class="batles_pro">
  <tr>                  <th >dates</th>
                        <th >Material Name</th>
                        <th >Open Balance</th>
                        <th >Used</th>
                        <th >Addad</th>
                        <th >closed</th>
                        <th >Action</th>
    
  </tr>
  <?php  while($row = $materialview->fetch_assoc()) { ?>
  <tr>
                        <td><?php echo $row['dates']; ?></td>
                        <td><?php echo $row['name']; ?></td>
                        <td><?php echo $row['open']; ?></td>
                        <td><?php echo $row['used'];?></td>
                        <td><?php echo $row['added'];?></td>
                        <td><?php echo $row['total'];?></td>
                        <td><a href="../material_use_add?delete_material=<?php echo $row['id']; ?>&&mname=<?php echo $materialname; ?>" class="btns_danger"><span class="memb"><i class="fa fa-trash" aria-hidden="true" ></i></span> Delete</a></td>
     
  </tr>
  <?php } ?>
  
</table>
<form action="../backend/client.php" method="post" class="batles_pro_blocks" id="batles_pro_blocks">
  <table class="batles_pro">
  
  <tr>
                     
                        <input type="hidden" name="materialname" value="<?php echo $materialname ?>">
                        <td><input type="number" name="used" placeholder="<?php echo $materialname ?> used" required></td>
                        <td><input type="submit" name="use_material" value="Add" class="btn_s" ></td>
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