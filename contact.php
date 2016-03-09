<!DOCTYPE html>
<html>
<head>
	<title>CompFundation | Contact</title>
	<meta charset="UTF-8">
	<link rel="stylesheet" type="text/css" href="style.css">
	<link rel="stylesheet" href="font-awesome-4.5.0/css/font-awesome.css">
	<link rel="stylesheet" href="font-awesome-4.5.0/css/font-awesome.min.css">
	<link rel="stylesheet" href="font-awesome-4.5.0/css/font-awesome-animation.css">
	<link rel="stylesheet" href="font-awesome-4.5.0/css/font-awesome-animation.min.css">
</head>
<body>
	<div class="header">
		<img class="logo" src="img/logo2.png"></a>
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
		<div id="contact">
			<h2>Formulaire de contact</h2>
			<label for="Prénom"><i class="fa fa-user"></i> Pr&eacute;nom </label> : <br/> <input type="text" name="Prénom" id="Prenom" class="biz" placeholder="Ex: Jean"/> </select> 
				<br/><br/>
			<label for="Nom"><i class="fa fa-user fa-spin-hover"></i> Nom </label> :<br/><input type="text" name="Nom" id="Nom" class="biz" placeholder="Ex: Dupont"/> </select> 
				<br/><br/>
			<label for="Admail"><i class="fa fa-envelope"></i> Adresse Mail</label> : <br/><input type="text" name="Admail" id="Admail" class="bizo" placeholder="Ex: Jean.Dupont@gmail.com"/> </select> 
				<br/><br/>
			<form action="pagephp.php" method="post">
			 	<div>
			   		<label for="mail_msg"><i class="fa fa-pencil"></i> Votre message :</label><br>
			   		<textarea id="mail_msg" name="message" cols="50" rows="6" class="bizo" placeholder="Ex: Lorem ipsum dolor sit amet, consectetur adipiscing elit. Integer pharetra sed dolor nec rutrum. Nullam non est non urna lacinia aliquet hendrerit nec ipsum."></textarea>
	 			</div>
	 	</div>
	 <div>
	    <input type="submit" value="Envoyer" class="bi">
	 </div>
	</form>
	</div>
<div id="copyright">
            <h8><img class="img_copi" src="img/epsi.png"> - &copy; 2016 Compfundation - <img class="img_copi" src="img/logo2.png"></h8>
        </div>
</body>
</html>