<!DOCTYPE html>
<html>
<head>
	<title>CompFundation | Recherche</title>
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
	<div class="contnair">
		<?php
   $dbconn=mysqli_connect('localhost','root','');
            mysqli_select_db($dbconn,'projet_rechercheemploie');
   $SQLQuery = "select * FROM domaine";
   $SQLResult = mysqli_query( $dbconn,$SQLQuery );
if(empty($_POST))
                {
                ?>
                <h2>Rechercher un intervenant :</h2>
                <div>
                    <form action="<?php $_PHP_SELF ?>" method="post" id="recherche_i">
                        <h4>Domaines de comp&eacute;tences :</h4>
                        <?php                            
                        $Querydomaine = mysqli_query($dbconn, "SELECT * FROM domaine");
                        
                        $compteur = 1;
                        print("<table><tr>");
                        while($row = mysqli_fetch_assoc($Querydomaine))
                        {
                            
                            print("<td><input name='checkbox[]' id='chkbx".$compteur."' type='checkbox' value='".$row['dom_id']."'>".$row['dom_libelle']."");
                            
                            $Querylvl = mysqli_query($dbconn, "SELECT * FROM niveau");
                            print('<select name="niveau[]" >');
                            print('<option value="0">Tous les niveaux</option>');
                            while($row2 = mysqli_fetch_assoc($Querylvl))
                            {
                                print('<option value="'. $row2['niv_id'] . '">'. $row2['niv_libelle'] . '</option>'); 
                            }
                            
                            print('</select>');
                            if($compteur % 3 == 0)
                            {
                                print("</td></tr><tr>");
                            }
                            else
                            {
                                print("</td>");
                            }
                            $compteur += 1;
                            
                        }
                        print("</tr></table>");
                        mysqli_free_result($Querydomaine);
                        print('
                        <input class="btVal" type="submit" text="Valider">
                        
                    </form>');
                }
                else
                {
                    if(count($_POST) > 0)
                    {
                        if(empty($_POST['checkbox']))
                        {
                            print('<script>alert("Il faut cocher au moins une compétence pour effectuer la recherche.");</script>');  
                        }
                        else{
                            $niveauArr = $_POST['niveau'];
                           
                            foreach($_POST['checkbox'] as $domIndex=>$idDom)
                            {
                                $recupNomDom = mysqli_fetch_assoc(mysqli_query($dbconn, "SELECT dom_libelle FROM domaine WHERE dom_id = " . $idDom));
                                $nomDom = $recupNomDom['dom_libelle'];
                                $QueryInter = "SELECT * FROM intervenant";
                                
                                print('<h4>Domaine : ' .$nomDom . '</h4>');
                                
                                if ($niveauArr[$domIndex] == 0)
                                {
                                    $QueryInter = "SELECT * FROM intervenant INNER JOIN estcompetent ON int_id = comp_idintervenant INNER JOIN niveau ON comp_idniveau = niv_id WHERE comp_iddomaine = " .$idDom. " ORDER BY comp_iddomaine";
                                }
                                else
                                {
                                    $QueryInter = "SELECT * FROM intervenant INNER JOIN estcompetent ON int_id = comp_idintervenant INNER JOIN niveau ON comp_idniveau = niv_id WHERE comp_idniveau = " .$niveauArr[$domIndex]. " AND comp_iddomaine = " .$idDom;
                                }
                                
                                print('<ul id="listeInter">');
        
        ?>
        <table align = center id="roi">
        <tr>
        <th class="rech_i"> Nom </th>
        <th class="rech_i"> Pr&eacute;nom</th>
        <th class="rech_i"> Niveau</th>
        <th class="rech_i"> E-mail</th>
        <th class="rech_i"> T&eacute;l&eacute;phone</th>
    <?php
                                
                                $Result = mysqli_query($dbconn, $QueryInter);
                                while($row = mysqli_fetch_assoc($Result))
                                {
                                    print('<tr><td class="reche_i"><a href="contact.php?idInt='.$row['int_id'].'"><li>'.$row['int_nom'].'<td class="reche_i">'.$row['int_prenom']. '</td><td class="reche_i">'. $row['niv_libelle'] .'</td><td class="reche_i">'. $row['int_telephone'] .'</td><td class="reche_i">'. $row['int_email'] .'</td></li></a></tr>');
                                }
                                print('</ul>');
                            }
                          
                            mysqli_close($dbconn);
                        }   
                    }              
                }
                ?>

            
            
        </table>

</div>
        </div>
        <div id="copyright">
            <h8><img class="img_copi" src="img/epsi.png"> - &copy; 2016 Compfundation - <img class="img_copi" src="img/logo2.png"></h8>
        </div>
</body>
</html>