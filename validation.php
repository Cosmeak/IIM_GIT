<?php
require('config/config.php');
require('model/functions.fn.php');
session_start();

if (!isset($_POST['username']) 
	|| !isset($_POST['email']) 
	|| !isset($_POST['password']) 
	|| empty($_POST['username']) 
	|| empty($_POST['email']) 
	|| empty($_POST['password'])
) {
	$error = 'Erreur : Formulaire incomplet';
}

if (!isEmailAvailable($db, $_POST['email'])) {
	$error = 'Erreur : Email indisponible';
}

if (!isUsernameAvailable($db, $_POST['username'])) {
	$error = 'Erreur : Usernanme indisponible';
}

if (isset($error)) {
	$_SESSION['message'] = $error;
	header('Location: register.php');
}

userRegistration($db, $_POST['username'], $_POST['email'], $_POST['password']);
