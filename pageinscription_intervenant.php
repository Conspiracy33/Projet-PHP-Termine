<!DOCTYPE html>
<html>
<meta charset = "UTF-8">
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
<div class="contnair">
	<?php 
		$dbconn = mysqli_connect('localhost','root', '');
		mysqli_select_db($dbconn, 'projet_rechercheemploie');
		$lastID = '';
		$nom='';
		$prenom='';
		$telephone='';
		$fax='';
		$email='';
		$statutcotisation=0;

			if (count($_POST) > 0) 
			{
				$nom = $_POST['nom'];
				$prenom = $_POST['prenom'];
				$telephone= $_POST['telephone'];
				$fax= $_POST['fax'];
				$email = $_POST['email'];
				$statutcotisation = $_POST['statutcotisation'];
				$requete = "INSERT INTO intervenant(int_nom, int_prenom, int_telephone, int_fax, int_email, int_statutcotisation) VALUES ('".$nom."','".$prenom."', '".$telephone."', '".$fax."', '".$email."', '".$statutcotisation."')";
				mysqli_query($dbconn,$requete);
				
				$query = mysqli_query($dbconn, "SELECT LAST_INSERT_ID()");
				$dernierInscrit = mysqli_fetch_array($query);
				$lastID = $dernierInscrit[0];
				print('<meta http-equiv="refresh" content="1;url=test .php?id='.$lastID.'" />');
			}
		
	
		?>
        <h2>Inscription Intervenant</h2>
		<form method="post" action="<?php $_PHP_SELF ?>" class="formulaire_intervenant">

		

			<label for="nom"><i class="fa fa-user"></i> Nom</label> : <br /><input type="text" name="nom" id="nom" value="<?php print($nom); ?>"/><br /><br />
			<label for="prenom"><i class="fa fa-user"></i> Prénom </label> : <br /><input type="text" name="prenom" id="prenom" value="<?php print($prenom); ?>"/><br /><br />
			<label for="telephone"><i class="fa fa-phone"></i> Numéro Téléphone</label> : <br /><input type="phone" name="telephone" id="telephone" value="<?php print($telephone); ?>"/><br /><br />
			<label for="fax"><i class="fa fa-fax"></i> Fax</label> : <br /><input type="phone" name="fax" id="fax" value="<?php print($fax); ?>"/><br /><br />
			<label for="email"><i class="fa fa-envelope"></i> Email</label> : <br /><input type="text" name="email" id="email" value="<?php print($email); ?>"/><br /><br />
			<label for="statutcotisation"><i class="fa fa-money"></i> Statut cotisation</label> : <br /><input type="number" name="statutcotisation" id="statutcotisation" value="<?php print($statutcotisation); ?>"/><br /><br />

			<div class="bouton_annuler">
				<input type="reset" value="Annuler" onclick="document.location.href='preinscription.php'"/></a>
			</div><br />
			<div class="add_button">
				<input type="submit" value="Valider"/> </a>
			</div>
    </div>
		</form>
	</body>
<div id="copyright">
            <h8><img class="img_copi" src="img/epsi.png"> - &copy; 2016 Compfundation - <img class="img_copi" src="img/logo2.png"></h8>
        </div>
</html>