<?php
/*
Google Recaptacha API

Système de validation de formulaire avec Google Recaptacha https://www.google.com/recaptcha/ 
	+système de tableau d'erreurs
	
	@author lefuturiste.fr
	@date 18/08/2016
	@php 5.0

	need api : https://github.com/google/recaptcha

*/
if (isset($_POST['btn']) && !empty($_POST['text'])) {
		
	require('recaptcha/autoload.php');//include https://github.com/google/recaptcha

	$recaptcha = new \ReCaptcha\ReCaptcha(/*Your secrete key in the "" */);

	$resp = $recaptcha->verify(/*Your post reponse ex: $_POST['g-recaptcha-response']*/);
	$errors = [];
	if ($resp->isSuccess()) {
	    //Success
	} else {
		//Incorrect
	}

}
?>
<!--Google Script (mandatory)-->	
<script src='https://www.google.com/recaptcha/api.js'></script>
		
<!-- Div in your formulaire-->
<div class="g-recaptcha" data-sitekey="YOUR PUBLIC KEY" data-theme="light"></div>
				
		