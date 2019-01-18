<?php
	
	require_once('config.php');

	//$user = new Usuario();

	//$user->loadById(3); // Carrega um usuário pelo ID

	/*
	$user = Usuario::getList(); // Carrega uma lista do todos os usuários

	echo json_encode($user);
	*/

	//Carrega lista de usuário buscanco login

	//$busca = Usuario::search("son");

	//echo json_encode($busca);


	//CRIANDO INSERT
	//$user = new Usuario("Cristiano", "*****");	

	//$user->insert();

	//echo $user;

	$user = new Usuario();

	$user->loadById(5);

	$user->update("Rogerio", "123pin");

	echo $user;

?>