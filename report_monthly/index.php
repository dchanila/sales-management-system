<?php 
include '../header.php';
$subtotalcash=array();
$subtotalowe=array();
$totalcash='';
$totalowe='';
if($view_monthly_reportproduction  ->num_rows > 0){

}
if($view_monthly_reportsales  ->num_rows > 0){

}
?>
<div class="contents" id="contents">
<div class="table_contain">
<table class="batles_pro">
<tr>
<th colspan="7" ><?php echo $product." Monthly"; ?></th>
</tr>
<tr>
<th colspan="3" >Production</th>
<th colspan="4" >Sales</th>
</tr>
<tr>
<th >Weeks</th>
<th >Target</th>
<th>actual</th>
<th>Sold</th>
<th>Total</th>
<th>Cash</th>
<th>Owe</th>
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
<td colspan="4" >
<table style="width: 100%;">
<?php  while($row = $view_monthly_reportsales->fetch_assoc()) { ?>
<tr >
<td style="text-align:center;"><?php  echo $row['sold']; array_push($soldreport, $row['sold']);?></td>
<td style="text-align:center;"><?php  echo $row['subtotal_amount'];array_push($subtotalsales, $row['subtotal_amount']) ?></td>
<td style="text-align:center;"><?php  echo $row['amount_paid'];array_push($subtotalcash, $row['amount_paid']) ?></td>
<td style="text-align:center;"><?php  echo $row['remaining'];array_push($subtotalowe, $row['remaining']) ?></td>
</tr>
<?php } ?>
<tr>
<?php $totalsold=array_sum($soldreport);?>
<td><strong><?php echo($totalsold)." ".$product ?></strong></td>
<?php $totasales=array_sum($subtotalsales);?>
<td><strong><?php echo($totasales)." Tsh" ?></strong></td>
<?php $totalcash=array_sum($subtotalcash);?>
<td><strong><?php echo($totalcash)." Tsh" ?></strong></td>
<?php $totalowe=array_sum($subtotalowe);?>
<td><strong><?php echo($totalowe)." Tsh" ?></strong></td>
</tr>
</table>
</td>
</tr>
</table>
</div>
</div>
<?php include '../forter.php';?>