<?php
	
		 

		 	session_start();
		 	$_SESSION ['message'] ='';

		 	include ("connection.php");
			if (isset($_POST['valider'])) {

				$user=mysqli_real_escape_string($db,$_POST['username']);
				$pass=mysqli_real_escape_string($db,sha1($_POST['password']));

					$query= "SELECT * FROM resourceh where login='$user' AND mdp='$pass'";
					$result=mysqli_query($db,$query);

					$count = mysqli_num_rows($result);
					if($count == 1 )  {
						  $_SESSION['message'] = $user;
						  echo'<script>alert("Welcome")</script>';
						header("location:../vue/Admin/admin.php");
						
					}	

					else{

						echo'<script>alert("Mot de Passe ou login incorrect")</script>';
						header("location: ../index.php");
					}	
						}

				

//evounamjf@gmail.com

?>