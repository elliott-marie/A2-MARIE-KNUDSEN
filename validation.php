		<?php
require('config/config.php');
require('model/functions.fn.php');
session_start();

$userRegistration = userRegistration($db,$_POST['username'],$_POST['email'], $_POST['password']);

if(	isset($_POST['username']) && isset($_POST['email']) && isset($_POST['password']) && 
	!empty($_POST['username']) && !empty($_POST['email']) && !empty($_POST['password'])) {
   header('Location: login.php');
}else{ 
	$_SESSION['message'] = 'Erreur : Formulaire incomplet';
	header('Location: register.php');
}