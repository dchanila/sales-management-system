<?php 
include '../header.php';
if($view_product->num_rows > 0){

 }
?>
<div class="contents" id="contents">
<h6 style="padding: 6px;">Dashboard Option</h6>
<div class="report_option">
	 <?php  while($row = $view_product->fetch_assoc()) { ?>
	<a href="../Dashboard?product=<?php  echo $row['product_name']; ?>" class="report_choose">
		 <?php  echo $row['product_name']; ?>
	</a>
	
	  <?php } ?>
	
</div>


</div>
<?php include '../forter.php';?>