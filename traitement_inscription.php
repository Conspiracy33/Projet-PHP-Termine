<html>
<body>
 
 
<?php
$dbconn = mysqli_connect("localhost","root","mitou140597");
if (!$dbconn)
  {
  die('Connexion impossible: ' . mysqli_error());
  }
 
mysqli_select_db($dbconn,"recherche_emploie");
 
$sql="INSERT INTO intervenant (int_nom, int_prenom, int_telephone, int_fax, int_email)
VALUES
('$_POST[nom]','$_POST[prénom]','$_POST[telephone]','$_POST[fax]','$_POST[email]')";
mysqli_close($dbconn);
?>
</body>
</html>