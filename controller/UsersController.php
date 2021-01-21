<?php
/*
*	Cette class sert à gérer les fonctionnalités en rapport avec la base de données pour les utilisateurs
*/
session_start();

class UsersController
{
	public function addUser()
	{
		if (isset($_POST['email']) && isset($_POST['password']) && isset($_POST['Comf-password']) && !empty($_POST['email']) && !empty($_POST['password']) && !empty($_POST['Comf-password'])) {

			if ($_POST['password'] === $_POST['Comf-password']) {
				$userManager = new UserManager;

				$getmail = $userManager->countUserMail($_POST['email']);
				
				if (in_array(1, $getmail)) {

					echo "Il existe déja un compte avec cette adresse mail";
				}
				else
				{
					$hashPassword = sha1($_POST['password']);
					$userManager->addUser($_POST['email'], $hashPassword);

					require 'view/connexion.php';
				}
			}
			else
			{
				echo "Mot de passe différent";
			}
		}
		else
		{
			echo "Vous n'avez pas remplie les champs attendus";
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
				$_SESSION['id'] = $log['id'];
				$_SESSION['acces'] = $log['user_acces'];
				$_SESSION['panier'] = 0;
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

	public function modifyinfos()
	{
		if ($_SESSION['loger'] === 'yes') {

			if (isset($_POST['password'])) {

				$hashPassword = sha1($_POST['password']);

				$userManager = new UserManager;
				$userManager->updateUserInformation($_POST['email'], $hashPassword, $_POST['name'], $_POST['lastname'], $_POST['birthday'], $_POST['adress'], $_SESSION['id']);

				header('location: index.php?p=information');
			}
			else
			{
				$userManager = new UserManager;
				$userManager->updateUserInformation($_POST['email'], $_POST['name'], $_POST['lastname'], $_POST['birthday'], $_POST['adress'], $_SESSION['id']);

				header('location: index.php?p=information');
			}
		}
		else
		{
			throw new Exception("Vous n'êtes pas connecter");
		}
	}

	public function addFavorite($itemid)
	{
		if ($_SESSION['loger'] === 'yes') {
			$favoriteManager = new FavoriteManager;

			$favoriteManager->addFavorite($_SESSION['id'], $itemid);
		}
		else
		{
			throw new Exception("Vous n'êtes pas connecter");
		}
	}

	public function removeFavorite($itemid)
	{
		if ($_SESSION['loger'] === 'yes') {
			$favoriteManager = new FavoriteManager;

			$favoriteManager->deleteFavorite($itemid);
		}
		else
		{
			throw new Exception("Vous n'êtes pas connecter");
		}
	}
}