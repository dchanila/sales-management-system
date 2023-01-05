    <?php
    include_once("db_adaptor.php");
    session_start();
    $loginerro="";
    $username_logs="";
    $error= array();
    $monday=date("Y-m-d",strtotime('monday this week'));
    $sunday=date("Y-m-d",strtotime('sunday this week'));
    $mondaylastweek=date("Y-m-d",strtotime('monday last week'));
    $sundaylastweek=date("Y-m-d",strtotime('sunday last week'));
    $startingdate=date("0000-00-00");
    $firstday=date("Y-m-d",strtotime('first day of this month'));;
    $lastday=date("Y-m-d",strtotime('last day of this month'));
    $firstdaylastmonth=date("Y-m-d",strtotime('first day of last month'));;
    $lastdaylastmonth=date("Y-m-d",strtotime('last day of last month'));
$user_names="";
     if(isset($_GET['user_names'])){
    $user_names = $_GET['user_names'];
    
      }
 

    //////////////////////////////////////////for member regster and log in
    $db = new DB_Interface_Adapter();

    if(isset($_POST['submit'])){

        $firstname=$_POST['fname'];
        $lastname=$_POST['lname'];
        $username=$_POST['uname'];
        $position=$_POST['position'];
        $gender=$_POST['gender'];
        $password=$_POST['pwd'];
        if(empty($firstname)){
         array_push($error, "First name is required");
     }
     if(empty($lastname)){
         array_push($error, "Last name is required");
     }
     if(empty($username)){
         array_push($error, "User name is required");
     }
     if(empty($position)){
         array_push($error, "Position is required");
     }
     if(empty($gender)){
         array_push($error, "Gender is required");
     }
     if(empty($password)){
         array_push($error, "Password is required");
     }

     if(!preg_match("/^[a-zA-Z]*$/", $firstname)){
      array_push($error, "First name is no valid");
  }
  if(!preg_match("/^[a-zA-Z]*$/", $lastname)){
      array_push($error, "Last name is no valid");
  }
  if(count($error) == 0){
    $sql="SELECT * FROM userz WHERE username='$username'";
    $result=$db->fetch($sql);

    if(mysqli_num_rows($result) > 0){
     array_push($error, "Username is taken");
     header("Location: ../register");

 }else{    

   $sql= "INSERT INTO userz (first_name,last_name,username,position,gender,password) VALUES('$firstname','$lastname','$username','$position','$gender','$password');";
   $username_logs=$_SESSION['username'];
   $sqls= "INSERT INTO logs (username,activity) VALUES('$username_logs','Add member name is $firstname , last na is $lastname and user name is $username ');";
   $db->insert($sql);
   $db->insert($sqls);
   header("Location: ../member_view");
   exit();
} }}



    //login users
if(isset($_POST['login'])){
    $username=$_POST['uname'];
    $password=$_POST['pwd'];
    if(empty($username)){
      array_push($error, "Username is required");
  }
  if(empty($password)){
      array_push($error, "Password is required");}
      if(count($error) == 0){
          $sql="SELECT * FROM userz WHERE username='$username' AND password='$password'";
          $result=$db->fetch($sql);

          if(mysqli_num_rows($result) ==1){
            while($row = $result->fetch_assoc()) {
            $position= $row['position'];    
        }
            if ($position=="manager") {
              $_SESSION['username']=$username;
           $username_logs=$username;
           $_SESSION['success']='now you are loged in';
           $sqls= "INSERT INTO logs (username,activity) VALUES('$username_logs','loged in');";
           $db->insert($sqls);
           $sqllogs="UPDATE userz SET state ='Online' WHERE username = '$username_logs' ";
           $db->insert($sqllogs);
           header("Location: ../dashboard_option");
           exit();
            }else{
                $_SESSION['username']=$username;
           $username_logs=$username;
           $_SESSION['success']='now you are loged in';
           $sqls= "INSERT INTO logs (username,activity) VALUES('$username_logs','loged in');";
           $db->insert($sqls);
           $sqllogs="UPDATE userz SET state ='Online' WHERE username = '$username_logs' ";
           $db->insert($sqllogs);
           header("Location: ../dashboard_user/dashbord");
           exit();
            }
           
       }else{
           $loginerro="<div class=\"alert alert-danger\" role=\"alert\" style=\"text-align:center\">"." wrong email or password"." </div>";
           header("Location: ../index.php");
           exit();
       }}}

         //logout

       if (isset($_GET['logout'])) {
        $username_logs=$_SESSION['username'];
        $sqls= "INSERT INTO logs (username,activity) VALUES('$username_logs','loged out');";
        $db->insert($sqls);
        $sqllogs="UPDATE userz SET   state ='Offline' WHERE username = '$username_logs' ";
        $db->insert($sqllogs);
        session_destroy();
        unset($_SESSION['username']);
        header("Location: ../../index.php");
        exit();

    }
      //view member
    $member_views = $db->fetch(" SELECT * FROM userz WHERE username='$user_names'");
     //view members logs


    if(isset($_GET['view_logs'])){
      $userlogs = $_GET['view_logs'];
      $sql  ="SELECT * FROM logs WHERE username= '$userlogs' ";
      $rec= $db->fetch($sql); 
  }

    //edit user detail

  $id="";
  $firstname="";
  $lastname="";
  $username="";
  $position="";
  $gender="";
  $password="";
  if(isset($_GET['edit_member'])){
      $id = $_GET['edit_member'];
      $sql  ="SELECT * FROM userz WHERE id= $id ";
      $rec= $db->fetch($sql);
      $record = mysqli_fetch_array( $rec);
      $id=$record['id'];
      $firstname =  $record['first_name'];
      $lastname =$record['last_name'];
      $username=$record['username'];
      $position=$record['position'];
      $gender=$record['gender'];
      $password=$record['password'];

  }

  if (isset($_POST['update'])) {
   $id=$_POST['id'];
   $firstname=$_POST['fname'];
   $lastname=$_POST['lname'];
   $username=$_POST['uname'];
   $position=$_POST['position'];
   $gender=$_POST['gender'];
   $password=$_POST['pwd'];

   $sql="UPDATE userz SET   first_name ='$firstname', last_name ='$lastname', username ='$username', position ='$position', gender ='$gender', password ='$password' WHERE id = $id ";
   $db->insert($sql);
   header("Location: ../member_view?user_names=$username");
   exit();
}

    //delete member

if(isset($_GET['delete'])){
    $id = $_GET['delete'];
    $sql="DELETE FROM userz WHERE id=$id";
    $db->insert($sql);
    header("Location: ../member_view");
    exit();
}
//get product
$product="";
$totalproduct="";
if(isset($_GET['product'])){
      $product = $_GET['product'];
      $sql  ="SELECT * FROM product WHERE product_name= '$product'";
      $rec= $db->fetch($sql);
      $record = mysqli_fetch_array($rec);
      $totalproduct=$record['total'];
  }
 //add product
  
  if(isset($_POST['addproduct'])){
    $product=$_POST['product'];
    $price=$_POST['price'];
        $sql= "INSERT INTO product(product_name,price) VALUES('$product','$price');";
        
        $fullnames= $username_logs;
        $sqls= "INSERT INTO logs (username,activity) VALUES('$username_logs','add daily $product product');";
        $db->insert($sql);
        $db->insert($sqls);
        header("Location: ../production");
        exit(); 
}
//view product 
   $view_product = $db->fetch(" SELECT * FROM product");
   $view_productweeks = $db->fetch(" SELECT * FROM product");
   $view_productmonths = $db->fetch(" SELECT * FROM product");

