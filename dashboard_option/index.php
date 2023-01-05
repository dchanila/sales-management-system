<?php 
include '../header.php';
$status=0;
$prodct='';
$dates1=date("Y-m-d");
if($view_product->num_rows > 0){

 }
?>
<div class="contents" id="contents">
<h6 style="padding: 6px;">Dashboard Option</h6>
<div class="report_option">
	 <?php  while($row = $view_product->fetch_assoc()) { ?>
	<a href="../Dashboard?product=<?php  echo $row['product_name']; ?>" class="report_choose" id="report_choose">
		 <?php  echo $row['product_name']; 
		  $prodct=$row['product_name'];
         $productionNotfcaion=$db->fetch("SELECT * FROM production WHERE dates='$dates1' and product='$prodct'");
         $product_salesnotfc = $db->fetch(" SELECT * FROM sales WHERE dates='$dates1' and product='$prodct'");
          if($productionNotfcaion->num_rows > 0 OR $product_salesnotfc->num_rows > 0){
            $status=1;
            echo "<p class='notfc'>"." +".$status."</p>";

           }
		 ?>
     
	</a>
	
	  <?php } ?>
	
		
	</div>
</div>


</div>
<?php include '../forter.php';?>