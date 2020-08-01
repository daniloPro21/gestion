<?php
        session_start();
    $_SESSION['message']='';
        include ('..\modele\connection.php');

        if (isset($_POST['register'])){ 

             if(!empty($_POST['name']) AND !empty($_POST['email']) AND !empty($_POST['matricule']) AND !empty($_POST['pass']) AND !empty($_POST['re_pass'])){

            $usename= $_POST['name'];
            $email= $_POST['email'];
            $matricule= $_POST['matricule'];
            $mdp= sha1($_POST['pass']);
            $mdp2= sha1($_POST['re_pass']);
            $ava=$_POST['avatar'];

                    if ($mdp == $mdp2){

                           $sql= "INSERT INTO resourceh(matricule, login, email, mdp, avatar) VALUES ('$matricule', '$usename', '$email', '$mdp', '$ava')";
                         // var_dump($sql);
                            //die();
                           $res=mysqli_query($db,$sql);

                           $_SESSION['usename'] = $usename;
                           $_SESSION['avatar'] = $ava;
                        $_SESSION['message'] = 'ENREGISTREMENT REUSSI'; 
                           echo '<script>alert("FELICITATION")</script>';

                    }
        }else{


            echo '<script>alert("VEUILLEZ REVOIR VOS INFORMATIONS")</script>';
        }
                }
?>  
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Sign Up Form by Colorlib</title>

    <!-- Font Icon -->
    <link rel="stylesheet" href="fonts/material-icon/css/material-design-iconic-font.min.css">

    <!-- Main css -->
    <link rel="stylesheet" href="css/style.css">
</head>

<body>
        <form class="form-group" method="post" action="register.php">
    <div class="main">

        <!-- Sign up form -->
        <section class="signup">
            <div class="container">
                <div class="signup-content">
                    <div class="signup-form">
                        <h2 class="form-title">Inscription</h2>
                        <form method="POST" class="register-form" id="register-form">
                            <div class="form-group">
                                <label for="name"><i class="zmdi zmdi-account material-icons-name"></i></label>
                                <input type="text" name="name" id="name" placeholder="Your Name" required/>
                            </div>
                            <div class="form-group">
                                <label for="email"><i class="zmdi zmdi-email"></i></label>
                                <input type="email" name="email" id="email" placeholder="Your Email" required />
                            </div>
                            <div class="form-group">
                                <label for="email"><i class="zmdi zmdi-key"></i></label>
                                <input type="matricule" name="matricule" id="email" placeholder="Matricule" required />
                            </div>
                            <div class="form-group">
                                <label for="pass"><i class="zmdi zmdi-lock"></i></label>
                                <input type="password" name="pass" id="pass" placeholder="Password" required/>
                            </div>
                            <div class="form-group">
                                <label for="re-pass"><i class="zmdi zmdi-lock-outline"></i></label>
                                <input type="password" name="re_pass" id="re_pass" placeholder="Repeat your password" required/>
                            </div>
                             <div class="form-group">
                                <label for="avatar"><i class="zmdi zmdi-lock-outline"></i></label>
                                <input type="file" name="avatar" id="avatar" placeholder="choose your profil" required/>
                            </div>
                            <div class="form-group">
                                <input type="checkbox" name="agree-term" id="agree-term" class="agree-term" required />
                                <label for="agree-term" class="label-agree-term"><span><span></span></span>I agree all statements in  <a href="#" class="term-service">Terms of service</a></label>
                            </div>
                            <div class="form-group form-button">
                                <input type="submit" name="register" id="signup" class="form-submit" value="Valide" required/>
                            </div>
                        </form>
                    </div>
                    <div class="signup-image">
                        <figure><img src="images/signup-image.jpg" alt="sing up image"></figure>
                        <a href="../index.php" class="signup-image-link">I am already member</a>
                    </div>
                </div>
            </div>
        </section>
</form>

    <!-- JS -->
    <script src="vendor/jquery/jquery.min.js"></script>
    <script src="js/main.js"></script>
</body><!-- This templates was made by Colorlib (https://colorlib.com) -->
</html>