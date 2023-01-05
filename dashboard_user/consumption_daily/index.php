<?php 
include '../header.php';
$totalcost=array();
$totalproctioncost="";
$total_dailycons=array();
$totaldailmaterial="";
$total_dailyconsfuel=array();
$totaldailfuel='';
$total_dailyconsservc=array();
$totaldailservc="";
$total_dailyconspay=array();
$totaldailpays='';
$total_dailyconssitefuel=array();
$totaldailsitefuel="";
$total_dailyconssitepay=array();
$totaldailsitepay="";
$sumalldaily='';
if($view_product_costdaily->num_rows > 0){

 }

if($view_material_procuregeneraldaily->num_rows > 0){

}

if($truckview_fuel_dailyconsp->num_rows > 0){

}

if($truckview_service_dailyconsp->num_rows > 0){

}
if($truckview_pay_dailyconsp->num_rows > 0){

}

if($siteview_fuel_daily->num_rows > 0){

}
if($siteview_pay_dailyconsump->num_rows > 0){

}
 
?>

<div class="contents" id="contents">
	<table class="batles_report">
  <tr>
    <th colspan="6" >General dail consumption view</th>
  </tr>
 
   <tr>
  	<th colspan="6">Today</th>
  </tr>
  <tr>
    <td colspan="6"> <strong>Production cost</strong>
       <table class="batles_pro">
    <tr>
                          <th >Date</th>
                          <th >Product</th>
                          
                          <th >Quantity</th>
                        
                          <th >Total</th>
      
    </tr>
    <?php  while($row = $view_product_costdaily->fetch_assoc()) { ?>
    <tr>
     
                          <td><?php echo $row['dates']; $datess=$row['dates']; ?></td>
                          <td><?php echo $row['product'];  ?></td>
                          
                          <td><?php echo $row['quantity'];?></td>
                         
                          <td><?php echo $row['total']; array_push($totalcost, $row['total']); ?></td>     
    </tr>
    <?php } ?>
    <tr>
     
                         
                          
                          <td></td>
                          
                          <td></td>
                          
                          
                          
                          <td>Total</td>
                          <?php 
                           $totalproctioncost=array_sum($totalcost); ?>
                          <td><strong><?php echo ($totalproctioncost)." Tsh "; ?></strong></td>
                         
                          
     
 
    </tr>
  </table>
      


    </td>
  </tr>
  <tr>
    <td colspan="3">
      <strong>Material procurement</strong>
      <table style="width: 100%;">
         <tr>                  <th >dates</th>
                        <th >Material Name</th>
                        <th >Quantity</th>
                        <th >Price per each</th>
                        <th >Total</th>
                      
    
  </tr>
  <?php  while($row = $view_material_procuregeneraldaily->fetch_assoc()) { ?>
  <tr>
                        <td><?php echo $row['dates']; ?></td>
                        <td><?php echo $row['material_type']; ?></td>
                        <td><?php echo $row['quantity']; ?></td>
                        <td><?php echo $row['price_per_each'];?></td>
                        <td><?php echo $row['total'];array_push($total_dailycons, $row['total']);?></td>
                      
     
  </tr>
  <?php } ?>
<tr>
    <td><strong>Subtotal</strong></td>
    <?php $totaldailmaterial=array_sum($total_dailycons);?>
          <td style="text-align:center;" colspan="2"><strong><?php echo($totaldailmaterial)." Tsh" ?></strong></td>
  </tr>
</table>
<strong>Fuel site</strong>

<table class="batles_pro">
  <tr>                  <th >dates</th>
                        <th >Description</th>
                        <th >Liter</th>
                        <th >Prices per each</th>
                        <th >Total</th>
    
  </tr>
  <?php  while($row =$siteview_fuel_dailyconsump->fetch_assoc()) { ?>
  <tr>
                        <td><?php echo $row['dates']; ?></td>
                        <td><?php echo $row['description']; ?></td>
                        <td><?php echo $row['quantity'];?></td>
                        <td><?php echo $row['price_per_each'];?></td>
                        <td><?php echo $row['total']; array_push($total_dailyconssitefuel, $row['total']);?></td>
     
  </tr>
  <?php } ?>
  <tr>
    <td><strong>Subtotal</strong></td>
    <?php $totaldailsitefuel=array_sum($total_dailyconssitefuel);?>
          <td style="text-align:center;" colspan="2"><strong><?php echo($totaldailsitefuel)." Tsh" ?></strong></td>
  </tr>
