<?php


?>

<!DOCTYPE html>
<html>
<head>
	<title>Inscription</title>
	<meta charset="utf-8"/>
	<link rel="stylesheet" type="text/css" href="css/bootstrap-theme.css" />
        <link rel="stylesheet" type="text/css" href="css/bootstrap.css" />
</head>
<body>
<form method="POST" action="inscription">
	Raison Sociale:  					<input type="text" name="raison_sociale"><br/>
	Identifiant:  						<input type="text" name="identifiant"><br/>
	Mot de passe:  	 					<input type="password" name="mot_de_passe"><br/>
	Confirmer mot de passe :  			<input type="password" name="confirmer_mot_de_passe"><br/>
	Adresse e-mail:  					<input type="mail" name="email"><br/>
	Confirmer adresse e-mail:  			<input type="mail" name="confirmer_email"><br/>
	Adresse postale:  					<input type="text" name="adresse"><br/>
	Complément d'adresse:  				<input type="text" name="adresse2"><br/>
	Ville: 								<input type="text" name="ville"><br/>
	<input type="submit" name="btn_inscription">

</form>

</body>
</html>