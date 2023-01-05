<?php 
include '../header.php';
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


 //pavement 




    //  var percentpevemnt = document.getElementById('percentpevemnt');
    //  var abovdaypavement = document.getElementById('abovdaypavement');
    //  var percentspv = document.getElementById('percentspv');
    //  var percentpevemntweekly = document.getElementById('percentpevemntweekly');
    //  var abovweekpavement = document.getElementById('abovweekpavement');
    //  var percentspvweek = document.getElementById('percentspvweek');
    //  var abovmonthpavement = document.getElementById('abovmonthpavement');
    //  var percentpevemntmonthly = document.getElementById('percentpevemntmonthly');
    //  var percentspvmonth = document.getElementById('percentspvmonth');
    //  var percentpevnt=<?php //echo json_encode($percentpevnt, JSON_HEX_TAG);?>;
    //  var totalpavementpercent=<?php //echo json_encode($totalpavementpercent, JSON_HEX_TAG);?>;
    //  var totalpavementpercentmonthly=<?php //echo json_encode($totalpavementpercentmonthly, JSON_HEX_TAG);?>;
    //  var pavedaily;
    //  var paveweekly;
    //  var pavemonth;
    function stat(){

    //     if (totalpavementpercentmonthly>100) {
    //         pavemonth=100;
    //         percentpevemntmonthly.style.width=pavemonth+"%";
    //         percentpevemntmonthly.style.height="100%";
    //         percentpevemntmonthly.style.background="#077f8c";
    //         abovmonthpavement.style.display="block";
    //         percentspvmonth.innerHTML=pavemonth+"%";

    //     }else{
    //         pavemonth=totalpavementpercentmonthly;
    //         percentpevemntmonthly.style.width=pavemonth+"%";
    //         percentpevemntmonthly.style.height="100%";
    //         percentpevemntmonthly.style.background="#077f8c";
    //         percentspvmonth.innerHTML=pavemonth+"%";
    //     }


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

        // if (percentpevnt > 100) {
        //     pavedaily=100;
        //     percentpevemnt.style.width=pavedaily+"%";
        //     percentpevemnt.style.height="100%";
        //     percentpevemnt.style.background="#912626";
        //     abovdaypavement.style.display="block";
        //     percentspv.innerHTML=pavedaily+"%";


        // }else{
        //     pavedaily=percentpevnt;
        //     percentpevemnt.style.width=pavedaily+"%";
        //     percentpevemnt.style.height="100%";
        //     percentpevemnt.style.background="#912626";
        //     percentspv.innerHTML=pavedaily+"%";
        // }

        // if (totalpavementpercent > 100) {
        //     paveweekly=100;
        //     percentpevemntweekly.style.width=paveweekly+"%";
        //     percentpevemntweekly.style.height="100%";
        //     percentpevemntweekly.style.background="#8c8607";
        //     abovweekpavement.style.display="block";
        //     percentspvweek.innerHTML=paveweekly+"%";
        // }else{
        //     paveweekly=totalpavementpercent;
        //     percentpevemntweekly.style.width=paveweekly+"%";
        //     percentpevemntweekly.style.height="100%";
        //     percentpevemntweekly.style.background="#8c8607";
        //     percentspvweek.innerHTML=paveweekly+"%";
        // }


  

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
