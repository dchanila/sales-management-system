<?php 
include '../header.php';
?>
<div class="contents" id="contents">
<h6 style="padding: 6px;">Truck</h6>
<div class="report_option">
	<a href="../truck_view_daily_root?tname=<?php echo $truckname; ?>" class="report_choose">
		<span><i class="fa fa-sun-o" aria-hidden="true"></i></span>Daily Roots <?php echo $truckname ;?>
	</a>
	<a href="../truck_view_weekly_root?tname=<?php echo $truckname; ?>" class="report_choose">
		<span><i class="fa fa-clock-o" aria-hidden="true"></i></span> WeeklyRoots <?php echo  $truckname;?>
	</a>
	<a href="../truck_view_monthly_root?tname=<?php echo $truckname; ?>" class="report_choose">
		<span><i class="fa fa-calendar" aria-hidden="true"></i></span>Monthly Roots <?php echo $truckname ;?>
	</a>
	
	
</div>


</div>
<?php include '../forter.php';?>