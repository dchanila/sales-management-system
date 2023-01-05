<?php 
include '../header.php';
if($view_dail_reportproduction  ->num_rows > 0){

 }
 if($view_dail_reportsales  ->num_rows > 0){

 }
?>

<div class="contents" id="contents">
	<table class="batles_report">
  <tr>
    <th colspan="5" ><?php echo $product." Daily"; ?></th>
  </tr>
  <tr>
  	<th colspan="3" >Production</th>
    <th colspan="2" >Sales</th>
  </tr>
   <tr>
  	<th >Dates</th>
    <th >Target</th>
    <th>actual</th>
    <th>Sold</th>
    <th>Total</th>
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

  	<td colspan="2" >
  			<table style="width: 100%;">
  			<?php  while($row = $view_dail_reportsales->fetch_assoc()) { ?>
         <tr >
         	<td style="text-align:center;"><?php  echo $row['sold']; ?></td>
  		    <td style="text-align:center;"><?php  echo $row['total']; ?></td>
  		</tr>
  			 <?php } ?>
  			  </table>
  		

  	</td>
 
  	</tr>
  
</table>
</div>

<?php include '../forter.php';?>