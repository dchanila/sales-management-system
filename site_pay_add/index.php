<?php include '../header.php';

if($siteview_pay_daily->num_rows > 0){

}
?>

<div class="contents" id="contents">
  <h6 style="padding: 6px;">Service <?php echo " ".$truckname; ?></h6>
<div class="table_contain">  
<table class="batles_pro">
  <tr>                  <th >dates</th>
                        <th >Pay for</th>
                        <th >Amount</th>
                        <th >Action</th>
    
  </tr>
  <?php  while($row =$siteview_pay_daily->fetch_assoc()) { ?>
  <tr>
                        <td><?php echo $row['dates']; ?></td>
                        <td><?php echo $row['pay_for'];?></td>
                        <td><?php echo $row['amount'];?></td>
                        <td><a href="../site_pay_add?delete_pay_site=<?php echo $row['id']; ?>" class="btns_danger"><span class="memb"><i class="fa fa-trash" aria-hidden="true" ></i></span> Delete</a></td>
     
  </tr>
  <?php } ?>
  
</table>
<form action="../backend/client.php" method="post" class="batles_pro_blocks" id="batles_pro_blocks">
  <table class="batles_pro">
  <tr> 
                    
                        <td><input type="text" name="pay_for" placeholder=" pay for " required></td>
                        <td><input type="text" name="amount" placeholder="Amount" required></td>
                        <td><input type="submit" name="add_sitepay" value="Add" class="btn_s" ></td>
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