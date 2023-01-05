<?php 
include '../header.php';
?>
<div class="contents" id="contents">
<h6 style="padding: 6px;">Truck</h6>
<div class="report_option">
	<a href="../truck_view_daily_fuel?tname=<?php echo $truckname; ?>" class="report_choose">
		<span><i class="fa fa-sun-o" aria-hidden="true"></i></span>Daily Fuel <?php echo $truckname ;?>
	</a>
	<a href="../truck_view_weekly_fuel?tname=<?php echo $truckname; ?>" class="report_choose">
		<span><i class="fa fa-clock-o" aria-hidden="true"></i></span> Weekly Fuel <?php echo  $truckname;?>
	</a>
	<a href="../truck_view_monthly_fuel?tname=<?php echo $truckname; ?>" class="report_choose">
		<span><i class="fa fa-calendar" aria-hidden="true"></i></span>Monthly Fuel <?php echo $truckname ;?>
	</a>
	
	
</div>


</div>
<?php include '../forter.php';?>