// add production cost
if(isset($_POST['add_cost'])){
    $dates=date("Y-m-d");
    $product=$_POST['product'];
    $type_of_charge=$_POST['type_of_charge'];
    $quantity=$_POST['quantity'];
    $per_each=$_POST['per_each'];
    $totalz=$quantity*$per_each;
    
        $sql= "INSERT INTO production_cost(dates,product,type_of_charge,quantity,per_each,total) VALUES('$dates','$product','$type_of_charge','$quantity','$per_each','$totalz');";
        
        $fullnames= $username_logs;
        $sqls= "INSERT INTO logs (username,activity) VALUES('$username_logs','add daily $product production cost');";
        $db->insert($sql);
        $db->insert($sqls);
        header("Location: ../add_cost_of_production?product=$product");
        exit(); 
}
//view product cost
$dates=date("Y-m-d");
$totalcost=array(); 
$totalproctioncost="";
   $view_product_cost = $db->fetch(" SELECT * FROM production_cost WHERE dates='$dates' and product='$product'");
   $view_product_costdaily = $db->fetch(" SELECT  dates,product,sum(quantity) as quantity,sum(total) as total FROM production_cost WHERE dates='$dates' GROUP by product");
   //weekly
   $view_product_cost_weekly = $db->fetch(" SELECT * FROM production_cost WHERE dates BETWEEN '$monday' and '$sunday' and product='$product'");
    $view_product_cost_weeklyconsmp = $db->fetch(" SELECT dates,product,sum(quantity) as quantity,sum(total) as total FROM production_cost WHERE dates BETWEEN '$monday' and '$sunday' GROUP by product");
   // monthly
   $view_product_cost_monthly = $db->fetch(" SELECT * FROM production_cost WHERE dates BETWEEN '$firstday' and '$lastday' and product='$product'");
   $view_product_cost_monthlyconsmp = $db->fetch(" SELECT dates,product,sum(quantity) as quantity,sum(total) as total FROM production_cost WHERE dates BETWEEN '$firstday' and '$lastday' GROUP by product");



 //add production
 $product_produceds="";
 $openwith="";
 $todayproductions=array();
if(isset($_POST['add_product'])){
    $days=date("l");
    $dates=date("Y-m-d");
    $Times=$_POST['Times'];
    $product=$_POST['product'];
    $availableproduct=$_POST['availableproduct'];
    $eNobags_used=$_POST['eNobags_used'];
    $eNoblocks_produces=$_POST['eNoblocks_produces'];
    $aNobags_uesd=$_POST['aNobags_uesd'];
    $aNoblocks_produces=$_POST['aNoblocks_produces'];
    $Reasons=$_POST['reasons'];
    $difference=$aNoblocks_produces-$eNoblocks_produces;
    $username_logs=$_SESSION['username'];

        $sql= "INSERT INTO production(day,dates,timez,product,expected_no_of_bags_used,expected_no_of_blocks_produced,actual_no_of_bags_used,actual_no_of_blocks_produced,difference,reasons,usersname) VALUES('$days','$dates','$Times','$product','$eNobags_used','$eNoblocks_produces','$aNobags_uesd','$aNoblocks_produces','$difference','$Reasons','$username_logs');";
        $db->insert($sql);
        $product_produceds = $db->fetch(" SELECT * FROM production WHERE dates='$dates' and product='$product'");
     if($product_produceds->num_rows > 0){
        while($row = $product_produceds->fetch_assoc()) {
            array_push($todayproductions, $row['actual_no_of_blocks_produced']);    
        }
     }

            $totaltodaysproduct=array_sum($todayproductions);
            $sumproduct=$aNoblocks_produces + $availableproduct;
            $openwith=$sumproduct-$totaltodaysproduct;
            $updateproduct="UPDATE product SET open_with='$openwith',produce='$totaltodaysproduct',total ='$sumproduct' WHERE product_name = '$product' ";
            $db->insert($updateproduct);

        $fullnames= $username_logs;
        $sqls= "INSERT INTO logs (username,activity) VALUES('$username_logs','add daily $product production');";  
        $db->insert($sqls);
        header("Location: ../blocks_production?product=$product");
        exit(); 
}

//view blocks production
$total_exp_bagsuse=array();
  $total_exp_blokproduc=array();
  $total_actbagsused=array();
  $total_actblockproduc=array();
  $Difference=array();
  $dys="";
  $timess=array();
  $datess="";
 $dates1=date("Y-m-d");
 $yesterday=date("Y-m-d",strtotime('yesterday'));
 $expblockproduction=array();
 $actblockproduction=array();
 $totalexpblok="";
 $totalactblokz="";
 $percentblock="";
 $blocks_production = $db->fetch(" SELECT * FROM production WHERE dates='$dates1' and product='$product'");
//view block for dashboard daily
 $blocks_productdashboard = $db->fetch(" SELECT * FROM production WHERE dates='$dates1' and product='$product'");
  if($blocks_productdashboard->num_rows > 0){
        }

        while($row = $blocks_productdashboard->fetch_assoc()) {
            array_push($expblockproduction, $row['expected_no_of_blocks_produced']);
            array_push($actblockproduction, $row['actual_no_of_blocks_produced']);    
        }

    $totalexpblok=array_sum($expblockproduction);
    $totalactblokz=array_sum($actblockproduction);
    if ($totalexpblok=='' or $totalactblokz=='' ) {
        $percentblock=0;
    }else{
    $percentblock= round(($totalactblokz/$totalexpblok)*100);
}

$open_withblocksdaily="";
    $blocks_productopenwithdaily = $db->fetch(" SELECT * FROM sales WHERE dates BETWEEN '$firstdaylastmonth' and '$yesterday' and product='$product' order by dates ASC");
  if($blocks_productopenwithdaily->num_rows > 0){
        }

        while($row = $blocks_productopenwithdaily->fetch_assoc()) {
             $open_withblocksdaily=$row['closed_with'];  
        }
        if ($open_withblocksdaily=='') {
            $open_withblocksdaily=0;
            $dailyblockshow=$totalactblokz+$open_withblocksdaily;
        }else{
            $dailyblockshow=$totalactblokz+$open_withblocksdaily;
        }
        

//view block for dashboard daily --end--
//view block for dashboard weekly --start--
$expblockproductionweekly=array();
$actblockproductionweekly=array();
$totalexpblokweekly="";
$totalactblokweekly="";
$totalblockspercent="";

 $blocks_productdashboardweekly = $db->fetch(" SELECT * FROM production WHERE dates BETWEEN '$monday' and '$sunday' and product='$product'");
  if($blocks_productdashboardweekly->num_rows > 0){
        }

        while($row = $blocks_productdashboardweekly->fetch_assoc()) {
            array_push($expblockproductionweekly, $row['expected_no_of_blocks_produced']);
            array_push($actblockproductionweekly, $row['actual_no_of_blocks_produced']);    
        }
    $totalexpblokweekly=array_sum($expblockproductionweekly);
    $totalactblokweekly=array_sum($actblockproductionweekly);
    if ($totalexpblokweekly=='' or $totalactblokweekly=='' ) {
        $totalblockspercent=0;
    }else{
   $totalblockspercent=round(($totalactblokweekly/$totalexpblokweekly)*100);
}
    
    $open_withblocksweekly="";
    $blocks_productopenwithweekly = $db->fetch(" SELECT * FROM sales WHERE dates BETWEEN '$firstdaylastmonth' and '$sundaylastweek' and product='$product' order by dates ASC");
  if($blocks_productopenwithweekly->num_rows > 0){
        }

        while($row = $blocks_productopenwithweekly->fetch_assoc()) {
             $open_withblocksweekly=$row['closed_with'];  
        }
        if($open_withblocksweekly ==''){
            $open_withblocksweekly=0;
            $weekblockshow=$totalactblokweekly+$open_withblocksweekly;
        }else{
            
            $weekblockshow=$totalactblokweekly+$open_withblocksweekly;

        }
        
    //view block for dashboard weekly --end--

    //view block for dashboard monthly --start--

