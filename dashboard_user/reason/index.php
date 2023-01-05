<?php include '../header.php';
if(isset($_GET['view_reasons'])){
      $id = $_GET['view_reasons'];
      $sql  ="SELECT * FROM production WHERE id= $id ";
      $rec= $db->fetch($sql);
      $record = mysqli_fetch_array( $rec);
      $id=$record['id'];
      $idr=$record['id'];
      $timestampss=$record['tmz'];
      $reasons =  $record['reasons'];
      $fullnames =  $record['usersname'];
      $sqls  ="SELECT * FROM users WHERE username= '$fullnames' ";
      $reco= $db->fetch($sqls);
      $recordfullname= mysqli_fetch_array( $reco);
      $fullnames=$recordfullname['first_name']." ".$recordfullname['last_name'];
      //view comment
    $view_comment = $db->fetch(" SELECT * FROM comment WHERE reasons_id='$id'");

  }
if($view_comment->num_rows > 0){

 }
?>
<div class="contents" id="contents">
	<h6 style="padding: 6px;">Reason</h6>
	<div class="comment_container">
		<div class="comments_reason">
			<div style="position: relative; ">
			<div style="float: left;margin-bottom: 5px; margin-right: 5px;">
				<img src="../asset/img/head_wet_asphalt.png" alt="Linda Miller" class="img-fluid rounded-circle imgsize" />
			</div>
			<div class="reasonCnt">
			<div >
				<?php echo $fullnames." "." "." ".$timestampss;?>
               
			</div>
			<p style="color:white;font-size:14px;">
			<?php echo $reasons."."; ?>
			<br>
				<a href="#" onclick="dsy_input()">comment </a>
			
			 
			</p>

			</div>
            </div>
			<div class="type_comment" id="type_comment">
				<form action="../backend/client.php" method="post">
					<input type="hidden" name="reason_id" value="<?php echo $idr ?>">
					<input type="hidden" name="reason" value="<?php echo $reasons; ?>">
					<textarea placeholder="Comment...." name="comment" required></textarea><br>
					<input type="submit" name="comnt" value="Comment" >
				</form>
			</div>
			<div style="margin-top: 40px;">
				<?php  while($row = $view_comment->fetch_assoc()) { ?>

				<div class="comments">
					<div style="float: left;margin-bottom: 5px; margin-right: 5px;">
				<img src="../asset/img/head_wet_asphalt.png" alt="profile" class="img-fluid rounded-circle imgsizes" />
			</div>
					<p style="margin-bottom: 1px;color: #040114;">
						<?php echo $row['username']."  ".$row['timescom']; ?>
					</p>
					<p style="color: white;margin-bottom: 1px;"><?php echo $row['comment']; ?></p>
				<!-- 	<a style="color:#292b3d;font-size: 12px; margin-left: 35px;"href="#" >reply</a> -->
					
				</div>
				 <?php } ?>
			</div>
	
			<div >
				
			</div>
		</div>
	</div>
</div>
<?php include '../forter.php';?>