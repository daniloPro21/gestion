 <?php
                    include ("connection.php");
                      $rep= 'SELECT * FROM employer,exercer WHERE employer.matricule=exercer.matricule';
                      $result= mysqli_query($db,$rep);
                      $i= 1;
                      while ($data=mysqli_fetch_assoc($result)){
              
                        echo "<tr>";
                        echo "<th align='center' >".$i."</th>";
                        echo "<td>".$data['nom']."</td>";
                        echo "<td>".$data['matricule']."</td>";
                        echo "<td>".$data['poste']."</td>";
                        echo "<td>".$data['age']."</td>";
                        echo "<td>".$data['status']."</td>";
                        echo "<td>".$data['salaire_b']."</td>";
                        echo "<td><a class='btn btn-danger' href=../../modele/edit.php?action=delete&id=".$data['matricule'].">Supprimer</a></td>";
                         echo "<td><a class='btn btn-primary' href=../../modele/edit.php?action=edit&id=".$data['matricule'].">Modifier</a></td>";
                        echo "</tr>";
                        $i++;
                        }

                  ?>