$totalexpblokmonthly="";
$totalactblokmonthly="";
$totalblockspercentmonthly="";
$monthblockshow="";
$firstday=date("Y-m-d",strtotime('first day of this month'));;
$lastday=date("Y-m-d",strtotime('last day of this month'));
$firstdaylastmonth=date("Y-m-d",strtotime('first day of last month'));;
$lastdaylastmonth=date("Y-m-d",strtotime('last day of last month'));

 $blocks_productdashboardmonthly = $db->fetch(" SELECT sum(expected_no_of_blocks_produced) as expected_no_of_blocks_produced,SUM(actual_no_of_blocks_produced) as actual_no_of_blocks_produced FROM production WHERE dates BETWEEN '$firstday' and '$lastday' and product='$product'");
  if($blocks_productdashboardmonthly->num_rows > 0){
        }

        while($row = $blocks_productdashboardmonthly->fetch_assoc()) {
            $totalexpblokmonthly= $row['expected_no_of_blocks_produced'];
            $totalactblokmonthly= $row['actual_no_of_blocks_produced'];    
        }
    
    
    if ($totalexpblokmonthly=='' or $totalactblokmonthly=='' ) {
        $totalblockspercentmonthly=0;
        $totalactblokmonthly=0;
    }else{
   $totalblockspercentmonthly=round(($totalactblokmonthly/$totalexpblokmonthly)*100);
}
    

    $open_withblocksmonth="";
    $blocks_productopenwithmonth = $db->fetch(" SELECT * FROM sales WHERE dates BETWEEN '$firstdaylastmonth' and '$lastdaylastmonth' and product='$product' order by dates ASC");
  if($blocks_productopenwithmonth->num_rows > 0){
        }

        while($row = $blocks_productopenwithmonth->fetch_assoc()) {
             $open_withblocksmonth=$row['closed_with'];  
        }

        if ($open_withblocksmonth =='' ) {
            $open_withblocksmonth=0;
            $monthblockshow=$totalactblokmonthly+$open_withblocksmonth;
        }else{
            
            $monthblockshow=$totalactblokmonthly+$open_withblocksmonth;
        }
        
    //view block for dashboard monthlymonthly --end--



    //view pevement for dashboard daily ---start--

 
 $totalactpevnt="";
 $percentpevnt="";
 $exppevntproduction=array();
 $actpevntproduction=array();
 $totalexppevnt="";

    $pevement_productdashboard = $db->fetch(" SELECT * FROM production WHERE dates='$dates1' and product='pavement'");
  if($pevement_productdashboard->num_rows > 0){
        }

        while($row = $pevement_productdashboard->fetch_assoc()) {
            array_push($exppevntproduction, $row['expected_no_of_blocks_produced']);
            array_push($actpevntproduction, $row['actual_no_of_blocks_produced']);    
        }

    $totalexppevnt=array_sum($exppevntproduction);
    $totalactpevnt=array_sum($actpevntproduction);
    if ($totalexppevnt=='' or $totalactpevnt=='' ) {
       $percentpevnt=0;
    }else{
    $percentpevnt= round(($totalactpevnt/$totalexppevnt)*100);
}

$open_withpavementdaily="";
    $pavement_productopenwithdaily = $db->fetch(" SELECT * FROM sales WHERE dates BETWEEN '$firstdaylastmonth' and '$yesterday' and product='pavement' order by dates ASC");
  if($pavement_productopenwithdaily->num_rows > 0){
        }

        while($row = $pavement_productopenwithdaily->fetch_assoc()) {
             $open_withpavementdaily=$row['closed_with'];  
        }
        if ($open_withpavementdaily=='') {
            $open_withpavementdaily=0;
            $dailypavementshow=$totalactpevnt+$open_withpavementdaily;
        }else{
             $dailypavementshow=$totalactpevnt+$open_withpavementdaily;
        }
       
//view pevement for dashboard daily ---end--

//view pavement for dashboard weekly --start--
$exppavementproductionweekly=array();
$actpavementproductionweekly=array();
$totalexppavementweekly="";
$totalactpavementweekly="";
$totalpavementpercent="";

 $pavemnt_productdashboardweekly = $db->fetch(" SELECT * FROM production WHERE dates BETWEEN '$monday' and '$sunday' and product='pavement'");
  if($pavemnt_productdashboardweekly->num_rows > 0){
        }
        while($row = $pavemnt_productdashboardweekly->fetch_assoc()) {
            array_push($exppavementproductionweekly, $row['expected_no_of_blocks_produced']);
            array_push($actpavementproductionweekly, $row['actual_no_of_blocks_produced']);    
        }
    $totalexppavementweekly=array_sum($exppavementproductionweekly);
    $totalactpavementweekly=array_sum($actpavementproductionweekly);
    if ($totalexppavementweekly=='' or $totalactpavementweekly=='' ) {
       $totalpavementpercent=0;
    }else{
    $totalpavementpercent=round(($totalactpavementweekly/$totalexppavementweekly)*100);
}
    

    $open_withpavement2="";
    $open_withpavement2carry="";
    $pavement_productopenwithweekly = $db->fetch(" SELECT * FROM sales WHERE dates BETWEEN '$firstdaylastmonth' and '$sundaylastweek' and product='pavement' order by dates ASC");
  if($pavement_productopenwithweekly->num_rows > 0){
        }

        while($row = $pavement_productopenwithweekly->fetch_assoc()) {
             $open_withpavement2=$row['closed_with'];  
        }
        if ($open_withpavement2>=0) {
             $open_withpavement2=0;
            $weekpavementshow=$totalactpavementweekly+$open_withpavement2;
            
        }else{
            $weekpavementshow=$totalactpavementweekly+$open_withpavement2;
        }
      
   //view pavement for dashboard weekly --end--

        //view pavement for dashboard monthly --start--
$exppavementproductionmonthly=array();
$actpavementproductionmonthly=array();
$totalexppavementmonthly="";
$totalactpavementmonthly="";
$totalpavementpercentmonthly="";
 $pavement_productdashboardmonthly = $db->fetch(" SELECT * FROM production WHERE dates BETWEEN '$firstday' and '$lastday' and product='pavement'");
  if($pavement_productdashboardmonthly->num_rows > 0){
        }

        while($row = $pavement_productdashboardmonthly->fetch_assoc()) {
            array_push($exppavementproductionmonthly, $row['expected_no_of_blocks_produced']);
            array_push($actpavementproductionmonthly, $row['actual_no_of_blocks_produced']);    
        }
    $totalexppavementmonthly=array_sum($exppavementproductionmonthly);
    $totalactpavementmonthly=array_sum($actpavementproductionmonthly);
    if ($totalexppavementmonthly=='' or $totalactpavementmonthly=='' ) {
       $totalpavementpercentmonthly=0;
    }else{
   $totalpavementpercentmonthly=round(($totalactpavementmonthly/$totalexppavementmonthly)*100);
}
    


    $open_withpavementmonth="";
    $pavement_productopenwithmonth = $db->fetch(" SELECT * FROM sales WHERE dates BETWEEN '$firstdaylastmonth' and '$lastdaylastmonth' and product='pavement' order by dates ASC");
  if($pavement_productopenwithmonth->num_rows > 0){
        }

        while($row = $pavement_productopenwithmonth->fetch_assoc()) {
             $open_withpavementmonth=$row['closed_with'];  
        }
        if ($open_withpavementmonth=='') {
            $open_withpavementmonth=0;
            $monthpavementshow=$totalactpavementmonthly+$open_withpavementmonth;
        }else{
            $monthpavementshow=$totalactpavementmonthly+$open_withpavementmonth;

        }
        




    //view pavement for dashboard monthlymonthly --end--


 //view reason
 
  $reasons="";
  $timestampss="";
  $idr="";
  
  if(isset($_GET['view_reason'])){
      $id = $_GET['view_reason'];
      $sql  ="SELECT * FROM production WHERE id= $id ";
      $rec= $db->fetch($sql);
      $record = mysqli_fetch_array( $rec);
      $id=$record['id'];
      $idr=$record['id'];
      $timestampss=$record['tmz'];
      $reasons =  $record['reasons'];
      $fullnames =  $record['usersname'];
      $sqls  ="SELECT * FROM userz WHERE username= '$fullnames' ";
      $reco= $db->fetch($sqls);
      $recordfullname= mysqli_fetch_array( $reco);
      $fullnames=$recordfullname['first_name']." ".$recordfullname['last_name'];
      //view comment
    $view_comment = $db->fetch(" SELECT * FROM comment WHERE reasons_id='$id'");

  }

