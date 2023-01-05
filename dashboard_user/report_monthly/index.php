<?php 
include '../header.php';
if($view_monthly_reportproduction  ->num_rows > 0){

 }
 if($view_monthly_reportsales  ->num_rows > 0){

 }
?>

<div class="contents" id="contents">
  <table class="batles_report">
  <tr>
    <th colspan="5" ><?php echo $product." Monthly"; ?></th>
  </tr>
  <tr>
    <th colspan="3" >Production</th>
    <th colspan="2" >Sales</th>
  </tr>
   <tr>
    <th >Weeks</th>
    <th >Target</th>
    <th>actual</th>
    <th>Sold</th>
    <th>Total</th>
  </tr>

  
    <tr ><td colspan="3" >
        <table style="width: 100%;">
        <?php  while($row = $view_monthly_reportproduction->fetch_assoc()) { ?>
         <tr >
          <td style="text-align:center;"><?php  echo $row['weeks']; $weekss=$row['weeks'];?></td>
          <td style="text-align:center;"><?php  echo $row['target'];array_push($targetreport, $row['target']); ?></td>
      <td style="text-align:center;"><?php  echo $row['actual']; array_push($actualreport, $row['actual']);?></td>
      </tr>
         <?php } ?>

         <tr>
           <?php $totaltarget=array_sum($targetreport);?>
           <td  style="text-align:center;"></td>
           <td style="text-align:center;"><strong><?php echo($totaltarget)." ".$product ?></strong></td>
          <?php $totalactual=array_sum($actualreport);?>
          <td style="text-align:center;"><strong><?php echo($totalactual)." ".$product ?></strong></td>

         </tr>
          </table>
      

    </td>

    <td colspan="2" >
        <table style="width: 100%;">
        <?php  while($row = $view_monthly_reportsales->fetch_assoc()) { ?>
         <tr >
          <td style="text-align:center;"><?php  echo $row['sold']; array_push($soldreport, $row['sold']);?></td>
          <td style="text-align:center;"><?php  echo $row['total']; array_push($subtotalsales, $row['total']);?></td>
      </tr>
         <?php } ?>
         <tr>
           <?php $totalsold=array_sum($soldreport);?>
           <td><strong><?php echo($totalsold)." ".$product ?></strong></td>
          <?php $totasales=array_sum($subtotalsales);?>
          <td><strong><?php echo($totasales)." Tsh" ?></strong></td>

         </tr>
          </table>

     

    </td>
 
    </tr>
  
</table>
</div>

<?php include '../forter.php';?>