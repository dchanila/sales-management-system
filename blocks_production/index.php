<?php include '../header.php';
if($blocks_production->num_rows > 0){

}
?>
<div class="contents" id="contents">
<h6 style="padding: 6px;">Blocks production</h6>
<div class="table_contain">
<table class="batles_pro">
<tr>
<th >Day</th>
<th >Date</th>
<th >Times</th>
<th >Exptd no; of bags used</th>
<th >Exptd no; of <?php echo $product; ?> produced</th>
<th >Act no; of bags used</th>
<th >Act no; of <?php echo $product; ?> produced</th>
<th >Difference</th>
<th >Reasons</th>
<th colspan="2">Action</th>
</tr>
<?php  while($row = $blocks_production->fetch_assoc()) { ?>
<tr>
<td><?php echo $row['day']; $dys=$row['day']; ?></td>
<td><?php echo $row['dates']; $datess=$row['dates']; ?></td>
<td><?php echo $row['timez']; array_push($timess, $row['timez']); ?></td>
<td><?php echo $row['expected_no_of_bags_used']; array_push($total_exp_bagsuse, $row['expected_no_of_bags_used']);?></td>
<td><?php echo $row['expected_no_of_blocks_produced']; array_push($total_exp_blokproduc, $row['expected_no_of_blocks_produced']); ?></td>
<td><?php echo $row['actual_no_of_bags_used'];array_push($total_actbagsused, $row['actual_no_of_bags_used']); ?></td>
<td><?php echo $row['actual_no_of_blocks_produced'];array_push($total_actblockproduc, $row['actual_no_of_blocks_produced']); ?></td>
<td><?php echo $row['difference'];array_push($Difference, $row['difference']); ?></td>
<td><span><i class="fa fa-eye" aria-hidden="true"></i></span><a href="../reason?view_reason=<?php echo $row['id']; ?>">view </a></td>
<td colspan="2"><a href="../blocks_production?delete_prodction=<?php echo $row['id']; ?>" class="btns_danger">Delete</a></td>
</tr>
<?php } ?>
<tr>
<td><strong><?php echo $dys;?></strong></td>
<td><strong><?php echo $datess;?></strong></td>
<?php 
$totarow=count($timess); ?>
<td><strong><?php echo ($totarow)." "; ?>Hrs</strong></td>
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
<form action="../backend/client.php" method="post" class="batles_pro_blocks" id="batles_pro_blocks">
<table class="batles_pro">
<tr>
<td><input type="text" name="Times"  placeholder="Time (10:00-11:00pm)" required><input type="hidden" name="product"  value="<?php echo $product; ?>" required><input type="hidden" name="availableproduct" value="<?php echo $totalproduct;  ?>"></td>
<td><input type="number" name="eNobags_used" placeholder="Expected no: of bags used" required></td>
<td><input type="number" name="eNoblocks_produces" placeholder="Expected no of blocks" required></td>
<td><input type="number" name="aNobags_uesd" placeholder="Actual no of bags" required></td>
<td><input type="number" name="aNoblocks_produces" placeholder="Actual no of blocks" required></td>
<td><textarea  placeholder="Reasons"  required name="reasons"></textarea></td>
<td><input type="submit" name="add_product" value="Add" class="btn_s" ></td>
</tr>
</table>
</form>
</div>
</div>
<div class="buton_add" id="buton_add" onclick="add_prodction()">
<div class="adds">+</div>
</div>
<div class="buton_close" id="buton_close" onclick="close_prodction()">
<div class="closes">x</div>
</div>
<?php include '../forter.php';?>