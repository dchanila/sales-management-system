<?php 
include '../header.php';
$totalcostweekly=array();
$totalproctioncostweekly='';
$total_weeklycons=array();
$totalweeklymaterial="";
$total_weeklyconsfuel=array();
$totalweeklyfuel='';
$total_weeklyconsservc=array();
$totalweeklyservc="";
$total_weeklyconspay=array();
$totalweeklypays='';
$total_weeklyconssitefuel=array();
$totalweeklysitefuel="";
$total_weeklyconssitepay=array();
$totalweeklysitepay="";
$sumallweekly='';
if($view_product_cost_weeklyconsmp->num_rows > 0){

}
if($view_material_procure_weekly_consump->num_rows > 0){

}

if($truckview_fuel_weeklyconsmp->num_rows > 0){

}

if($truckview_service_weeklyconsmp->num_rows > 0){

}
if($truckview_pay_weeklyconsump->num_rows > 0){

}

if($siteview_fuel_weeklyconsump->num_rows > 0){

}
if($siteview_pay_weeklyconsump->num_rows > 0){

}
 
?>

<div class="contents" id="contents">
	<table class="batles_report">
  <tr>
    <th colspan="6" >General weekly consumption view</th>
  </tr>
 
   <tr>
  	<th colspan="6">Weekly</th>
  </tr>

  <tr>
    <td colspan="6">
      <strong>Production cost</strong>
      <table class="batles_pro">
    <tr>
                          <th >Date</th>
                          <th >Product</th>
                          <th >Quantity</th>
                          <th >Total</th>
      
    </tr>
    <?php  while($row = $view_product_cost_weeklyconsmp->fetch_assoc()) { ?>
    <tr>
     
                          <td><?php echo $row['dates']; $datess=$row['dates']; ?></td>
                          <td><?php echo $row['product'];  ?></td>
                          <td><?php echo $row['quantity'];?></td>
                          <td><?php echo $row['total']; array_push($totalcostweekly, $row['total']); ?></td>     
    </tr>
    <?php } ?>
    <tr>
     
                          
                          <td></td>
                          
                          <td></td>
                          
                          
                          
                          <td>Total</td>
                          <?php 
                           $totalproctioncostweekly=array_sum($totalcostweekly); ?>
                          <td><strong><?php echo ($totalproctioncostweekly)." Tsh "; ?></strong></td>
                         
                          
     
 
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
  <?php  while($row = $view_material_procure_weekly_consump->fetch_assoc()) { ?>
  <tr>
                        <td><?php echo $row['dates']; ?></td>
                        <td><?php echo $row['material_type']; ?></td>
                        <td><?php echo $row['quantity']; ?></td>
                        <td><?php echo $row['price_per_each'];?></td>
                        <td><?php echo $row['total'];array_push($total_weeklycons, $row['total']);?></td>
                      
     
  </tr>
  <?php } ?>
<tr>
    <td><strong>Subtotal</strong></td>
    <?php $totalweeklymaterial=array_sum($total_weeklycons);?>
          <td style="text-align:center;" colspan="2"><strong><?php echo($totalweeklymaterial)." Tsh" ?></strong></td>
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
  <?php  while($row =$siteview_fuel_weeklyconsump->fetch_assoc()) { ?>
  <tr>
                        <td><?php echo $row['dates']; ?></td>
                        <td><?php echo $row['description']; ?></td>
                        <td><?php echo $row['quantity'];?></td>
                        <td><?php echo $row['price_per_each'];?></td>
                        <td><?php echo $row['total']; array_push($total_weeklyconssitefuel, $row['total']);?></td>
     
  </tr>
  <?php } ?>
  <tr>
    <td><strong>Subtotal</strong></td>
    <?php $totalweeklysitefuel=array_sum($total_weeklyconssitefuel);?>
          <td style="text-align:center;" colspan="2"><strong><?php echo($totalweeklysitefuel)." Tsh" ?></strong></td>
  </tr>
