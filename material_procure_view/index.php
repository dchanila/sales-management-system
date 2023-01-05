<?php 
include '../header.php';
?>
<div class="contents" id="contents">
<h6 style="padding: 6px;"><?php echo $materialname." " ?> procurement </h6>
<div class="report_option">
	<a href="../material_procure_daily?mname=<?php echo $materialname ?>" class="report_choose">
		<span><i class="fa fa-sun-o" aria-hidden="true"></i></span><?php echo $materialname ?> daily report
	</a>
	<a href="../material_procure_weekly?mname=<?php echo $materialname ?>" class="report_choose">
		<span><i class="fa fa-clock-o" aria-hidden="true"></i></span><?php echo $materialname ?> weekly report
	</a>

	<a href="../material_procure_monthly?mname=<?php echo $materialname ?>" class="report_choose">
		<span><i class="fa fa-calendar" aria-hidden="true"></i></span><?php echo $materialname ?> monthly report
	</a>
	
</div>


</div>
<?php include '../forter.php';?>