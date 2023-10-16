<?php 
session_start();

/******************************** 
	 DATABASE & FUNCTIONS 
********************************/
require('config/config.php');
require('model/functions.fn.php');

/********************************
			PROCESS
********************************/

if(isset($_POST['email']) && isset($_POST['password'])){
	if(!empty($_POST['email']) && !empty($_POST['password'])){

		$email = $_POST['email'];
		$password = $_POST['password'];

		// Appeler la méthode userConnection avec les données du formulaire
		$result = userConnection($db, $email, $password);
		
		// Vérifier le résultat
		if($result){
			// Si les identifiants sont corrects, rediriger vers dashboard.php
			header('Location: dashboard.php');
			exit();
		}else{
			// Si les identifiants sont incorrects, stocker le message d'erreur
			$error = 'Mauvais identifiants';
		}

	}else{
		$error = 'Champs requis !';
	}
}

/******************************** 
			VIEW 
********************************/
include 'view/_header.php';
include 'view/login.php';
include 'view/_footer.php';
?>
