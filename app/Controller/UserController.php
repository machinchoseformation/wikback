<?php

namespace Controller;

use \W\Controller\Controller;
use \Manager\UserManager;

class UserController extends Controller
{

	public function register()
	{
		$userManager = new UserManager();
		$error = ""; 
		$username = "";
		$email = "";

		//formulaire d'inscription soumis ?
		if (!empty($_POST)){

			$username 			= trim(strip_tags($_POST['username']));
			$email 				= trim(strip_tags($_POST['email']));
			$password 			= trim(strip_tags($_POST['password']));
			$password_confirm 	= trim(strip_tags($_POST['password_confirm']));

			/* validation */
			//username assez long
			if (strlen($username) < 4){
				$error = "Pseudo trop court";
			}

			//username déjà présent ?
			if($userManager->usernameExists($username)){
				$error = "Pseudo déjà utilisé !";
			}

			//email valide
			if (!filter_var($email, FILTER_VALIDATE_EMAIL)){
				$error = "Email non valide !";
			}

			//email déjà présent ?
			if($userManager->emailExists($email)){
				$error = "Email déjà utilisé !";
			}


			//mots de passe correspondent ?
			if ($password != $password_confirm){
				$error = "Les mots de passe ne correspondent pas !";
			}

			/* fin validation */

			//si valide...
			if (empty($error)){
				//hacher le mot de passe
				$hashedPassword = password_hash($password, PASSWORD_DEFAULT);

				$newAdmin = [
					"username" 		=> $username,
					"email" 		=> $email,
					"password" 		=> $hashedPassword,
					"role" 			=> "admin",
					"dateCreated" 	=> date("Y-m-d H:i:s"),
					"dateModified" 	=> date("Y-m-d H:i:s")
				];

				//insérer en base
				$userManager->insert($newAdmin);

				//afficher bravo ou rediriger ou faire quelque chose de bien

			}
			//si invalide...
				//envoyer les erreurs et les données soumises à la vue
		}

		$dataToPassToTheView = [
			"error" => $error,
			"username" => $username,
			"email" => $email
		];
		$this->show('user/register_administrator', $dataToPassToTheView);
	}

}