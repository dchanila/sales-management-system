<?php 
include '../header.php';
if($view_dail_reportproduction ->num_rows > 0){

}
if($view_dail_reportsalesz ->num_rows > 0){

}
?>
<div class="contents" id="contents">
<div class="table_contain">
<table class="batles_pro">
<tr>
<th colspan="7" ><?php echo $product." Daily"; ?></th>
</tr>
<tr>
<th colspan="3" >Production</th>
<th colspan="4" >Sales</th>
</tr>
<tr>
<th >Dates</th>
<th >Target</th>
<th>actual</th>
<th>Sold</th>
<th>Total</th>
<th>Cash</th>
<th>Owe</th>
</tr>
<tr ><td colspan="3" >
<table style="width: 100%;">
<?php  while($row = $view_dail_reportproduction->fetch_assoc()) { ?>
<tr >
<td style="text-align:left;"><?php  echo $row['dates']; ?></td>
<td style="text-align:left;"><?php  echo $row['target']; ?></td>
<td style="text-align:left;"><?php  echo $row['actual']; ?></td>
</tr>
<?php } ?>
</table>
</td>
<td colspan="4" >
<table style="width: 100%;">
<?php  while($row = $view_dail_reportsalesz->fetch_assoc()) { ?>
<tr >
<td style="text-align:center;"><?php  echo $row['sold']; ?></td>
<td style="text-align:center;"><?php  echo $row['subtotal_amount']; ?></td>
<td style="text-align:center;"><?php  echo $row['amount_paid']; ?></td>
<td style="text-align:center;"><?php  echo $row['remaining']; ?></td>
</tr>
<?php } ?>
</table>
</td>
</tr>
</table>
</div>
</div>
<?php include '../forter.php';?>