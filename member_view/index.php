<?php include '../header.php';

include_once("../backend/client.php");
 
 if($member_views->num_rows > 0){

 }
?>

<div class="contents">
	<h6 style="padding: 6px;">Members</h6>
<div class="table_contain">
<table class="batles_pro">

  <tr>  
                        <th scope="col">No</th>
                        <th scope="col">First name</th>
                        <th scope="col">Last name</th>
                        <th scope="col">User name</th>
                        <th scope="col">Position</th>
                        <th scope="col">Gender</th>
                        <th scope="col">Status</th>
                        <th scope="col">Activities</th>
                        <th colspan="2" style="text-align: center;">Action</th>
                        
                      
    
  </tr>
  <?php  while($row = $member_views->fetch_assoc()) { ?>
  <tr>


                        <td><?php echo $row['id']; ?></td>
                        <td><?php echo $row['first_name']; ?></td>
                        <td><?php echo $row['last_name']; ?></td>
                        <td><?php echo $row['username']; ?></td>
                        <td><?php echo $row['position']; ?></td>
                        <td><?php echo $row['gender']; ?></td>
                        <td><?php echo $row['state']; ?></td>
                         <td><span class="memb"><i class="fa fa-eye" aria-hidden="true"></i></span><a href="../logs_view?view_logs=<?php echo $row['username']; ?>">view </a></td>
                        <td><a href="../register_edit?edit_member=<?php echo $row['id']; ?>" class="btns"><span class="memb"><i class="fa fa-pencil-square-o" aria-hidden="true"></i></span> Edit</a></td>
                        <td><a href="../member_view?delete=<?php echo $row['id']; ?>" class="btns_danger"><span class="memb"><i class="fa fa-trash" aria-hidden="true" ></i></span> Delete</a></td>

    
  </tr>
  <?php } ?>
</table>

</div>
</div>
<?php include '../forter.php';?>
					