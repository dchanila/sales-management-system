<?php 
include '../header.php';
$total_monthlycons=array();
$totalmonthlyprocost="";
$totalmonthlymaterial="";
$totalcostmonthconsump=array();
$totalproctioncostmonthsump="";
$total_monthlyconsfuel=array();
$totalmonthlyfuel='';
$total_monthlyconsservc=array();
$totalmonthlyservc="";
$total_monthlyconspay=array();
$totalmonthlypays='';
$total_monthlyconssitefuel=array();
$totalmonthlysitefuel="";
$total_monthlyconssitepay=array();
$totalmonthlysitepay="";
$sumallmonthly='';
$total_monthlyconssiteservc=array();
$totalmonthlysiteservc="";
$siteview_service_monthlyz= $db->fetch("SELECT * FROM service_site");
if($siteview_service_monthlyz->num_rows > 0){

}
$view_product_cost_monthlyconsmpz = $db->fetch("SELECT * FROM production_cost");
if($view_product_cost_monthlyconsmpz->num_rows > 0){

}
$view_material_procure_monthlyconsupz = $db->fetch("SELECT * FROM material_procure");
if($view_material_procure_monthlyconsupz->num_rows > 0){

}
$truckview_fuel_monthlyconsumpz= $db->fetch("SELECT * FROM truck_fuel");
if($truckview_fuel_monthlyconsumpz->num_rows > 0){

}
$truckview_service_monthlyconsumpz= $db->fetch("SELECT * FROM truck_service");
if($truckview_service_monthlyconsumpz->num_rows > 0){

}
$truckview_pay_monthlyconsumpz= $db->fetch("SELECT * FROM truck_payment");
if($truckview_pay_monthlyconsumpz->num_rows > 0){

}
$siteview_fuel_monthlyconsumpz= $db->fetch("SELECT * FROM fuel_site");
if($siteview_fuel_monthlyconsumpz->num_rows > 0){

}
$siteview_pay_monthlyconsumpz= $db->fetch("SELECT * FROM site_payment");
if($siteview_pay_monthlyconsumpz->num_rows > 0){

}
?>
<div class="contents" id="contents">
<h6 style="padding: 6px;">consumption</h6>
<div class="looking">
<form action="../backend/client.php" method="post">
<input type="text" name="prodctz" placeholder="product"><input type="date" name="datez"> <label>To</label> <input type="date" name="datec"> <input type="hidden" name="searc" value="<?php echo $looking;?>"><input type="submit" name="checkz" value="Search">
</form>
</div>
<div class="table_contain">
<table class="batles_pro">
<tr>
<th colspan="6" >General consumption view</th>
</tr>
<tr>
<th colspan="6">view</th>
</tr>
<tr>
<td colspan="6">
<strong>Production cost</strong>
<table class="batles_pro">
<tr>
<th >Date</th>
<th >Product</th>
<th >Charge For</th>
<th >Quantity</th>
<th >Per each</th>
<th >Total</th>
</tr>
<?php  while($row = $view_product_cost_monthlyconsmpz->fetch_assoc()) { ?>
<tr>
<td><?php echo $row['dates']; $datess=$row['dates']; ?></td>
<td><?php echo $row['product'];  ?></td>
<td><?php echo $row['type_of_charge'];  ?></td>
<td><?php echo $row['quantity'];?></td>
<td><?php echo $row['per_each'];?></td>
<td><?php echo $row['total']; array_push($totalcostmonthconsump, $row['total']); ?></td>     
</tr>
<?php } ?>
<tr>
<td></td>
<td></td>
<td>Total</td>
<?php 
$totalmonthlyprocost=array_sum($totalcostmonthconsump); ?>
<td><strong><?php echo ($totalmonthlyprocost)." Tsh "; ?></strong></td>
</tr>
</table>
<strong>Material procurement</strong>
<table style="width: 100%;">
<tr>                  <th >dates</th>
<th >Material Name</th>
<th >Quantity</th>
<th >Price per each</th>
<th >Total</th>
</tr>
<?php  while($row = $view_material_procure_monthlyconsupz->fetch_assoc()) { ?>
<tr>
<td><?php echo $row['dates']; ?></td>
<td><?php echo $row['material_type']; ?></td>
<td><?php echo $row['quantity']; ?></td>
<td><?php echo $row['price_per_each'];?></td>
<td><?php echo $row['total'];array_push($total_monthlycons, $row['total']);?></td>
</tr>
<?php } ?>
<tr>
<td><strong>Subtotal</strong></td>
<?php $totalmonthlymaterial=array_sum($total_monthlycons);?>
<td style="text-align:center;" colspan="2"><strong><?php echo($totalmonthlymaterial)." Tsh" ?></strong></td>
</tr>
</table>
</td>
</tr>
<tr>
<td colspan="3">
<strong>Service site</strong>
<table class="batles_pro">
<tr>                  
<th >Dates</th>
<th >Description</th>
<th >Type of service</th>
<th >Total service</th>
<th >Price per each</th>
<th >Total</th>
</tr>
<?php  while($row =$siteview_service_monthlyz->fetch_assoc()) { ?>
<tr>
<td><?php echo $row['dates']; ?></td>
<td><?php echo $row['description']; ?></td>
<td><?php echo $row['type_of_service'];?></td>
<td><?php echo $row['total_service'];?></td>
<td><?php echo $row['price_per_each'];?></td>
<td><?php echo $row['total'];array_push($total_monthlyconssiteservc, $row['total']);?></td>
</tr>
<?php } ?>
<tr>
<td><strong>Subtotal</strong></td>
<?php $totalmonthlysiteservc=array_sum($total_monthlyconssiteservc);?>
<td style="text-align:center;" colspan="2"><strong><?php echo($totalmonthlysiteservc)." Tsh" ?></strong></td>
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
<?php  while($row =$siteview_fuel_monthlyconsumpz->fetch_assoc()) { ?>
<tr>
<td><?php echo $row['dates']; ?></td>
<td><?php echo $row['description']; ?></td>
<td><?php echo $row['quantity'];?></td>
<td><?php echo $row['price_per_each'];?></td>
<td><?php echo $row['total']; array_push($total_monthlyconssitefuel, $row['total']);?></td>
</tr>
<?php } ?>
<tr>
<td><strong>Subtotal</strong></td>
<?php $totalmonthlysitefuel=array_sum($total_monthlyconssitefuel);?>
<td style="text-align:center;" colspan="2"><strong><?php echo($totalmonthlysitefuel)." Tsh" ?></strong></td>
</tr>
</table>
<strong>Other site cost</strong>
<table class="batles_pro">
<tr>                  <th >dates</th>
<th >Pay for</th>
<th >Amount</th>
</tr>
<?php  while($row =$siteview_pay_monthlyconsumpz->fetch_assoc()) { ?>
<tr>
<td><?php echo $row['dates']; ?></td>
<td><?php echo $row['pay_for'];?></td>
<td><?php echo $row['amount'];array_push($total_monthlyconssitepay, $row['amount']); ?></td>
</tr>
<?php } ?>
<tr>
<td><strong>Subtotal</strong></td>
<?php $totalmonthlysitepay=array_sum($total_monthlyconssitepay);?>
<td style="text-align:center;" colspan="2"><strong><?php echo($totalmonthlysitepay)." Tsh" ?></strong></td>
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
<?php  while($row =$truckview_fuel_monthlyconsumpz->fetch_assoc()) { ?>
<tr>
<td><?php echo $row['dates']; ?></td>
<td><?php echo $row['truck_name']; ?></td>
<td><?php echo $row['liters'];?></td>
<td><?php echo $row['price_per_liter'];?></td>
<td><?php echo $row['total']; array_push($total_monthlyconsfuel, $row['total']);?></td>
</tr>
<?php } ?>
<td><strong>Subtotal</strong></td>
<?php $totalmonthlyfuel=array_sum($total_monthlyconsfuel);?>
<td style="text-align:center;" colspan="2"><strong><?php echo($totalmonthlyfuel)." Tsh" ?></strong></td>
</tr>
</table>
<strong>Truck service</strong>
<table class="batles_pro">
<tr>                  
<th >dates</th>
<th >Truck Name</th>
<th >Type of service</th>
<th >Total service</th>
<th >Price per each</th>
<th >Total</th>
</tr>
<?php  while($row =$truckview_service_monthlyconsumpz->fetch_assoc()) { ?>
<tr>
<td><?php echo $row['dates']; ?></td>
<td><?php echo $row['truck_name']; ?></td>
<td><?php echo $row['type_of_service']; ?></td>
<td><?php echo $row['total_service'];?></td>                      
<td><?php echo $row['price_per_each'];?></td>                      
<td><?php echo $row['total']; array_push($total_monthlyconsservc, $row['total']);?></td>
</tr>
<?php } ?>
<tr>
<td><strong>Subtotal</strong></td>
<?php $totalmonthlyservc=array_sum($total_monthlyconsservc);?>
<td style="text-align:center;" colspan="2"><strong><?php echo($totalmonthlyservc)." Tsh" ?></strong></td>
</tr>
</table>
<strong>Truck payments</strong>
<table class="batles_pro">
<tr>                  
<th >dates</th>
<th >Truck Name</th>
<th >Amount</th>
</tr>
<?php  while($row =$truckview_pay_monthlyconsumpz->fetch_assoc()) { ?>
<tr>
<td><?php echo $row['dates']; ?></td>
<td><?php echo $row['truck_name']; ?></td>
<td><?php echo $row['amount'];array_push($total_monthlyconspay, $row['amount']);?></td>
</tr>
<?php } ?>
<tr>
<td><strong>Subtotal</strong></td>
<?php $totalmonthlypays=array_sum($total_monthlyconspay);?>
<td style="text-align:center;" colspan="2"><strong><?php echo($totalmonthlypays)." Tsh" ?></strong></td>
</tr>
</table>
</td>
</tr>
<tr><td><strong>Total</strong></td>
<td colspan="5"><strong><?php $sumallmonthly=$totalmonthlymaterial+$totalmonthlysitefuel+$totalmonthlysitepay+$totalmonthlyfuel+$totalmonthlyservc+$totalmonthlypays+$totalmonthlyprocost+$totalmonthlysiteservc; echo $sumallmonthly."Tsh";?></strong></td>
</tr>
</table>
</div>
</div>
<?php include '../forter.php';?>