//comment
if(isset($_POST['comnt'])){
    $reason_id=$_POST['reason_id'];
    $reason=$_POST['reason'];
    $comment=$_POST['comment'];
    $fullnames =  $_SESSION['username'];
    $sqlsss  ="SELECT * FROM userz WHERE username= '$fullnames' ";
    $reco= $db->fetch($sqlsss);
    $recordfullname= mysqli_fetch_array( $reco);
    $fullnames=$recordfullname['first_name']." ".$recordfullname['last_name'];
        $sql= "INSERT INTO comment(reasons_id,reasons,comment,username) VALUES('$reason_id','$reason','$comment','$fullnames');";
        $fullnames= $username_logs;
        $sqls= "INSERT INTO logs (username,activity) VALUES('$username_logs','comment on daily reason');";
        $db->insert($sql);
        $db->insert($sqls);
        header("Location: ../reason?view_reasons=$reason_id");
        exit(); 
}

//add sales

$todayproduction=array();
if(isset($_POST['add_sales'])){
    $dates=date("Y-m-d");
    $product=$_POST['product'];
    $open_with="";
    $availablepr="";
    $product_produced = $db->fetch(" SELECT * FROM production WHERE dates='$dates' and product='$product'");
     if($product_produced->num_rows > 0){
        while($row = $product_produced->fetch_assoc()) {
            array_push($todayproduction, $row['actual_no_of_blocks_produced']);    
        }
     }
    $totalproducton=array_sum($todayproduction);       
    $produce=($totalproducton);
    $availableprd=$_POST['open_with'];
     $product_producedcheck = $db->fetch(" SELECT * FROM sales WHERE dates='$dates' and product='$product'");
        if($product_producedcheck->num_rows > 0){
        while($row = $product_producedcheck->fetch_assoc()) {
           $datescheck=$row['dates'];    
        }}

    if($datescheck===date("Y-m-d")){
        $product_produced = $db->fetch(" SELECT * FROM sales WHERE dates='$dates' and product='$product'");
        if($product_produced->num_rows > 0){
        while($row = $product_produced->fetch_assoc()) {
           $open_with=$row['open_with'];    
        }
     }else{
      $availablepr=$_POST['open_with'];
      $open_with=$availablepr-$produce;
     }
    }else{
        $availablepr=$_POST['open_with'];
        $open_with=$availablepr-$produce;
    }
    
    $sold=$_POST['sold'];
    $price_per_each=$_POST['price_per_each'];
    $subtotal_amount=$sold*$price_per_each;
    $closed_with=$availableprd-$sold;
    $username_logs=$_SESSION['username'];

    $sql= "INSERT INTO sales(dates,product,open_with,produce,sold,price_per_each,subtotal_amount,closed_with) VALUES('$dates','$product','$open_with','$produce','$sold','$price_per_each','$subtotal_amount','$closed_with');";
        $db->insert($sql);
            
            $updateproduct="UPDATE product SET   total ='$closed_with' WHERE product_name = '$product' ";
            $db->insert($updateproduct);

        

        $fullnames= $username_logs;
        $sqls= "INSERT INTO logs (username,activity) VALUES('$username_logs','add daily $product sales');";  
        $db->insert($sqls);
        header("Location: ../sales?product=$product");
        exit(); 
}

//view product sales
  $sold=array();
  $open_wth="";
  $prodce="";
  $subtotal_amountsold=array();
  $datess="";
  $closed="";
 $dates1=date("Y-m-d");
 $open_withblocks="";
 $productblocks="";
 $totalblocks="";
  $product_produceds = $db->fetch(" SELECT * FROM sales WHERE dates='$dates1' and product='$product'");
        if($product_produceds->num_rows > 0){
        while($row = $product_produceds->fetch_assoc()) {
           $open_wth=$row['open_with']; 
           $prodce=$row['produce'];
           $closed=$row['closed_with'];   
        }
}
 $product_sales = $db->fetch(" SELECT * FROM  sales WHERE dates='$dates1' and product='$product'");
 //view blocks production for dashboard
 $product_blocks = $db->fetch(" SELECT * FROM product WHERE  product_name='blocks'");
        if($product_blocks->num_rows > 0){
        while($row = $product_blocks->fetch_assoc()) {
           $open_withblocks=$row['open_with']; 
           $productblocks=$row['produce'];
              
        }}
        if ($open_withblocks=='' or $productblocks=='') {
           $open_withblocks=0;
           $productblocks=0;
           $totalblocks=$open_withblocks+$productblocks;
        }else{$totalblocks=$open_withblocks+$productblocks;}


//view pevement production for dashboard
$open_withpevement="";
 $productpevement="";
 $totalpevements="";
 $product_pevements = $db->fetch(" SELECT * FROM product WHERE product_name='pavement'");
        if($product_pevements->num_rows > 0){

        while($row = $product_pevements->fetch_assoc()) {
           $open_withpevement=$row['open_with']; 
           $productpevement=$row['produce'];
       }
              
        }else{
            $open_withpevement=0;
            $productpevement=0;
        }
 
$totalpevements=$open_withpevement+$productpevement;

 //add materials


  
  if(isset($_POST['addmaterial'])){
    $material=$_POST['material'];
        $sql= "INSERT INTO material(matarial_name) VALUES('$material');";
        
        $fullnames= $username_logs;
        $sqls= "INSERT INTO logs (username,activity) VALUES('$username_logs','add daily $material');";
        $db->insert($sql);
        $db->insert($sqls);
        header("Location: ../material");
        exit(); 
}
//get material
$materialname="";
// $totalproduct="";
if(isset($_GET['mname'])){
    $materialname = $_GET['mname'];
      // $sql  ="SELECT * FROM product WHERE product_name= '$product '";
      // $rec= $db->fetch($sql);
      // $record = mysqli_fetch_array($rec);
      // $totalproduct=$record['total'];
  }

// material produrement 

 if(isset($_POST['material_procure'])){
         $dates=date("Y-m-d");
        $material_type=$_POST['material_type'];
        $quantity=$_POST['quantity'];
        $price_per_each=$_POST['price_per_each'];
        $totalprocure=$quantity*$price_per_each;
        $avlableclose="";
         $materialscheck = $db->fetch(" SELECT * FROM material WHERE matarial_name='$material_type'");
        if($materialscheck->num_rows > 0){
        while($row = $materialscheck->fetch_assoc()) {
           $material_available=$row['available'];   
        }}
         $avlableclose=$material_available+$quantity;
        $sql= "INSERT INTO material_procure(dates,material_type,quantity,price_per_each,total) VALUES('$dates','$material_type','$quantity','$price_per_each','$totalprocure');";
        $updatematerialavailable="UPDATE material SET   available ='$avlableclose' WHERE matarial_name = '$material_type' ";
            $db->insert($updatematerialavailable);
        
        $fullnames= $username_logs;
        $sqls= "INSERT INTO logs (username,activity) VALUES('$username_logs','procure $material_type');";
        $db->insert($sql);
        $db->insert($sqls);
        header("Location: ../material_procure_add?mname=$material_type");
        exit(); 
}
//view material procurement 
$view_material_procure = $db->fetch(" SELECT * FROM material_procure WHERE dates='$dates1' and material_type='$materialname'");
$view_material_procuregeneraldaily = $db->fetch("SELECT dates,material_type,SUM(quantity) as quantity,price_per_each,sum(total) as total FROM material_procure WHERE dates='$dates1' GROUP by material_type");
//weekly
$view_material_procure_weekly = $db->fetch(" SELECT * FROM material_procure WHERE dates BETWEEN '$monday' and '$sunday' and material_type='$materialname' ");
$view_material_procure_weekly_consump = $db->fetch("SELECT dates,material_type,SUM(quantity) as quantity,price_per_each,sum(total) as total FROM material_procure WHERE dates BETWEEN '$monday' and '$sunday' GROUP by material_type");
//monthly
$view_material_procure_monthly = $db->fetch(" SELECT * FROM material_procure WHERE dates BETWEEN '$firstday' and '$lastday' and material_type='$materialname' ");
$view_material_procure_monthlyconsup = $db->fetch(" SELECT dates,material_type,SUM(quantity) as quantity,price_per_each,sum(total) as total FROM material_procure WHERE dates BETWEEN '$firstday' and '$lastday' GROUP by material_type ");


