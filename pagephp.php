<?php
ini_set('SMTP','smtp.srf.fr');
ini_set('smtp_port','25');
mail('villeneuvethibaut@gmail.com', 'Mail depuis le site',

'Le mail envoyé depuis le site' . "\n" . $_POST['message']);
?>

