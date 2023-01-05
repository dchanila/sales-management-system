<?php 
include '../header.php';
$blocks_productionsearchzs=$db->fetch(" SELECT * FROM $looking ORDER by dates DESC");
if($blocks_productionsearchzs->num_rows > 0){

}
?>
<div class="contents" id="contents">
<h6 style="padding: 6px;">Searching</h6>
<div class="looking">
<form action="../backend/client.php" method="post">
<input type="text" name="prodctz" placeholder="product"><input type="date" name="datez"> <label>To</label> <input type="date" name="datec"> <input type="hidden" name="searc" value="<?php echo $looking;?>"><input type="submit" name="checkz" value="Search">
</form>
</div>
<div class="table_contain">
<table class="batles_pro">
<tr>
<th >Day</th>
<th >Date</th>
<th >Times</th>
<th >Product</th>
<th >Exptd no; of bags used</th>
<th >Exptd no; of <?php echo $product; ?> produced</th>
<th >Act no; of bags used</th>
<th >Act no; of <?php echo $product; ?> produced</th>
<th >Difference</th>
<th >Reasons</th>
</tr>
<?php  while($row = $blocks_productionsearchzs ->fetch_assoc()) { ?>
<tr>
<td><?php echo $row['day']; $dys=$row['day']; ?></td>
<td><?php echo $row['dates']; $datess=$row['dates']; ?></td>
<td><?php echo $row['timez']; array_push($timess, $row['timez']); ?></td>
<td><?php echo $row['product']; ?></td>
<td><?php echo $row['expected_no_of_bags_used']; array_push($total_exp_bagsuse, $row['expected_no_of_bags_used']);?></td>
<td><?php echo $row['expected_no_of_blocks_produced']; array_push($total_exp_blokproduc, $row['expected_no_of_blocks_produced']); ?></td>
<td><?php echo $row['actual_no_of_bags_used'];array_push($total_actbagsused, $row['actual_no_of_bags_used']); ?></td>
<td><?php echo $row['actual_no_of_blocks_produced'];array_push($total_actblockproduc, $row['actual_no_of_blocks_produced']); ?></td>
<td><?php echo $row['difference'];array_push($Difference, $row['difference']); ?></td>
<td><span><i class="fa fa-eye" aria-hidden="true"></i></span><a href="../reason?view_reason=<?php echo $row['id']; ?>">view </a></td>
</tr>
<?php } ?>
<tr>
<td><strong></strong></td>
<td><strong></strong></td>
<td><strong></strong></td>
<td><strong></strong></td>
<?php 
$totaexpbagsuse=array_sum($total_exp_bagsuse); ?>
<td><strong><?php echo ($totaexpbagsuse)." "; ?>Bags</strong></td>
<?php 
$totalexpblokproduc=array_sum($total_exp_blokproduc); ?>
<td><strong><?php echo ($totalexpblokproduc)." ".$product; ?></strong></td>
<?php 
$totalactbaguse=array_sum($total_actbagsused); ?>
<td><strong><?php echo ($totalactbaguse)." "; ?>Bags</strong></td>
<?php 
$totalactblokproduc=array_sum($total_actblockproduc); ?>
<td><strong><?php echo ($totalactblokproduc)." ".$product; ?></strong></td>
<?php 
$totaldffer=array_sum($Difference); ?>
<td><strong><?php echo ($totaldffer)." ".$product; ?></strong></td>
<td colspan="2"><strong>Total</strong>
</td>
</tr>
</table>
</div>
</div>
<?php include '../forter.php';?>