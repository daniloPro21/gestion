<?php 
	session_start();

include('connnection.php');

 ?>
 <div class="body content">
 	<div class="welcome">
 		<div class="alert alert-succes"> <?= $_SESSION['message']?></div>
 		<span class="user"><img src='<?= $_SESSION['avartar']?>' </span><br/>
 		Welcome<span class="user"><img src='<?= $_SESSION['username']?>' </span><br/>

 	</div>
 		<?php 
 			$sql= "SELECT " 

 			 ?>
 </div>