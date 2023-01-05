




<?php if(count($error) > 0 ) : ?>


	<div  class="error">
	<?php foreach ($error AS $errors) : ?>
		<p>
		<?php  echo $errors;?>	
	
		</p>
		<?php endforeach  ?>
		</div>

	
<?php endif  ?>