//view material
$view_material = $db->fetch(" SELECT * FROM material");


$materialview = $db->fetch(" SELECT * FROM materials WHERE dates='$dates1' and name='$materialname'");
////////////////////////////////////////weeekly
$materialviewweekly = $db->fetch(" SELECT * FROM materials WHERE dates BETWEEN '$monday' and '$sunday' and name='$materialname'");
////////////////////////////////////////monthly
$materialviewmonthly = $db->fetch(" SELECT * FROM materials WHERE dates BETWEEN '$firstday' and '$lastday' and name='$materialname'");

///////////////////////////////////////////////////////////////////////add material used
$datez="";
$openbalance="";
$open_m="";
$addmatral="";
 $totalmatrl='';
if(isset($_POST['use_material'])){
    $dates=date("Y-m-d");
    $materialname=$_POST['materialname'];
    $material_availables="";

    $materialssz = $db->fetch(" SELECT * FROM materials WHERE name='$materialname'");
        if($materialssz->num_rows > 0){
        while($row = $materialssz->fetch_assoc()) {
            $datez=$row['dates'];
           $totalmatrl=$row['total']; 
           $open_m=$row['open'];  
        }
       }

        
       //////////////////////////////////////////////////////////

       $view_material_procure = $db->fetch(" SELECT sum(quantity) as quantity FROM material_procure WHERE dates='$dates1' and material_type='$materialname'");
     if($view_material_procure->num_rows > 0){
        while($rows=$view_material_procure->fetch_assoc()) { 
                $addmatral= $rows['quantity']; 
        }

         }
         ////////////////////////////////////////////////////////////
        $materialsused = $db->fetch(" SELECT * FROM material WHERE matarial_name='$materialname'");
        if($materialsused->num_rows > 0){
        while($row = $materialsused->fetch_assoc()) {       
           $material_availables=$row['available'];   
        }}
        //////////////////////////////////////////////////

        if($datez===date("Y-m-d")){
          $openbalance=$open_m;
       }else{
         $openbalance=$material_availables-$addmatral;
       }
      
     $used=$_POST['used'];
     $usedmaterial=$material_availables -$used;

   

     
    $sql= "INSERT INTO materials(dates,name,open,used,added,total) VALUES('$dates','$materialname','$openbalance','$used','$addmatral','$usedmaterial');";
        $db->insert($sql);

        $updatematerialavailableZ="UPDATE material SET   available ='$usedmaterial' WHERE matarial_name = '$materialname' ";
            $db->insert($updatematerialavailableZ);

        $fullnames= $username_logs;
        $sqls= "INSERT INTO logs (username,activity) VALUES('$username_logs','add  $materialname matarials used');";  
        $db->insert($sqls);
        header("Location: ../material_use_add?mname=$materialname");
        exit(); 
}







 //add truck
  
  if(isset($_POST['addtruck'])){
    $truckname=$_POST['truckname'];
        $sql= "INSERT INTO truck(truck_name) VALUES('$truckname');";
        
        $fullnames= $username_logs;
        $sqls= "INSERT INTO logs (username,activity) VALUES('$username_logs','add truck name $truckname');";
        $db->insert($sql);
        $db->insert($sqls);
        header("Location: ../truck");
        exit(); 
}

//view truck
$view_truck = $db->fetch("SELECT * FROM truck");

//get truck
$truckname="";
$dates2=date("Y-m-d");
// $totalproduct="";
if(isset($_GET['tname'])){
    $truckname = $_GET['tname'];
  }
  //view daily truck root
$truckview= $db->fetch(" SELECT * FROM vehicle WHERE dates='$dates2' and truck_name='$truckname'");

//view weekly truck root
 
$truckviewweekly= $db->fetch(" SELECT * FROM vehicle WHERE dates BETWEEN  '$monday' AND '$sunday' and truck_name='$truckname'");
//view monthly truck root
$truckviewmonthly= $db->fetch(" SELECT * FROM vehicle WHERE dates BETWEEN  '$firstday' AND '$lastday' and truck_name='$truckname'");
//add truck
//add truck root truck_name  liters  price_per_liter total
if(isset($_POST['add_truckroot'])){
    $datess=date("Y-m-d");
    $truckname=$_POST['truckname'];
    $from=$_POST['from'];
    $to=$_POST['to'];
    $cargo_type=$_POST['cargo_type'];
    $sql="INSERT INTO vehicle (dates,truck_name,froms,toz,cargo_type) VALUES('$datess','$truckname','$from','$to','$cargo_type');";
        $db->insert($sql);

        $fullnames= $username_logs;
        $sqls= "INSERT INTO logs (username,activity) VALUES('$username_logs','add  $truck root detail');";  
        $db->insert($sqls);
        header("Location: ../truck_add_root?tname=$truckname");
        exit(); 
}

//add truck fuel 
if(isset($_POST['add_truckfuel'])){
    $datess=date("Y-m-d");
    $truckname=$_POST['truckname'];
    $liters=$_POST['liters'];
    $price_per_liter=$_POST['price_per_liter'];
    $totalfuel=$liters*$price_per_liter;
    $sql="INSERT INTO truck_fuel (dates,truck_name,liters,price_per_liter,total) VALUES('$datess','$truckname','$liters','$price_per_liter','$totalfuel');";
        $db->insert($sql);

        $fullnames= $username_logs;
        $sqls= "INSERT INTO logs (username,activity) VALUES('$username_logs','add  $truck fuel detail');";  
        $db->insert($sqls);
        header("Location: ../truck_add_fuel?tname=$truckname");
        exit(); 
}
//view truck  fuel daily
$truckview_fuel_daily= $db->fetch(" SELECT * FROM truck_fuel WHERE dates='$dates2' and truck_name='$truckname'");
$truckview_fuel_dailyconsp= $db->fetch("SELECT dates,truck_name,sum(liters) as liters,price_per_liter,SUM(total) as total FROM truck_fuel WHERE dates='$dates2' GROUP by truck_name");
//view truck fuel weekly
$truckview_fuel_weekly= $db->fetch(" SELECT * FROM truck_fuel WHERE dates BETWEEN  '$monday' AND '$sunday' and truck_name='$truckname'");
$truckview_fuel_weeklyconsmp= $db->fetch(" SELECT dates,truck_name,sum(liters) as liters,price_per_liter,SUM(total) as total FROM truck_fuel WHERE dates BETWEEN '$monday' and '$sunday' GROUP by truck_name");

//view monthly truck root
$truckview_fuel_monthly= $db->fetch(" SELECT * FROM truck_fuel WHERE dates BETWEEN  '$firstday' AND '$lastday' and truck_name='$truckname'");
$truckview_fuel_monthlyconsump= $db->fetch(" SELECT dates,truck_name,sum(liters) as liters,price_per_liter,SUM(total) as total FROM truck_fuel WHERE dates BETWEEN '$firstday' and '$lastday' GROUP by truck_name");





