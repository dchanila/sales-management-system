<?php 
include '../header.php';
$dailysold=array();
$dailycash=array();
$dailyowe=array();
$dailysalez=array();

$weeklysold=array();
$weeklycash=array();
$weeklyowe=array();
$weeklysalez=array();

$monthlysold=array();
$monthlysalez=array();
$monthlycash=array();
$monthlyowe=array();

$dailytotalsold='';
$dailytotalcash='';
$dailytotalowe='';
$dailytotalsalez='';

$weeklytotalsold='';
$weeklytotalsalez='';
$weeklytotalcash='';
$weeklytotalowe='';

$monthlytotalsold='';
$monthlytotalsalez='';
$monthlytotalcash='';
$monthlytotalowe='';
if($view_dail_reportsales ->num_rows > 0){
while($row = $view_dail_reportsales->fetch_assoc()) {
array_push($dailysold,$row['sold']);
array_push($dailysalez,$row['subtotal_amount']);
array_push($dailycash,$row['amount_paid']);
array_push($dailyowe,$row['remaining']);
}
}
$dailytotalsold=array_sum($dailysold);
$dailytotalsalez=array_sum($dailysalez);
$dailytotalcash=array_sum($dailycash);
$dailytotalowe=array_sum($dailyowe);
if($view_weekly_reportsales  ->num_rows > 0){
while($row = $view_weekly_reportsales->fetch_assoc()) { 
array_push($weeklysold,$row['sold']);
array_push($weeklysalez,$row['subtotal_amount']);
array_push($weeklycash,$row['amount_paid']);
array_push($weeklyowe,$row['remaining']);
}
}
$weeklytotalsold=array_sum($weeklysold);
$weeklytotalsalez=array_sum($weeklysalez);
$weeklytotalcash=array_sum($weeklycash);
$weeklytotalowe=array_sum($weeklyowe);
if($view_monthly_reportsalesdashboard  ->num_rows > 0){
while($row = $view_monthly_reportsalesdashboard->fetch_assoc()) {
array_push($monthlysold,$row['sold']);
array_push($monthlysalez,$row['subtotal_amount']);
array_push($monthlycash,$row['amount_paid']);
array_push($monthlyowe,$row['remaining']);
}
}
$monthlytotalsold=array_sum($monthlysold);
$monthlytotalsalez=array_sum($monthlysalez);
$monthlytotalcash=array_sum($monthlycash);
$monthlytotalowe=array_sum($monthlyowe);
?>
<div class="contents" id="contents">
<div class="dashcounter">
<h6 style="padding: 6px;">Dashboard</h6>
<?php if(isset( $_SESSION['success'])):?>
<h6 class="succces_log">
<?php echo $_SESSION['success'];
unset($_SESSION['success']);
?></h6>
<?php endif?>
<?php if(isset( $_SESSION["username"])):?>
<h6 class="session_in"><strong><?php echo $_SESSION['username'];?></strong> >Dashboard </h6>
<?php endif?> 
<!--dail counter!-->
<div class="counter">
<div class="right">
<div class="right_h"><strong><?php echo $product; ?> produced</strong></div>
<div class="right_p">
<div class="right_pp">
<p>Open with</p><p><?php echo $open_withblocksdaily;  ?></p>
</div>
<div class="right_pp" >
<p>produced</p><p><?php echo $totalactblokz;  ?></p>
</div>
</div>
<div class="right_total"><strong><?php echo $dailyblockshow;?></strong> </div>
</div>
<div class="left">
<div class="icons">
<i class="fa fa-cube" aria-hidden="true" ></i>
</div>
</div>
<div class="bottoms">
<div class="bottoms_bar">
<div  id="percentblock"></div>
</div>
<div class="bottoms_txt">
<div class="bottoms_txt_left">Expectation daily<div class="abov" id="abovdyblock"><i class="fa fa-plus" aria-hidden="true"></i><strong>1</strong></div></div>
<div class="bottoms_txt_right" id="percents">
<!-- percent daily -->
</div>
</div>
</div>
</div>
<!--dail counter end!-->
<!--week counter !-->
<div class="counter">
<div class="right">
<div class="right_h"><strong><?php echo $product; ?> produced</strong></div>
<div class="right_p">
<div class="right_pp">
<p>Open with</p><p><?php echo $open_withblocksweekly; ?></p>
</div>
<div class="right_pp" >
<p>produced</p><p><?php echo $totalactblokweekly; ?></p>
</div>
</div>
<div class="right_total"><strong><?php echo $weekblockshow; ?></strong> </div>
</div>
<div class="left">
<div class="icons weeks">
<i class="fa fa-cube" aria-hidden="true" ></i>
</div>
</div>
<div class="bottoms">
<div class="bottoms_bar">
<div  id="blockweekly"></div>
</div>
<div class="bottoms_txt">
<div class="bottoms_txt_left">Expectation weekly<div class="abov" id="abovwkblock"><i class="fa fa-plus" aria-hidden="true"></i><strong>1</strong></div></div>
<div class="bottoms_txt_right" id="percentswkblock"><!-- percent weekly --></div>
</div>
</div>
</div>
<!--week counter end!-->
<!--month counter!-->
<div class="counter">
<div class="right">
<div class="right_h"><strong><?php echo $product; ?> produced</strong></div>
<div class="right_p">
<div class="right_pp">
<p>Open with</p><p><?php echo $open_withblocksmonth; ?></p>
</div>
<div class="right_pp" >
<p>produced</p><p><?php echo $totalactblokmonthly;?></p>
</div>
</div>
<div class="right_total"><strong><?php echo  $monthblockshow; ?></strong> </div>
</div>
<div class="left">
<div class="icons_month">
<i class="fa fa-cube" aria-hidden="true" ></i>
</div>
</div>
<div class="bottoms">
<div class="bottoms_bar">
<div  id="blockmonth"></div>
</div>
<div class="bottoms_txt">
<div class="bottoms_txt_left">Expectation monthly<div class="abov" id="abovmthblock"><i class="fa fa-plus" aria-hidden="true"></i><strong>1</strong></div></div>
<div class="bottoms_txt_right" id="percentsmthblock"><!-- percent month --></div>
</div>
</div>
</div>
<!--month counter end!-->
<!--sales!-->
<div class="counter" >
<table class="counttable">
<tr >
<th><?php echo $product; ?></th>
<th>Sold</th>
<th>Total sale</th>
<th>Cash</th>
<th>Owe</th>
</tr>
<tr style="background: #6012a1;">
<td><strong>Today</strong></td>
<td><?php echo $dailytotalsold; ?></td>
<td><?php echo $dailytotalsalez; ?></td>
<td><?php echo $dailytotalcash; ?></td>
<td><?php echo $dailytotalowe; ?></td>
</tr>
<tr >
<td><strong>Week</strong></td>
<td><?php echo $weeklytotalsold; ?></td>
<td><?php echo $weeklytotalsalez; ?></td>
<td><?php echo $weeklytotalcash; ?></td>
<td><?php echo $weeklytotalowe; ?></td>
</tr>
<tr style="background: #7a093c;">
<td><strong>Month</strong></td>
<td><?php echo $monthlytotalsold; ?></td>
<td><?php echo $monthlytotalsalez; ?></td>
<td><?php echo $monthlytotalcash; ?></td>
<td><?php echo $monthlytotalowe; ?></td>
</tr>
</table>
</div>
<!--sales end!-->
</div>
<div class="graphss_container" >
<!-- Area Chart -->
<div class="charts_view">
<div style="margin: 5px; position: absolute;" >
<h6 class="m-0 font-weight-bold text-primary">Sales Chart weekly</h6>
</div>
<div class="card-body" >
<div class="chart-area" style="height: 55vh; width: 100%;">
<canvas id="myAreaChart" style="height: 100%;"></canvas>
</div>
</div>
</div>
<!-- Bar Chart -->
<div class="charts_view" >
<div style="margin: 5px; position: absolute; ">
<h6 class="m-0 font-weight-bold text-primary">Sales Chart monthly</h6>
</div>
<div class="card-body">
<div class="chart-bar" style="height: 55vh;width: 100%; ">
<canvas id="myBarChart" style="height: 100%; width: 100%;"></canvas>
</div>
</div>
</div>
</div>
</div>
<script type="text/javascript">
var percentblock = document.getElementById('percentblock');
var percents = document.getElementById('percents');
var percentswkblock = document.getElementById('percentswkblock');
var blockweekly = document.getElementById('blockweekly');
var abovwkblock = document.getElementById('abovwkblock');
var abovdyblock = document.getElementById('abovdyblock');
var percentsmthblock = document.getElementById('percentsmthblock');
var blockmonth = document.getElementById('blockmonth');
var abovmthblock = document.getElementById('abovmthblock');
var datass = <?php echo json_encode($percentblock, JSON_HEX_TAG); ?>;
var blockweeklpcent=<?php echo json_encode($totalblockspercent, JSON_HEX_TAG);?>;
var totalblockspercentmonthly=<?php echo json_encode($totalblockspercentmonthly, JSON_HEX_TAG);?>;
var datassdly;
var datawekly;
var datamonthly;
function stat(){
if (datass > 100) {
datassdly=100;
percentblock.style.width=datassdly+"%";
percentblock.style.height="100%";
percentblock.style.background="#6012a1";
abovdyblock.style.display="block";
percents.innerHTML=datassdly+"%";
}else{
datassdly=datass;
percentblock.style.width=datassdly+"%";
percentblock.style.height="100%";
percentblock.style.background="#6012a1";
percents.innerHTML=datassdly+"%";
}
if (blockweeklpcent>100) {
datawekly=100;
blockweekly.style.width=datawekly+"%";
blockweekly.style.height="100%";
blockweekly.style.background="#187d4f";
abovwkblock.style.display="block";
percentswkblock.innerHTML=datawekly+"%";
}else{
datawekly=blockweeklpcent;
blockweekly.style.width=datawekly+"%";
blockweekly.style.height="100%";
blockweekly.style.background="#187d4f";
percentswkblock.innerHTML=datawekly+"%";
}
if (totalblockspercentmonthly > 100) {
datamonthly=100;
blockmonth.style.width=datamonthly+"%";
blockmonth.style.height="100%";
blockmonth.style.background="#7a093c";
abovmthblock.style.display="block";
percentsmthblock.innerHTML=datamonthly+"%";
}else{
datamonthly=totalblockspercentmonthly;
blockmonth.style.width=datamonthly+"%";
blockmonth.style.height="100%";
blockmonth.style.background="#7a093c";
percentsmthblock.innerHTML=datamonthly+"%";
}
}
</script>
<script type="text/javascript">totalblockspercentmonthly
var amountweeklyblock=<?php echo json_encode($amountweeklyblock, JSON_HEX_TAG);?>;
// var amountweeklypavement=<?php //echo json_encode($amountweeklypavement, JSON_HEX_TAG);?>;
var datesweeklyblock=<?php echo json_encode($datesweeklyblock, JSON_HEX_TAG);?>;
console.log(datesweeklyblock);
console.log(datesweeklyblock);
</script>
<script type="text/javascript">
var datemonthblock=<?php echo json_encode($datesmnthlyblock,JSON_HEX_TAG);?>;
// var amountmonthlypavement=<?php// echo json_encode($amountmnthlypavement,JSON_HEX_TAG);?>;
var amountmonthblock=<?php echo json_encode($amountmnthlyblock,JSON_HEX_TAG);?>;
console.log(datemonthblock);
// console.log(amountmonthlypavement);
console.log(amountmonthblock);
</script>
<?php include '../forter.php';?>