</table>
<strong>Other site cost</strong>
<table class="batles_pro">
  <tr>                  <th >dates</th>
                        <th >Pay for</th>
                        <th >Amount</th>
    
  </tr>
  <?php  while($row =$siteview_pay_dailyconsump->fetch_assoc()) { ?>
  <tr>
                        <td><?php echo $row['dates']; ?></td>
                        <td><?php echo $row['pay_for'];?></td>
                        <td><?php echo $row['amount'];array_push($total_dailyconssitepay, $row['amount']); ?></td>
     
  </tr>
  <?php } ?>
  <tr>
    <td><strong>Subtotal</strong></td>
    <?php $totaldailsitepay=array_sum($total_dailyconssitepay);?>
          <td style="text-align:center;" colspan="2"><strong><?php echo($totaldailsitepay)." Tsh" ?></strong></td>
  </tr>
</table>



    </td>
    <td colspan="3"><strong>Truck Fuel </strong>
  <table style="width:100%">
    <tr>                  <th >dates</th>
                        <th >Truck Name</th>
                        <th >Liter</th>
                        <th >Prices per each</th>
                        <th >Total</th>
    
  </tr>
  <?php  while($row =$truckview_fuel_dailyconsp->fetch_assoc()) { ?>
  <tr>
                        <td><?php echo $row['dates']; ?></td>
                        <td><?php echo $row['truck_name']; ?></td>
                        <td><?php echo $row['liters'];?></td>
                        <td><?php echo $row['price_per_liter'];?></td>
                        <td><?php echo $row['total']; array_push($total_dailyconsfuel, $row['total']);?></td>
     
  </tr>
  <?php } ?>
  
<td><strong>Subtotal</strong></td>
    <?php $totaldailfuel=array_sum($total_dailyconsfuel);?>
          <td style="text-align:center;" colspan="2"><strong><?php echo($totaldailfuel)." Tsh" ?></strong></td>
  </tr>


  </table>
     <strong>Truck service</strong>
     <table class="batles_pro">
  <tr>                  <th >dates</th>
                        <th >Truck Name</th>
                        
                        <th >Total service</th>
                       
                        <th >Total</th>
    
  </tr>
  <?php  while($row =$truckview_service_dailyconsp->fetch_assoc()) { ?>
  <tr>
                        <td><?php echo $row['dates']; ?></td>
                        <td><?php echo $row['truck_name']; ?></td>
                        <td><?php echo $row['total_service'];?></td>                      
                        <td><?php echo $row['total']; array_push($total_dailyconsservc, $row['total']);?></td>
     
  </tr>
  <?php } ?>
  <tr>
  <td><strong>Subtotal</strong></td>
    <?php $totaldailservc=array_sum($total_dailyconsservc);?>
          <td style="text-align:center;" colspan="2"><strong><?php echo($totaldailservc)." Tsh" ?></strong></td>
  </tr>
</table>
<strong>Truck payments</strong>
<table class="batles_pro">
  <tr>                  <th >dates</th>
                        <th >Truck Name</th>
                        
                        <th >Amount</th>
    
  </tr>
  <?php  while($row =$truckview_pay_dailyconsp->fetch_assoc()) { ?>
  <tr>
                        <td><?php echo $row['dates']; ?></td>
                        <td><?php echo $row['truck_name']; ?></td>
                        
                        <td><?php echo $row['amount'];array_push($total_dailyconspay, $row['amount']);?></td>
     
  </tr>
  <?php } ?>

   <tr>
  <td><strong>Subtotal</strong></td>
    <?php $totaldailpays=array_sum($total_dailyconspay);?>
          <td style="text-align:center;" colspan="2"><strong><?php echo($totaldailpays)." Tsh" ?></strong></td>
  </tr>
  
</table>
   
      
    </td>
  </tr>

<tr><td><strong>Total</strong></td>
  <td colspan="5"><strong><?php $sumalldaily=$totaldailmaterial+$totaldailsitefuel+$totaldailsitepay+$totaldailfuel+$totaldailservc+$totaldailpays+$totalproctioncost; echo $sumalldaily."Tsh";?></strong></td>
</tr>
 
</table>
</div>

<?php include '../forter.php';?>




