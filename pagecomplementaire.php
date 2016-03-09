<!DOCTYPE html>
<html>
<head>
    <title>CompFundation | Accueil</title>
    <meta charset="UTF-8">
    <link rel="stylesheet" type="text/css" href="style.css">
</head>
<body>
            <?php
            $dbconn=mysqli_connect('localhost','root','');
            mysqli_select_db($dbconn,'projet_rechercheemploie');

            $SQLQuery = "SELECT * FROM domaine";
            $SQLResult = mysqli_query($dbconn,$SQLQuery);
if(empty($_POST))
                {
            ?>
                <div class="contnair">
                    <form action="<?php $_PHP_SELF ?>" method="post">
                        <h4>Domaines de compétences :</h4>
                        <?php
                        $Intervenant = "0";                 
                        if(isset($_GET['id']))
                        {
                            $Intervenant = $_GET['id'];
                            $recupNom = "SELECT int_nom, int_prenom FROM intervenant WHERE int_id =".$_GET['id'];
                            $row = mysqli_fetch_row(mysqli_query($dbconn, $recupNom));
                            $nom = $row[0];
                            $prenom = $row[1];
                            print('<h5>Suite de l\'inscription de : '. $prenom . ' ' . $nom .'</h5>');
                        }          
                        $Querydomaine = mysqli_query($dbconn, "SELECT * FROM domaine");
                        $compteur = 1;
                        while($row = mysqli_fetch_assoc($Querydomaine))
                        {
                            print("<input name='checkbox[]' id='chkbx".$compteur."' type='checkbox' value='".$row['dom_id']."'>".$row['dom_libelle']."");
                            
                            $Querylvl = mysqli_query($dbconn, "SELECT * FROM niveau");
                            print('<select name="niveau[]" >');
                            while($row2 = mysqli_fetch_assoc($Querylvl))
                            {
                                print('<option value="'. $row2['niv_id'] . '">'. $row2['niv_libelle'] . '</option>'); 
                            }
                            $compteur += 1;
                            
                        }
                        mysqli_free_result($Querydomaine);
                        print('
                        <input class="btVal" type="submit" text="Valider">
                        </form>');
                    }   
                    ?>
                    </form>
                </div>
        </body>
</html>