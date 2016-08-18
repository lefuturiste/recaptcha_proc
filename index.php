<?php
/*WARNING  EXEMPLE !!*/
/*Système de validation de formulaire avec Google Recaptacha https://www.google.com/recaptcha/ 
	+système de tableau d'erreurs
	
	@author lefuturiste.fr
	@date 18/08/2016
	@php 5.0

	Besoin de l'api : https://github.com/google/recaptcha

*/
if (isset($_POST['btn']) && !empty($_POST['text'])) {//si le formulaire est envoyé
		
	require('recaptcha/autoload.php');//on charge l'api préfaite pour le Captcha prit sur GitHub https://github.com/google/recaptcha

	$recaptcha = new \ReCaptcha\ReCaptcha("6Ld1wCYTAAAAAI-V5LK59TIA3XqvjJsNZkgutO8d");//Création d'un nouvelle objet avec comme paramètre la clé secrète du site

	$resp = $recaptcha->verify($_POST['g-recaptcha-response']);//on demande une la réponse (vérification)

	$errors = [];
	if ($resp->isSuccess()) {//si la vérification est valide
	    $success = '<div class="alert alert-success">Success!</div>';
	} else {//sinon
		$errors['error-recaptcha'] = 'Le recaptcha est incorect !';//Le tableau prend une erreur
	}

}
?>
<!DOCTYPE html>
<html>
	<head>
		<title></title>
		<script src='https://www.google.com/recaptcha/api.js'></script>
		<link rel="stylesheet" type="text/css" href="https://cdn.stail.eu/bootstrap/css/bootstrap.min.css" >
	</head>
	<body>
		<div class="container">
			<h1>Recaptacha Api</h1><br>

			<!--ERREURS SOUS FORME DE TABLEAU-->
			<?php if (isset($errors) && !empty($errors)) 
			{
			?>
			<div class="alert alert-danger">
				<?= implode('<br>', $errors); ?><!-- AFFICHAGE DU TABLEAU (une espèce de boucle) AVEC LA FONCTION 'inplode()'-->
			</div> 
			<?php
			}
			?>
			<?php
			if (isset($success)) {
				echo $success;
			}
			?>
			<form action="" method="post">
				<div class="form-group">
					<input type="text" name="text" class="form-control" required placeholder="Text...">
				</div>
				<div class="form-group">
					<div class="g-recaptcha" data-sitekey="6Ld1wCYTAAAAAPMcCqInb1r4sGM_hB967wXQyEqr" data-theme="light"></div>
				</div>
				<button class="btn btn-primary" name="btn">Valider</button>
			</form>
		</div>
	</body>
</html>