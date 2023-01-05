<?php 

include_once("backend/client.php");

if(empty($_SESSION["username"])){

header("Location:index.php");
exit();
}
?>

<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>Dashboard</title>



<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
 <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">



    <!-- Custom fonts for this template-->
    
    <!-- Custom styles for this template-->
    <script src='https://kit.fontawesome.com/a076d05399.js' crossorigin='anonymous'></script>
     <link href="../asset/css/sb-admin-2.min.css" rel="stylesheet">
    <link href="../asset/css/sb-admin-2.min.css" rel="stylesheet">
    <link href="../asset/css/style.css" rel="stylesheet">
    <link href="../asset/css/styleMediaquery.css" rel="stylesheet">
    
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
     <style>

</style>

</head>

<body onload="stat()">
<div class="containers">


<!--header bar start here -->
<div class="headerbar"  >
    <div class="line_con" onclick="navss()">
        <div class="line"></div>
        <div class="line"></div>
        <div class="line"></div>
    </div>

    <div class="comp_name"><img src="../asset/img/logos.png" class="imgs"><p class="logo"><strong>Wandeline</strong></p></div>
    <div>
        <form class="search_form">
            <div class="search">
                <select name="search">
                    <option>search...</option>
                    <option>sea</option>
                </select>
                <input type="submit" name="search" value="Search">
            </div>
           
        </form>
    </div>
    <div class="notification"><span><i class="fa fa-bell-o" aria-hidden="true"></i></span></div>
</div>
<!--header bar end here -->
<div class="sidebars" id="sidebars">
    <h6 class="menu" id="menu">Menu</h6>
<ul class="sidebars_ul" id="sidebars1">
  <li><a href="../dashboard_option"><span><i class="fa fa-tachometer" aria-hidden="true"></i></span>  Dashboard</a></li>
  <li><a href="../production_option"><span><i class="fa fa-industry" aria-hidden="true"></i></span>  Production</a></li>
  <li><a href="../product_sales"><span><i class="fa fa-line-chart" aria-hidden="true"></i></span>  Sales</a></li>
  <li><a href="../material_option"><span><i class="fa fa-cart-arrow-down" aria-hidden="true"></i></span>  Materials</a></li>
  <li><a href="../truck_option"><span><i class="fa fa-car" aria-hidden="true"></i></span>  Vehicle</a></li>
  <li><a href="../site_cost_option"><span><i class="fa fa-building-o" aria-hidden="true"></i></span>  Site</a></li>
   <li><a href="../order"><span><i class="fa fa-first-order" aria-hidden="true"></i></span>  Order</a></li>
  <li><a href="../finance"><span><i class="fa fa-money" aria-hidden="true"></i></span>  Finance</a></li>
  <li><a href="../report"><span><i class="fa fa-file" aria-hidden="true"></i></span>  Report</a></li>
  <li><a href="../member_view?user_names=<?php echo $_SESSION["username"];?>"><span><i class="fa fa-users" aria-hidden="true"></i></span>  Members</a></li>
  <li><a href="../dashboard_option?logout='1'"><span><i class="fa fa-sign-out" aria-hidden="true"></i></span>  Logout</a></li>
</ul>  
<ul class="sidebars_ul2" id="sidebars2">
  <li><a href="../dashboard_option"><span><i class="fa fa-tachometer" aria-hidden="true"></i></span>  </a></li>
  <li><a href="../production_option"><span><i class="fa fa-industry" aria-hidden="true"></i></span>  </a></li>
  <li><a href="../product_sales"><span><i class="fa fa-line-chart" aria-hidden="true"></i></span>  </a></li>
  <li><a href="../material_option"><span><i class="fa fa-cart-arrow-down" aria-hidden="true"></i></span>  </a></li>
  <li><a href="../truck_option"><span><i class="fa fa-car" aria-hidden="true"></i></span>  </a></li>
  <li><a href="../site_cost_option"><span><i class="fa fa-building-o" aria-hidden="true"></i></span>  </a></li>
  <li><a href="../order"><span><i class="fa fa-first-order" aria-hidden="true"></i></span>  </a></li>
  <li><a href="../finance"><span><i class="fa fa-money" aria-hidden="true"></i></span>  </a></li>
  <li><a href="../report"><span><i class="fa fa-file" aria-hidden="true"></i></span>  </a></li>
  <li><a href="../member_view?user_names=<?php echo $_SESSION["username"];?>"><span><i class="fa fa-users" aria-hidden="true"></i></span></a></li>
  <li><a href="../dashboard_option?logout='1'"><span><i class="fa fa-sign-out" aria-hidden="true"></i></span> </a></li>
</ul>  
</div>