//add truck payment
if(isset($_POST['add_truckpay'])){  
    $datess=date("Y-m-d");
    $truckname=$_POST['truckname'];
    $pay_for=$_POST['pay_for'];
    $amount=$_POST['amount'];
    $sql="INSERT INTO truck_payment (dates,truck_name,pay_for,amount) VALUES('$datess','$truckname','$pay_for','$amount');";
        $db->insert($sql);

        $fullnames= $username_logs;
        $sqls= "INSERT INTO logs (username,activity) VALUES('$username_logs','add  $truck payment detail');";  
        $db->insert($sqls);
        header("Location: ../truck_add_pay?tname=$truckname");
        exit(); 
}
//view truck  payment daily
$truckview_pay_daily= $db->fetch(" SELECT * FROM truck_payment WHERE dates='$dates2' and truck_name='$truckname'");
$truckview_pay_dailyconsp= $db->fetch(" SELECT dates,truck_name,sum(amount) as amount FROM truck_payment WHERE dates='$dates2' GROUP by truck_name");
//view truck payment weekly
$truckview_pay_weekly= $db->fetch(" SELECT * FROM truck_payment WHERE dates BETWEEN  '$monday' AND '$sunday' and truck_name='$truckname'");
$truckview_pay_weeklyconsump= $db->fetch(" SELECT dates,truck_name,sum(amount) as amount FROM truck_payment WHERE dates BETWEEN '$monday' AND '$sunday' GROUP by truck_name");

//view monthly truck payment
$truckview_pay_monthly= $db->fetch(" SELECT * FROM truck_payment WHERE dates BETWEEN  '$firstday' AND '$lastday' and truck_name='$truckname'");
$truckview_pay_monthlyconsump= $db->fetch(" SELECT dates,truck_name,sum(amount) as amount FROM truck_payment WHERE dates BETWEEN '$firstday' AND '$lastday' GROUP by truck_name");







//add service service
    
if(isset($_POST['add_truckservice'])){
    $datess=date("Y-m-d");
    $truckname=$_POST['truckname'];
    $type_of_service=$_POST['type_of_service'];
    $total_service=$_POST['total_service'];
    $price_per_each=$_POST['price_per_each'];
    $totalservice=$total_service*$price_per_each;
    $sql="INSERT INTO truck_service (dates,truck_name,type_of_service,total_service,price_per_each,total) VALUES('$datess','$truckname','$type_of_service','$total_service','$price_per_each','$totalservice');";
        $db->insert($sql);

        $fullnames= $username_logs;
        $sqls= "INSERT INTO logs (username,activity) VALUES('$username_logs','add  $truck service detail');";  
        $db->insert($sqls);
        header("Location: ../truck_add_service?tname=$truckname");
        exit(); 
}
//view truck   service daily
$truckview_service_daily= $db->fetch(" SELECT * FROM truck_service WHERE dates='$dates2' and truck_name='$truckname'");
$truckview_service_dailyconsp= $db->fetch("SELECT dates,truck_name,SUM(total_service) as total_service ,SUM(total) as total FROM truck_service WHERE dates='$dates2' GROUP by truck_name");
//view truck  service weekly
$truckview_service_weekly= $db->fetch(" SELECT * FROM truck_service WHERE dates BETWEEN  '$monday' AND '$sunday' and truck_name='$truckname'");
$truckview_service_weeklyconsmp= $db->fetch(" SELECT dates,truck_name,SUM(total_service) as total_service ,SUM(total) as total FROM truck_service WHERE dates BETWEEN '$monday' AND '$sunday' GROUP by truck_name");

//view monthly truck service
$truckview_service_monthly= $db->fetch(" SELECT * FROM truck_service WHERE dates BETWEEN  '$firstday' AND '$lastday' and truck_name='$truckname'");
$truckview_service_monthlyconsump= $db->fetch(" SELECT dates,truck_name,SUM(total_service) as total_service ,SUM(total) as total FROM truck_service WHERE dates BETWEEN '$firstday' AND '$lastday' GROUP by truck_name");





//////////////////////site fuel , service , other payments



/// add fuel site

if(isset($_POST['add_sitefuel'])){
    $datess=date("Y-m-d");
    $description=$_POST['description'];
    $quantity=$_POST['quantity'];
    $price_per_each=$_POST['price_per_each'];
    $totalfuel=$quantity*$price_per_each;
    $sql="INSERT INTO fuel_site (dates,description,quantity,price_per_each,total) VALUES('$datess','$description','$quantity','$price_per_each','$totalfuel');";
        $db->insert($sql);

        $fullnames= $username_logs;
        $sqls= "INSERT INTO logs (username,activity) VALUES('$username_logs','add  site  detail');";  
        $db->insert($sqls);
        header("Location: ../site_fuel_add");
        exit(); 
}
//view site  fuel daily
$siteview_fuel_daily= $db->fetch(" SELECT * FROM fuel_site WHERE dates='$dates2'");
$siteview_fuel_dailyconsump= $db->fetch("SELECT dates,description,sum(quantity) as quantity,price_per_each,sum(total) as total FROM fuel_site WHERE dates='$dates2' GROUP by description");
//view site fuel weekly
$siteview_fuel_weekly= $db->fetch(" SELECT * FROM fuel_site WHERE dates BETWEEN  '$monday' AND '$sunday'");
$siteview_fuel_weeklyconsump= $db->fetch(" SELECT dates,description,sum(quantity) as quantity,price_per_each,sum(total) as total FROM fuel_site WHERE dates BETWEEN '$monday' AND '$sunday' GROUP by description");

//view monthly site root
$siteview_fuel_monthly= $db->fetch(" SELECT * FROM fuel_site WHERE dates BETWEEN  '$firstday' AND '$lastday'");
$siteview_fuel_monthlyconsump= $db->fetch("SELECT dates,description,sum(quantity) as quantity,price_per_each,sum(total) as total FROM fuel_site WHERE dates BETWEEN '$firstday' AND '$lastday' GROUP by description");

///////////////////////////////////////////////////////////////////////////////////////////////////////////service site





//add site service
    
if(isset($_POST['add_siteservice'])){
    $datess=date("Y-m-d");
    $description=$_POST['description'];
    $type_of_service=$_POST['type_of_service'];
    $total_service=$_POST['total_service'];
    $price_per_each=$_POST['price_per_each'];
    $totalservice=$total_service*$price_per_each;
    $sql="INSERT INTO service_site (dates,description,type_of_service,total_service,price_per_each,total) VALUES('$datess','$description','$type_of_service','$total_service','$price_per_each','$totalservice');";
        $db->insert($sql);

        $fullnames= $username_logs;
        $sqls= "INSERT INTO logs (username,activity) VALUES('$username_logs','add  site service detail');";  
        $db->insert($sqls);
        header("Location: ../site_service_add");
        exit(); 
}
//view site   service daily
$siteview_service_daily= $db->fetch(" SELECT * FROM service_site WHERE dates='$dates2' ");
//view site  service weekly
$siteview_service_weekly= $db->fetch(" SELECT * FROM service_site WHERE dates BETWEEN  '$monday' AND '$sunday'");

//view monthly site service
$siteview_service_monthly= $db->fetch(" SELECT * FROM service_site WHERE dates BETWEEN  '$firstday' AND '$lastday'");

////////////////////////////////////////////////////////////////////////////////end
/////////////////////////////////////////////////add site payment


