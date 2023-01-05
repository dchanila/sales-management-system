  <?php include '../header.php';
  
 if($product_sales->num_rows > 0){

 }
  ?>

  <div class="contents" id="contents">
    <h6 style="padding: 6px;"><?php echo $product; ?> Sales</h6>
  <div class="table_contain">
  <table class="batles_pro">
    <tr>
                          <th >Date</th>
                          <th >Product</th>
                          <th >Open Balance</th>
                          <th >Produced</th>
                          <th >Sold</th>
                          <th >Price per each</th>
                          <th >Subtotal</th>
                          <th >Closed</th> 
    </tr>
    <?php  while($row = $product_sales->fetch_assoc()) { ?>
    <tr>









     
                         
                          <td><?php echo $row['dates']; $datess=$row['dates']; ?></td>
                          <td><?php echo $row['product']; $products= $row['product']; ?></td>
                          <td><?php echo $row['open_with'];?></td> 
                          <td><?php echo $row['produce'];?></td>
                          <td><?php echo $row['sold'];array_push($sold, $row['sold']); ?></td>
                          <td><?php echo $row['price_per_each'];?></td>
                          <td><?php echo $row['subtotal_amount'];array_push($subtotal_amountsold, $row['subtotal_amount']); ?></td>
                          <td><?php echo $row['closed_with']; ?></td>
       
    </tr>
    <?php } ?>

     <tr>
     
                          
                          <td><strong><?php echo $datess;?></strong></td>
                          <td><strong><?php echo $product;?></strong></td>
                          <td><strong><?php echo $open_wth;?></strong></td>
                          <td><strong><?php echo $prodce;?></strong></td>
                          <?php 
                           $totalsold=array_sum($sold); ?>
                          <td><strong><?php echo ($totalsold)." ".$product; ?></strong></td>
                          
                          <td><strong>Tsh:-</strong></td>
                          <?php 
                           $totalamountsold=array_sum($subtotal_amountsold)."Tsh"; ?>
                          <td><strong><?php echo ($totalamountsold); ?></strong></td>
                          <td><strong><?php echo $closed." ".$product ?></strong></td>
                          
                          
      
    </tr>
    
  </table>
  
  </div>
  </div>


  
  <?php include '../forter.php';?>