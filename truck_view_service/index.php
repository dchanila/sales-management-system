<?php 
include '../header.php';
?>
<div class="contents" id="contents">
<h6 style="padding: 6px;">Truck Service view </h6>
<div class="report_option">
	<a href="../truck_view_daily_service?tname=<?php echo $truckname; ?>" class="report_choose">
		<span><i class="fa fa-sun-o" aria-hidden="true"></i></span>Daily Service <?php echo $truckname ;?>
	</a>
	<a href="../truck_view_weekly_service?tname=<?php echo $truckname; ?>" class="report_choose">
		<span><i class="fa fa-clock-o" aria-hidden="true"></i></span> Weekly Service <?php echo  $truckname;?>
	</a>
	<a href="../truck_view_monthly_service?tname=<?php echo $truckname; ?>" class="report_choose">
		<span><i class="fa fa-calendar" aria-hidden="true"></i></span>Monthly Service <?php echo $truckname ;?>
	</a>
	
	
</div>


</div>
<?php include '../forter.php';?>