</table>
<strong>Other site cost</strong>
<table class="batles_pro">
  <tr>                  <th >dates</th>
                        <th >Pay for</th>
                        <th >Amount</th>
    
  </tr>
  <?php  while($row =$siteview_pay_weeklyconsump->fetch_assoc()) { ?>
  <tr>
                        <td><?php echo $row['dates']; ?></td>
                        <td><?php echo $row['pay_for'];?></td>
                        <td><?php echo $row['amount'];array_push($total_weeklyconssitepay, $row['amount']); ?></td>
     
  </tr>
  <?php } ?>
  <tr>
    <td><strong>Subtotal</strong></td>
    <?php $totalweeklysitepay=array_sum($total_weeklyconssitepay);?>
          <td style="text-align:center;" colspan="2"><strong><?php echo($totalweeklysitepay)." Tsh" ?></strong></td>
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
  <?php  while($row =$truckview_fuel_weeklyconsmp->fetch_assoc()) { ?>
  <tr>
                        <td><?php echo $row['dates']; ?></td>
                        <td><?php echo $row['truck_name']; ?></td>
                        <td><?php echo $row['liters'];?></td>
                        <td><?php echo $row['price_per_liter'];?></td>
                        <td><?php echo $row['total']; array_push($total_weeklyconsfuel, $row['total']);?></td>
     
  </tr>
  <?php } ?>
  
<td><strong>Subtotal</strong></td>
    <?php $totalweeklyfuel=array_sum($total_weeklyconsfuel);?>
          <td style="text-align:center;" colspan="2"><strong><?php echo($totalweeklyfuel)." Tsh" ?></strong></td>
  </tr>


  </table>
     <strong>Truck service</strong>
     <table class="batles_pro">
  <tr>                  <th >dates</th>
                        <th >Truck Name</th>
                        
                        <th >Total service</th>
                       
                        <th >Total</th>
    
  </tr>
  <?php  while($row =$truckview_service_weeklyconsmp->fetch_assoc()) { ?>
  <tr>
                        <td><?php echo $row['dates']; ?></td>
                        <td><?php echo $row['truck_name']; ?></td>
                        <td><?php echo $row['total_service'];?></td>                      
                        <td><?php echo $row['total']; array_push($total_weeklyconsservc, $row['total']);?></td>
     
  </tr>
  <?php } ?>
  <tr>
  <td><strong>Subtotal</strong></td>
    <?php $totalweeklyservc=array_sum($total_weeklyconsservc);?>
          <td style="text-align:center;" colspan="2"><strong><?php echo($totalweeklyservc)." Tsh" ?></strong></td>
  </tr>
</table>
<strong>Truck payments</strong>
<table class="batles_pro">
  <tr>                  <th >dates</th>
                        <th >Truck Name</th>
                        
                        <th >Amount</th>
    
  </tr>
  <?php  while($row =$truckview_pay_weeklyconsump->fetch_assoc()) { ?>
  <tr>
                        <td><?php echo $row['dates']; ?></td>
                        <td><?php echo $row['truck_name']; ?></td>
                        
                        <td><?php echo $row['amount'];array_push($total_weeklyconspay, $row['amount']);?></td>
     
  </tr>
  <?php } ?>

   <tr>
  <td><strong>Subtotal</strong></td>
    <?php $totalweeklypays=array_sum($total_weeklyconspay);?>
          <td style="text-align:center;" colspan="2"><strong><?php echo($totalweeklypays)." Tsh" ?></strong></td>
  </tr>
  
</table>
   
      
    </td>
  </tr>

<tr><td><strong>Total</strong></td>
  <td colspan="5"><strong><?php $sumallweekly=$totalweeklymaterial+$totalweeklysitefuel+$totalweeklysitepay+$totalweeklyfuel+$totalweeklyservc+$totalweeklypays+$totalproctioncostweekly; echo $sumallweekly."Tsh";?></strong></td>
</tr>
 
</table>
</div>

<?php include '../forter.php';?>




