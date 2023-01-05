  <?php include '../header.php';
  
 if($view_money_receivedmonthly->num_rows > 0){

 }
  ?>

  <div class="contents" id="contents">
    <h6 style="padding: 6px;">Money</h6>
  <div class="table_contain">
  <table class="batles_pro">
    <tr>        
                         
                          <th >Date</th>
                          <th >Open with</th>
                          <th >Receive from</th>
                          <th >Amount received</th>
                          <th >Total</th>
                          <th >Used</th>
                          <th >Closed</th>
      
    </tr>
    <?php  while($row = $view_money_receivedmonthly->fetch_assoc()) { ?>
    <tr>
     
                         
                          <td><?php echo $row['dates']; ?></td>
                          <td><?php echo $row['open_with'];  ?></td>
                          <td><?php echo $row['receive_from']; ?></td>
                          <td><?php echo $row['amount_received'];  ?></td>
                          <td><?php echo $row['total'];?></td>
                          <td><?php echo $row['used']; ?></td>
                          <td><?php echo $row['remaining']; ?></td>
                          
       
    </tr>
    <?php } ?>
    
  </table>
  
  </div>
  </div>


  <?php include '../forter.php';?>