<!DOCTYPE html>
<html>
<head>
	<title>CompFundation | Accueil</title>
	<meta charset="UTF-8">
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
<table id="ro" align = center >
            <tr>
                <th> Nom organisme </th>
                <th> Ville organisme </th>
                <th> Code postal</th>
                <th> Date de l'annonce </th>
                <th> Desciption de l'annonce </th>
            </tr>
            <?php
                    $dbconn=mysqli_connect('localhost','root','');
                    mysqli_select_db($dbconn,'projet_rechercheemploie');
					
        //and then execute a sql query here
		$SQLQuery = "SELECT organisme.org_nom, organisme.org_ville, organisme.org_codepostal, recherche.rec_date, recherche.rec_description ";
		$SQLQuery .= "FROM organisme LEFT OUTER JOIN recherche ON organisme.org_id = rec_idorganisme ";
		$SQLQuery .= "LEFT OUTER JOIN concerne ON recherche.rec_id = concerne.conc_idrecherche ";
		$SQLQuery .= "LEFT OUTER JOIN domaine ON concerne.conc_iddomaine = domaine.dom_id ";
		//$SQLQuery .= "WHERE recherche.rec_active = 1";
		
		$SQLResult = mysqli_query($dbconn, $SQLQuery);
		
		while($row=mysqli_fetch_assoc($SQLResult))
		{
			print('<tr>');
			print('<td>'.$row['org_nom'].'</td><td>' .$row['org_ville'].'</td><td>'.$row['org_codepostal'].'</td><td>'.$row['rec_date'].'</td><td>'.$row['rec_description'].'</td>');
		}
		mysqli_free_result($SQLResult);
           
            
            ?>
            
            
        </table>
            
                <div class="push"></div>
            </div>
        </div>   

		<p></p>
	</div>
</body>
<div id="copyright">
            <h8><img class="img_copi" src="img/epsi.png"> - &copy; 2016 Compfundation - <img class="img_copi" src="img/logo2.png"></h8>
        </div>
</html>