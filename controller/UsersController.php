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
				$_SESSION['id'] = $log['id'];
				$_SESSION['acces'] = $log['user_acces'];
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
			throw new Exception("Vous n'étes pas connecter");
		}
	}

	public function addFavorite($itemid)
	{
		if ($_SESSION['loger'] === 'yes') {
			$favoriteManager = new FavoriteManager;

			$favoriteManager->addFavorite($_SESSION['id'], $itemid);

			header('location: index.php?p=single&idProduct=' . $itemid);
		}
		else
		{
			throw new Exception("Vous n'étes pas connecter");
		}
	}

	public function removeFavorite($itemid)
	{
		if ($_SESSION['loger'] === 'yes') {
			$favoriteManager = new FavoriteManager;

			$favoriteManager->deleteFavorite($itemid);

			header('location: index.php?p=single&idProduct=' . $itemid);
		}
		else
		{
			throw new Exception("Vous n'étes pas connecter");
		}
	}
}