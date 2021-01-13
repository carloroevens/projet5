<?php
/*
*	Cette class sert à gérer les fonctionnalités en rapport avec la base de données pour les utilisateurs
*/
session_start();

class UsersController
{
	public function addUser()
	{
		if (isset($_POST['email']) && isset($_POST['password'])) {

			$hashPassword = sha1($_POST['password']);

			$userManager = new UserManager;

			$userManager->addUser($_POST['email'], $hashPassword);

			require 'view/connexion.php';
		}
		else
		{
			throw new Exception("Vous n'avez pas remplie les champs attendus");
		}
	}

	public function connexion()
	{
		if (isset($_POST['email']) && isset($_POST['password'])) {
			
			$hashPassword = sha1($_POST['password']);

			$userManager = new UserManager;

			$log = $userManager->getUserLog($_POST['email']);

			if ($hashPassword === $log['user_password']) {

				$_SESSION['email'] = $_POST['email'];
				$_SESSION['hashpassword'] = $hashPassword;
				$_SESSION['loger'] = 'yes';
				header('location: index.php?p=home');
			}
			else
			{
				throw new Exception("Mot de passe incorrect");
			}
		}
		else
		{
			throw new Exception("Email incorrect");
		}
	}

	public function disconnection()
	{
		session_destroy();
		header('location: index.php?p=home');
	}
}