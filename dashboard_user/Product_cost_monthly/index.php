  <?php include '../header.php';
  $totalcostmonth=array();
  $totalproctioncostmonth="";
 if($view_product_cost_monthly->num_rows > 0){

 }
  ?>

  <div class="contents" id="contents">
    <h6 style="padding: 6px;">production cost for <?php echo $product;?></h6>
  <div class="table_contain">
  <table class="batles_pro">
    <tr>
                          <th >Date</th>
                          <th >Product</th>
                          <th >Type of charge</th>
                          <th >Quantity</th>
                          <th >Per each</th>
                          <th >Total</th>
      
    </tr>
    <?php  while($row = $view_product_cost_monthly->fetch_assoc()) { ?>
    <tr>
     
                          <td><?php echo $row['dates']; $datess=$row['dates']; ?></td>
                          <td><?php echo $row['product'];  ?></td>
                          <td><?php echo $row['type_of_charge'];  ?></td>
                          <td><?php echo $row['quantity'];?></td>
                          <td><?php echo $row['per_each']; ?></td>
                          <td><?php echo $row['total']; array_push($totalcostmonth, $row['total']); ?></td>     
    </tr>
    <?php } ?>
    <tr>
     
                          <td></td>
                          <td></td>
                          
                          <td></td>
                          
                          <td></td>
                          
                          
                          
                          <td>Total</td>
                          <?php 
                           $totalproctioncostmonth=array_sum($totalcostmonth); ?>
                          <td><strong><?php echo ($totalproctioncostmonth)." Tsh "; ?></strong></td>
                         
                          
     
 
    </tr>
  </table>
  
  </div>
  </div>

  <?php include '../forter.php';?>