		<?php
require('config/config.php');
require('model/functions.fn.php');
session_start();


if(	isset($_POST['username']) && isset($_POST['email']) && isset($_POST['password']) && 
	!empty($_POST['username']) && !empty($_POST['email']) && !empty($_POST['password'])) {
   header('Location: login.php');
}else{ 
	$_SESSION['message'] = 'Erreur : Formulaire incomplet';
	header('Location: register.php');
}

$isEmailAvailable = isEmailAvailable($db, $_POST['email']);
$isUsernameAvailable = isUsernameAvailable($db, $_POST['username']);

if (isEmailAvailable($db, $_POST['email']) & isUsernameAvailable($db, $_POST['username'])){
	$userRegistration = userRegistration($db,$_POST['username'],$_POST['email'], $_POST['password']);
}else{
	$_SESSION['message'] = 'Erreur : Email indisponible';
	header('Location: register.php');	
}

