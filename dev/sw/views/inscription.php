<?php
    namespace Models;
    

?>

<!DOCTYPE html>
<html>
<head>
	<title>Inscription</title>
	<meta charset="UTF-8"/>
        <link rel="stylesheet" type="text/css" href="../css/bootstrap-theme.css" />
        
        
</head>
<body>
    
    
    
        <form id="form_inscrpiton" method="POST" action="inscription">
            <fieldset>
                <legend>Informations de connexion</legend>
                <label> Identifiant:<input type="text" name="identifiant"></label><br/>
                  <label>  Mot de passe:<input type="password" name="mot_de_passe"></label><br/>
                    <label>Confirmer mot de passe : <input type="password" name="confirmer_mot_de_passe"></label><br/>
            </fieldset>
            <fieldset>
                <legend>Informations  générales</legend>
               <label> Raison Sociale: <input type="text" name="raison_sociale"/></label><br/>
               <label>Adresse e-mail:  <input type="mail" name="email"/></label><br/>
               <label> Confirmer adresse e-mail: <input type="mail" name="confirmer_email"/></label><br/>
               <label> Adresse postale: <input type="text" name="adresse"/></label><br/>
               <label> Complément d'adresse: <input type="text" name="adresse2"/></label><br/>
               <label> Ville: <input type="text" name="ville"/></label><br/>
                <input  class="boutons_formulaire" type="submit" name="btn_inscription" value="S'inscrire">
            </fieldset>
        </form>
    
</body>
</html>