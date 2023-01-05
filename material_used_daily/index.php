<?php include '../header.php';

if($materialview->num_rows > 0){

}
?>

<div class="contents" id="contents">
  <h6 style="padding: 6px;"><?php echo $materialname ?></h6>
<div class="table_contain">
<table class="batles_pro">
  <tr>                  <th >dates</th>
                        <th >Material Name</th>
                        <th >Open Balance</th>
                        <th >Used</th>
                        <th >Addad</th>
                        <th >closed</th>
    
  </tr>
  <?php  while($row = $materialview->fetch_assoc()) { ?>
  <tr>
                        <td><?php echo $row['dates']; ?></td>
                        <td><?php echo $row['name']; ?></td>
                        <td><?php echo $row['open']; ?></td>
                        <td><?php echo $row['used'];?></td>
                        <td><?php echo $row['added'];?></td>
                        <td><?php echo $row['total'];?></td>
     
  </tr>
  <?php } ?>
  
</table>

</div>
</div>

  <div class="closes">x</div>
  
</div>
<?php include '../forter.php';?>