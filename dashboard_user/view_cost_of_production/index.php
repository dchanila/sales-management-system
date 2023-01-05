<?php 
include '../header.php';
?>
<div class="contents" id="contents">
<h6 style="padding: 6px;"><?php echo $product." ";?>Production cost view</h6>
<div class="report_option">
	<a href="../Product_cost_daily?product=<?php echo $product; ?>" class="report_choose">
		<span><i class="fa fa-sun-o" aria-hidden="true"></i></span><?php echo $product." ";?> Production daily
	</a>
	<a href="../Product_cost_weekly?product=<?php echo $product; ?>" class="report_choose">
		<span><i class="fa fa-clock-o" aria-hidden="true"></i></span><?php echo $product." ";?> Production cost weekly
	</a>
	<a href="../Product_cost_monthly?product=<?php echo $product; ?>" class="report_choose">
		<i class="fa fa-calendar" aria-hidden="true"></i><?php echo $product." ";?> Production monthly
	</a>
	
	
</div>


</div>
<?php include '../forter.php';?>