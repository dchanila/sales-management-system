<?php 
include '../header.php';
$total_amount=array();
$totalest="";
$total_amountweek=array();
$totalestweek='';
$total_amountmonth=array();
$totalestmonth="";
$sumall='';
if($estimateview_daily->num_rows > 0){

 }

 if($estimateview_weekly->num_rows > 0){

}
if($estimateview_monthly->num_rows > 0){

}
 
?>

<div class="contents" id="contents">
	<table class="batles_report">
  <tr>
    <th colspan="5" >General view</th>
  </tr>
 
   <tr>
  	<th colspan="5">Day</th>
  </tr>
   <tr>
                          <th >dates</th>
                        <th >Description</th>
                        <th >Quantity</th>
                        <th >Price per each</th>
                        <th >Total amount</th>
  </tr>
  

  	
  			<?php  while($row = $estimateview_daily->fetch_assoc()) { ?>
         <tr >
         	<td style="text-align:center;"><?php  echo $row['dates']; ?></td>
  		    <td style="text-align:center;"><?php  echo $row['detail']; ?></td>
          <td style="text-align:center;"><?php  echo $row['quantity']; ?></td>
          <td style="text-align:center;"><?php  echo $row['price_per_each']; ?></td>
  		    <td style="text-align:center;"><?php  echo $row['total_amount'];array_push($total_amount, $row['total_amount']) ?></td>
  	</tr>
  			 <?php } ?>
  		

  <tr>
    <td></td>
    <td></td>
    <td></td>
    <td></td>
    <?php $totalest=array_sum($total_amount);?>
          <td style="text-align:center;"><strong><?php echo($totalest)." Tsh" ?></strong></td>
  </tr>
  <td colspan="2"><strong> week</strong>

  <table style="width: 100%;">
     <tr >
                        <th >dates</th>
                        <th >Description</th>
                        <th >Quantity</th>
                        <th >Price per each</th>
                        <th >Total amount</th>
  </tr>
  <?php  while($row = $estimateview_weekly->fetch_assoc()) { ?>
         <tr >
          <td style="text-align:center;"><?php  echo $row['dates']; ?></td>
          <td style="text-align:center;"><?php  echo $row['detail']; ?></td>
          <td style="text-align:center;"><?php  echo $row['quantity']; ?></td>
          <td style="text-align:center;"><?php  echo $row['price_per_each']; ?></td>
          <td style="text-align:center;"><?php  echo $row['total_amount'];array_push($total_amountweek, $row['total_amount']) ?></td>
    </tr>
         <?php } ?>

       <tr>
    <td></td>
    <td></td>
    <td></td>
    <td></td>
    <?php $totalestweek=array_sum($total_amountweek);?>
          <td style="text-align:center;"><strong><?php echo($totalestweek)." Tsh" ?></strong></td>
  </tr>

  </table>
  </td>

  <td colspan="3"><strong>Month</strong>
    
    <table style="width: 100%;">
     <tr >
                        <th >dates</th>
                        <th >Description</th>
                        <th >Quantity</th>
                        <th >Price per each</th>
                        <th >Total amount</th>
  </tr>
  <?php  while($row = $estimateview_monthly ->fetch_assoc()) { ?>
         <tr >
          <td style="text-align:center;"><?php  echo $row['dates']; ?></td>
          <td style="text-align:center;"><?php  echo $row['detail']; ?></td>
          <td style="text-align:center;"><?php  echo $row['quantity']; ?></td>
          <td style="text-align:center;"><?php  echo $row['price_per_each']; ?></td>
          <td style="text-align:center;"><?php  echo $row['total_amount'];array_push($total_amountmonth, $row['total_amount']) ?></td>
    </tr>
         <?php } ?>

       <tr>
    <td></td>
    <td></td>
    <td></td>
    <td></td>
    <?php $totalestmonth=array_sum($total_amountmonth);?>
          <td style="text-align:center;"><strong><?php echo($totalestmonth)." Tsh" ?></strong></td>
  </tr>

  </table>
  </td>


  <tr>
    <td><strong>Total</strong></td>
    <td colspan="4"><strong><?php $sumall=$totalest+$totalestweek+$totalestmonth; echo $sumall;?></strong></td>

  </tr>
</table>
</div>

<?php include '../forter.php';?>