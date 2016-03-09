<!DOCTYPE html>
<html>

<head>
	<title>CompFundation | Inscription Intervenant</title>
	<link rel="stylesheet" type="text/css" href="style.css">
	<link rel="stylesheet" href="font-awesome-4.5.0/css/font-awesome.css">
	<link rel="stylesheet" href="font-awesome-4.5.0/css/font-awesome.min.css">
	<link rel="stylesheet" href="font-awesome-4.5.0/css/font-awesome-animation.css">
	<link rel="stylesheet" href="font-awesome-4.5.0/css/font-awesome-animation.min.css">
	<link rel="shortcut icon" type="image/x-icon" href="img/favicon2.ico" />
</head>
<body>
	<div class="header">
		<a href="index.php"><img class="logo" src="img/logo2.png"></a>
		<h1>Bien chercher pour bien trouver</h1>
	</div>
	<nav class="test">
		<ul>
			<li><a class="item faa-parent animated-hover" href="index.php"><i class="fa fa-home faa-burst"></i> Accueil</a></li>
  			<li>
  				<a class="item faa-parent animated-hover" href="#"><i class="fa fa-plus-square faa-burst"></i> Inscription</a>
  				<ul>
  					<li><a href="pageinscription_organismefinale.php">Organisme</a></li>
  					<li><a href="pageinscription_intervenant.php">Intervenant</a></li>
  				</ul>
  			</li>
  			<li>
    			<a class="item faa-parent animated-hover"  href="#"><i class="fa fa-search faa-burst"></i> Recherche</a>
    			<ul>
      				<li><a href="rechercheO.php">Organisme</a></li>
      				<li><a href="rechercheI.php">Intervenant</a></li>
    			</ul>
  			</li>
  			<li><a class="item faa-parent animated-hover" href="contact.php"><i class="fa fa-envelope faa-burst"></i> Contact</a></li>
		</ul>
	</nav>
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
                <h4>Rechercher un intervenant :</h4>
                <div>
                    <form action="<?php $_PHP_SELF ?>" method="post" class="insc_int">
                        <h4>Domaines de comp&eacute;tences :</h4>
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
                            
                            $Querylvl = mysqli_query($dbconn, "SELECT * FROM niveau ");
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
                    else
                    {
                    if(count($_POST) > 0)
                    {
                        if(isset($_GET['id']))
                        {
                            $Intervenant = $_GET['id'];
                        }
                        if(empty($_POST['checkbox']))
                        {
                            print('<script>alert("Il faut cocher au moins une compétence pour effectuer l\'inscription.");</script>');  
                        }
                        else
                        {
                            $TableauDom = $_POST['checkbox'];
                            $TableauNiv = $_POST['niveau'];
                            /*
                            print_r($_POST['checkbox']);
                            print_r($_POST['niveau']);*/
                            foreach($TableauDom as $Index=>$ID)
                            {
                                $QueryInter = "INSERT INTO estcompetent(comp_iddomaine, comp_idniveau, comp_idintervenant) VALUES('".$ID."', '".$TableauNiv[$Index]."', '".$Intervenant."')";
                                mysqli_query($dbconn, $QueryInter);
                            
                            }
                        }
                    }
                    }    
                    ?>
                    </form>
        </table>
    </div>
    <div id="copyright">
            <h8><img class="img_copi" src="img/epsi.png"> - &copy; 2016 Compfundation - <img class="img_copi" src="img/logo2.png"></h8>
        </div>
</html>