<?php
/*
*	Cette class sert à gérer les fonctionnalités en rapport avec la base de données pour les produits
*/
class AppController
{
	public function getHomePage()
	{
		require 'view/home.php';
	}

	public function getShopPage()
	{
		$itemManager = new ItemManager;
		
		require 'view/shop.php';
	}

	public function getSinglePage($idProduct)
	{
		if (isset($idProduct) && $idProduct > 0) {
			$itemManager = new ItemManager;
			$item = $itemManager->getSingleItem($idProduct, 'ItemsController');

			require 'view/single.php';
		}
		else
		{
			throw new Exception("L'identifiant du produit n'est pas le bon");
		}
	}

	public function getConnexionPage()
	{
		require 'view/connexion.php';
	}

	public function getRegistrationPage()
	{
		require 'view/registration.php';
	}
}