//add truck payment
if(isset($_POST['add_sitepay'])){  
    $datess=date("Y-m-d");
    $pay_for=$_POST['pay_for'];
    $amount=$_POST['amount'];
    $sql="INSERT INTO site_payment (dates,pay_for,amount) VALUES('$datess','$pay_for','$amount');";
        $db->insert($sql);

        $fullnames= $username_logs;
        $sqls= "INSERT INTO logs (username,activity) VALUES('$username_logs','add  site payment detail');";  
        $db->insert($sqls);
        header("Location: ../site_pay_add");
        exit(); 
}
//view site  payment daily
$siteview_pay_daily= $db->fetch(" SELECT * FROM site_payment WHERE dates='$dates2' ");
$siteview_pay_dailyconsump= $db->fetch(" SELECT dates,pay_for,sum(amount) as amount FROM site_payment WHERE dates='$dates2' GROUP by pay_for ");
//view site payment weekly
$siteview_pay_weekly= $db->fetch(" SELECT * FROM site_payment WHERE dates BETWEEN  '$monday' AND '$sunday' ");
$siteview_pay_weeklyconsump= $db->fetch(" SELECT dates,pay_for,sum(amount) as amount FROM site_payment WHERE dates BETWEEN '$monday' AND '$sunday' GROUP by pay_for ");

//view monthly site payment
$siteview_pay_monthly= $db->fetch(" SELECT * FROM site_payment WHERE dates BETWEEN  '$firstday' AND '$lastday'");
$siteview_pay_monthlyconsump= $db->fetch(" SELECT dates,pay_for,sum(amount) as amount FROM site_payment WHERE dates BETWEEN '$firstday' AND '$lastday' GROUP by pay_for");

////////////////////////////end

///////////////////estimetion cost



//add estmation cost
if(isset($_POST['add_estmtdaily'])){  
    $datess=date("Y-m-d");
    $todatess=date("Y-m-d");
    $detail=$_POST['detail'];
    $quantity=$_POST['quantity'];
    $price_per_each=$_POST['price_per_each'];
    $total_amount=$quantity*$price_per_each;

    $sql="INSERT INTO estimate (dates,to_date,detail,quantity,price_per_each,total_amount) VALUES('$datess','$todatess','$detail','$quantity','$price_per_each','$total_amount');";
        $db->insert($sql);

        $fullnames= $username_logs;
        $sqls= "INSERT INTO logs (username,activity) VALUES('$username_logs','add  estimetion cost detail');";  
        $db->insert($sqls);
        header("Location: ../site_estimation_add_daily");
        exit(); 
}
//view estimation cost daily
$estimateview_daily= $db->fetch(" SELECT * FROM estimate WHERE dates='$dates2' ");

if(isset($_POST['add_estmtweely'])){  
    $datess=$monday;
    $todatess=$sunday;
    $detail=$_POST['detail'];
    $quantity=$_POST['quantity'];
    $price_per_each=$_POST['price_per_each'];
    $total_amount=$quantity*$price_per_each;

    $sql="INSERT INTO estimate (dates,to_date,detail,quantity,price_per_each,total_amount) VALUES('$datess','$todatess','$detail','$quantity','$price_per_each','$total_amount');";
        $db->insert($sql);

        $fullnames= $username_logs;
        $sqls= "INSERT INTO logs (username,activity) VALUES('$username_logs','add  estimetion cost detail');";  
        $db->insert($sqls);
        header("Location: ../site_estimation_weekly");
        exit(); 
}
//view estimation cost weekly
$estimateview_weekly= $db->fetch(" SELECT * FROM estimate WHERE dates='$monday' and to_date='$sunday' ");

//view estimation cost payment
if(isset($_POST['add_estmtmonthly'])){  
    $datess=$firstday;
    $todatess=$lastday;
    $detail=$_POST['detail'];
    $quantity=$_POST['quantity'];
    $price_per_each=$_POST['price_per_each'];
    $total_amount=$quantity*$price_per_each;

    $sql="INSERT INTO estimate (dates,to_date,detail,quantity,price_per_each,total_amount) VALUES('$datess','$todatess','$detail','$quantity','$price_per_each','$total_amount');";
        $db->insert($sql);

        $fullnames= $username_logs;
        $sqls= "INSERT INTO logs (username,activity) VALUES('$username_logs','add  estimetion cost detail');";  
        $db->insert($sqls);
        header("Location: ../site_estimation_monthly");
        exit(); 
}
$estimateview_monthly= $db->fetch(" SELECT * FROM estimate WHERE dates='$firstday' and to_date='$lastday'");
///////////////////////////////////end








//add money receive 
if(isset($_POST['add_money'])){  
    $datess=date("Y-m-d");
    $open_with=$_POST['open_with'];
    $receive_from=$_POST['receive_from'];
    $amount_received=$_POST['amount_received'];
    $total=$open_with+$amount_received;
    $used=$_POST['used'];
    $remaining=$total-$used;
    $sql="INSERT INTO budget (dates,open_with,receive_from,amount_received,total,used,remaining) VALUES('$datess','$open_with','$receive_from','$amount_received','$total','$used','$remaining');";
        $db->insert($sql);

        $fullnames= $username_logs;
        $sqls= "INSERT INTO logs (username,activity) VALUES('$username_logs','add  money  detail');";  
        $db->insert($sqls);
        header("Location: ../moneyreceive_add");
        exit(); 
}
$view_money_received= $db->fetch(" SELECT * FROM budget WHERE dates='$dates2'");
$view_money_receivedweekly= $db->fetch(" SELECT * FROM budget WHERE dates BETWEEN '$monday' and '$sunday'");
$view_money_receivedmonthly= $db->fetch(" SELECT * FROM budget WHERE dates BETWEEN '$firstday' and '$lastday'");
///////////////////////////////////end

//view order status
$view_order_status = $db->fetch(" SELECT * FROM status");

//view order
$view_order = $db->fetch(" SELECT * FROM orders WHERE order_type='$product'");



//add order


if(isset($_POST['add_order'])){
    $datess=date("Y-m-d");
    $order_name=$_POST['order_name'];
    $product=$_POST['product'];
    $date_to_deliver=$_POST['date_to_deliver'];
    $quantity=$_POST['quantity'];
    $price_per_each=$_POST['price_per_each'];
    $amount_paid=$_POST['amount_paid'];
    $total_amount=$quantity*$price_per_each;
    $status="";
    $price="";
    $remaining=$total_amount-$amount_paid;
    $sqlss  ="SELECT * FROM product WHERE product_name= '$product'";
      $rec= $db->fetch($sqlss);
       if($rec->num_rows > 0){
        while($row = $rec->fetch_assoc()) {
           $price=$row['price'];   
        }
    }
      if ($price_per_each < $price) {
          $status = "not confirmed";
      }else{
          $status = "confirmed";
      }
    $Paid=($amount_paid/$total_amount)*100;
    $Paid=round($Paid, 1);
    $sql="INSERT INTO orders(dates,order_name,order_type,date_to_deliver,quantity,price_per_each,total_amount,statuz,paid,amount_paid,remaining) VALUES('$datess','$order_name','$product','$date_to_deliver','$quantity','$price_per_each','$total_amount','$status','$Paid','$amount_paid','$remaining');";
        $db->insert($sql);

        $fullnames= $username_logs;
        $sqls= "INSERT INTO logs (username,activity) VALUES('$username_logs','add  $product order');";  
        $db->insert($sqls);
        header("Location: ../add_order?product=$product");
        exit(); 
}

$total_amounts="";
$amount_paids="";
$order_type="";
if(isset($_GET['order_id'])){
    $order_id = $_GET['order_id'];
    $sql  ="SELECT * FROM orders WHERE order_id= '$order_id'";
      $rec= $db->fetch($sql);
      $record = mysqli_fetch_array($rec);
      $total_amounts=$record['total_amount'];
      $amount_paids=$record['amount_paid'];
      $order_type=$record['order_type'];
      $order_name=$record['order_name'];
  }
  

