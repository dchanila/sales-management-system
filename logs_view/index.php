<?php include '../header.php';

include_once("../backend/client.php");
 
 if( $rec->num_rows > 0){

 }
?>

<div class="contents">
	<h6 style="padding: 6px;">logs</h6>
<div class="table_contain">
<table class="batles_pro">

  <tr>  
                        <th scope="col">User name</th>
                        <th scope="col">activity</th>
                        <th scope="col">Time and date</th>   
  </tr>
  <?php  while( $record = $rec->fetch_assoc()) { ?>
  <tr>
                        
                        <td><?php echo   $record['username']; ?></td>
                        <td><?php echo $record['activity']; ?></td>
                        <td><?php echo $record['times'];; ?></td>
  </tr>
 <?php } ?>
</table>

</div>
</div>
<?php include '../forter.php';?>
					