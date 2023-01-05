<?php 
include '../header.php';
if($view_product->num_rows > 0){

 }
 if($view_productweeks->num_rows > 0){

 }
 if($view_productmonths ->num_rows > 0){

 }
?>
<div class="contents" id="contents">
<h6 style="padding: 6px;">Report</h6>
<div class="report_option">
	<?php  while($row = $view_product->fetch_assoc()) { ?>
	<a href="../report_dail?product=<?php  echo $row['product_name']; ?>" class="report_choose">
		<span><i class="fa fa-sun-o" aria-hidden="true"></i></span> <?php  echo $row['product_name']; ?> daily
	</a>
	<?php } ?>
	<?php  while($rows =  $view_productweeks->fetch_assoc()) { ?>
	<a href="../report_weekly?product=<?php  echo $rows['product_name']; ?>" class="report_choose">
		<span><i class="fa fa-clock-o" aria-hidden="true"></i></span><?php  echo $rows['product_name']; ?> weekly
	</a>
    <?php } ?>

    <?php  while($rowss = $view_productmonths->fetch_assoc()) { ?>
	<a href="../report_monthly?product=<?php  echo $rowss['product_name']; ?>" class="report_choose">
		<span><i class="fa fa-calendar" aria-hidden="true"></i></span><?php  echo $rowss['product_name']; ?> monthly
	</a>
	  <?php } ?>
</div>


</div>
<?php include '../forter.php';?>