// add amount
if(isset($_POST['add_amount_paid'])){
    $order_id=$_POST['order_id'];
    $order_type=$_POST['order_type'];
    $order_name=$_POST['order_name'];
    $total_amounts=$_POST['total_amounts'];
    $amount_paid_og=$_POST['amount_paid_og'];
    $amount_paid=$_POST['amount_paid'];
    $realamountpaid=$amount_paid_og+$amount_paid;
    $remaining=$total_amounts-$realamountpaid;
    $username_logs=$_SESSION['username'];
    $paid=($realamountpaid/$total_amounts)*100;
    $paid=round($paid, 1); 
            $updateorder="UPDATE orders SET amount_paid ='$realamountpaid', remaining ='$remaining',paid='$paid' WHERE order_id ='$order_id'";
            $db->insert($updateorder);

        

        $fullnames= $username_logs;
        $sqls= "INSERT INTO logs (username,activity) VALUES('$username_logs','add amaunt paid from $amount_paid_og to  $realamountpaid  on ordername is $order_name ');";  
        $db->insert($sqls);
        header("Location: ../add_order?product=$order_type");
        exit(); 
}
//get order status
$orderstatus="";
$states="";
if(isset($_GET['orderstatus'])){
    $orderstatus = $_GET['orderstatus'];
   if ($orderstatus=="not confirmed") {
       $states="confirm order";
   }elseif($orderstatus=="confirmed"){
      $states="deliver order";

   }else{
    $states="delivered";
   }
  }

  //view order status
$view_order_act = $db->fetch(" SELECT * FROM orders WHERE order_type='$product' and statuz='$orderstatus'");



// upgate order status
if(isset($_POST['ordersact'])){
    $order_id=$_POST['order_id'];
    $status=$_POST['status'];
    $order_type=$_POST['order_type'];
    $order_name=$_POST['order_name'];
    $statusupdate="";
    if ($status=="not confirmed") {
       $statusupdate="confirmed";
   }elseif($status=="confirmed"){
      $statusupdate="delivered";

   }else{
    $statusupdate="delivered";
   }
     $updateorder="UPDATE orders SET statuz ='$statusupdate' WHERE order_id ='$order_id'";
    $db->insert($updateorder);
        $fullnames= $username_logs;
        $sqls= "INSERT INTO logs (username,activity) VALUES('$username_logs','update order status from $status to  $statusupdate  on ordername is $order_name ');";  
        $db->insert($sqls);
        header("Location: ../order_view?product=$order_type&&orderstatus=$status");
        exit(); 
}

//data for chart on dashboard SELECT dates,sum(subtotal_amount) as subtotal_amount FROM `sales` WHERE product='blocks' group by dates

$view_blocks_productforcharsales = $db->fetch("SELECT dates,sum(subtotal_amount) as subtotal_amount FROM `sales` WHERE dates BETWEEN '$monday' and '$sunday' and product='$product' group by dates");
foreach ($view_blocks_productforcharsales as $blocksalesweekly) {
    if ($blocksalesweekly=='') {
       $datesweeklyblock[]=['0000-00-00','0000-00-00','0000-00-00','0000-00-00','0000-00-00','0000-00-00','0000-00-00'];
       $amountweeklyblock[]=[0,0,0,0,0,0,0];
    }else{
         $datesweeklyblock[]=$blocksalesweekly['dates'];
         $amountweeklyblock[]=$blocksalesweekly['subtotal_amount'];
    }
   
}

// $view_pavement_productforcharsales = $db->fetch("SELECT dates,sum(subtotal_amount) as subtotal_amount FROM `sales` WHERE dates BETWEEN '$monday' and '$sunday' and product='pavement' group by dates");
// foreach ($view_pavement_productforcharsales as $pavementsalesweekly) {

//     if ($pavementsalesweekly=='') {
//        $amountweeklypavement[]=[0,0,0,0,0,0,0];
//     }else{
//           $amountweeklypavement[]=$pavementsalesweekly['subtotal_amount'];
//     }
   
// }


//month chart dashboard
// $firstday
// $lastday


$view_blocks_productforcharsalesmnth = $db->fetch("SELECT t.dates,sum(subtotal_amount) as subtotal_amount, CASE WHEN dates =1 then 'week1' WHEN dates = 2 then 'week2' WHEN dates = 3 THEN 'week3' WHEN dates = 4 THEN 'week4'  WHEN dates = 5 then 'week5' END as weeks from (SELECT (WEEK(dates) - WEEK(DATE_FORMAT(dates,'%Y-%m-01')))+1 as dates,sum(subtotal_amount) as subtotal_amount FROM `sales` WHERE dates BETWEEN '$firstday' and '$lastday' and product='$product' group by dates)t GROUP by t.dates");
foreach ($view_blocks_productforcharsalesmnth as $blocksalesmnthly) {
    if ($blocksalesmnthly=='') {
       $datesmnthlyblock[]=['0000-00-00','0000-00-00','0000-00-00','0000-00-00','0000-00-00','0000-00-00','0000-00-00'];
       $amountmnthlyblock[]=[0,0,0,0,0,0,0];
    }else{
         $datesmnthlyblock[]=$blocksalesmnthly['weeks'];
         $amountmnthlyblock[]=$blocksalesmnthly['subtotal_amount'];
    }
   
}

// 


//report production daily
$soldreport=array();
$totalsold="";
$subtotalsales=array();
$totasales="";
$targetreport=array();
$totaltarget="";
$actualreport=array();
$totalactual="";


$view_dail_reportproduction = $db->fetch("SELECT dates,SUM(expected_no_of_blocks_produced)as target,sum(actual_no_of_blocks_produced)as actual FROM `production` WHERE dates='$dates1' and product='$product'");
//report sales daily
$view_dail_reportsales = $db->fetch("SELECT dates,SUM(sold)as sold,sum(subtotal_amount)as total FROM `sales` WHERE dates='$dates1' and product='$product'");
//weekly sales report
$view_weekly_reportsales = $db->fetch("SELECT dates,SUM(sold)as sold,sum(subtotal_amount)as total FROM `sales` WHERE dates BETWEEN '$monday' and '$sunday' and product='$product' GROUP by dates");
///production
$view_weekly_reportproduction = $db->fetch("SELECT dates,SUM(expected_no_of_blocks_produced)as target,sum(actual_no_of_blocks_produced)as actual FROM `production` WHERE dates BETWEEN '$monday' and '$sunday' and product='$product' GROUP by dates");

//monthly report sales

$view_monthly_reportsales = $db->fetch("SELECT t.dates,sum(sold) as sold,sum(subtotal_amount) as total, CASE WHEN dates =1 then 'week1' WHEN dates = 2 then 'week2' WHEN dates = 3 THEN 'week3' WHEN dates = 4 THEN 'week4'  WHEN dates = 5 then 'week5' END as weeks from (SELECT (WEEK(dates) - WEEK(DATE_FORMAT(dates,'%Y-%m-01')))+1 as dates,sum(sold) as sold,sum(subtotal_amount) as subtotal_amount FROM `sales` WHERE dates BETWEEN '$firstday' and '$lastday' and product='$product' group by dates)t GROUP by t.dates");

//monthly report production
$view_monthly_reportproduction = $db->fetch("SELECT t.dates,sum(target) as target,sum(actual) as actual, CASE WHEN dates =1 then 'week1' WHEN dates = 2 then 'week2' WHEN dates = 3 THEN 'week3' WHEN dates = 4 THEN 'week4' WHEN dates = 5 then 'week5' END as weeks from (SELECT (WEEK(dates) - WEEK(DATE_FORMAT(dates,'%Y-%m-01')))+1 as dates,sum(expected_no_of_blocks_produced) as target,sum(actual_no_of_blocks_produced) as actual FROM `production` WHERE dates BETWEEN '$firstday' and '$lastday' and product='$product' group by dates)t GROUP by t.dates");




 ?>





