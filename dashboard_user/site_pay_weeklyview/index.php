<?php include '../header.php';

if($siteview_pay_weekly->num_rows > 0){

}
?>

<div class="contents" id="contents">
  <h6 style="padding: 6px;">Site service </h6>
<div class="table_contain">  
<table class="batles_pro">
  <tr>                  <th >dates</th>
                        <th >Pay for</th>
                        <th >Amount</th>
    
  </tr>
  <?php  while($row =$siteview_pay_weekly->fetch_assoc()) { ?>
  <tr>
                        <td><?php echo $row['dates']; ?></td>
                        <td><?php echo $row['pay_for'];?></td>
                        <td><?php echo $row['amount'];?></td>
     
  </tr>
  <?php } ?>
  
</table>

</div>
</div>

<?php include '../forter.php';?>