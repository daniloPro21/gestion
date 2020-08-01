<?php
        session_start();
        $session['message']='';
        include ('connection.php');

        if (isset($_POST['valider'])){ 

             if(!empty($_POST['matricule'])AND !empty($_POST['num_con'])  AND !empty($_POST['nom']) AND !empty($_POST['prenom']) AND !empty($_POST['age'])AND !empty($_POST['sexe'])  AND !empty($_POST['cni']) AND !empty($_POST['status']) AND !empty($_POST['salaireb']) AND !empty($_POST['prime']) AND !empty($_POST['salairetle'])  AND !empty($_POST['poste'])){

            $matricule= $_POST['matricule'];
            $num_con=$_POST['num_con'];
            $nom= $_POST['nom'];
            $prenom= ($_POST['prenom']);
            $age= ($_POST['age']);
            $sexe= ($_POST['sexe']);
            $cni= ($_POST['cni']);
            $status= ($_POST['status']);
            $salaireb= ($_POST['salaireb']);
            $prime= ($_POST['prime']);
            $salairetle= ($_POST['salairetle']);
            $poste= ($_POST['poste']);
            $sql= "INSERT INTO employer (matricule, nom, prenom, age, sexe, cni, status, salaire_b, prime, salaire_tle) VALUES ('$matricule', '$nom', '$prenom', '$age','$sexe', '$cni', '$status', '$salaireb', '$prime', '$salairetle')";
            $sql1="INSERT INTO exercer (matricule, poste) VALUES ('$matricule', '$poste')";
            $sql2="INSERT INTO posseder (matricule, num_con) VALUES ('$matricule', '$num_con')";
              $reusit=mysqli_query($db,$sql);
              $reusit1=mysqli_query($db,$sql1);
              $reusit2=mysqli_query($db,$sql2);

                 if ($reusit){

                   echo '<script>alert("Enregistrement ressusit");window.location="../vue/Admin/tables.php"</script>';

                     }else{
               echo '<script>alert("verifiez vos champs");window.location="../vue/Admin/tables.php"</script>';

            }
                }
            }


?>  