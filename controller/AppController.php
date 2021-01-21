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
		if (isset($_GET['pagenumber'])) {
			$itemManager = new ItemManager;
			if (isset($_GET['category'])) {
				$numberItem = $itemManager->getNumberItemByCategory($_GET['category']);
				$parPage = 12;
				$numberPage = ceil($numberItem / $parPage);

				if ($_GET['pagenumber'] > 0 && $_GET['pagenumber'] <= $numberPage) 
				{
					$page = $_GET['pagenumber'];
				}
				else
				{
					$page = 1;
				}

				$currentPage = (($page-1)*$parPage);
			}
			else
			{
				$numberItem = $itemManager->getNumberItem();
				$parPage = 12;
				$numberPage = ceil($numberItem / $parPage);

				if ($_GET['pagenumber'] > 0 && $_GET['pagenumber'] <= $numberPage) 
				{
					$page = $_GET['pagenumber'];
				}
				else
				{
					$page = 1;
				}

				$currentPage = (($page-1)*$parPage);
			}
			require 'view/shop.php';
		}
		else
		{
			throw new Exception("Cette page n'existe pas");
		}
	}

	public function getSinglePage($idProduct)
	{
		if (isset($idProduct) && $idProduct > 0) {
			$itemManager = new ItemManager;
			$favoriteManager = new FavoriteManager;
			$item = $itemManager->getSingleItem($idProduct, 'ItemsController');
			$size = $itemManager->getSingleSize($idProduct, 'ItemsController');

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

	public function getProfilePage()
	{
		if ($_SESSION['loger'] === 'yes') {
			require 'view/profile.php';
		}
		else
		{
			throw new Exception("Vous n'êtes pas connecter");
		}
	}

	public function getInformationPage()
	{
		if ($_SESSION['loger'] === 'yes' && isset($_SESSION['id'])) {
			$userManager = new UserManager;
			$user = $userManager->getUserInformation($_SESSION['id'], 'UsersController');
			require 'view/information.php';
		}
		else
		{
			throw new Exception("Vous n'êtes pas connecter");
		}
	}

	public function getAdminPage()
	{
		if (isset($_SESSION['loger']) && $_SESSION['acces'] == 1) {
			require 'view/admin.php';
		}
		else
		{
			throw new Exception("Vous n'êtes pas un administrateur");
		}
	}

	public function getAddProductPage()
	{
		if (isset($_SESSION['loger']) && $_SESSION['acces'] == 1) {
			require 'view/addproduct.php';
		}
		else
		{
			throw new Exception("Vous n'êtes pas un administrateur");
		}
	}

	public function getProductManagementPage()
	{
		if (isset($_SESSION['loger']) && $_SESSION['acces'] == 1) {

			$itemManager = new ItemManager;
			$numberItem = $itemManager->getNumberItem();
				$parPage = 12;
				$numberPage = ceil($numberItem / $parPage);

				if ($_GET['pagenumber'] > 0 && $_GET['pagenumber'] <= $numberPage) 
				{
					$page = $_GET['pagenumber'];
				}
				else
				{
					$page = 1;
				}

				$currentPage = (($page-1)*$parPage);

			require 'view/productmanagement.php';
		}
		else
		{
			throw new Exception("Vous n'êtes pas un administrateur");
		}
	}

	public function getStockPage($idProduct)
	{
		if (isset($_SESSION['loger']) && $_SESSION['acces'] == 1) {

			$itemManager = new ItemManager;
			$item = $itemManager->getSingleItem($idProduct, 'ItemsController');
			$size = $itemManager->getSingleSize($idProduct, 'ItemsController');

			require 'view/stock.php';
		}
		else
		{
			throw new Exception("Vous n'êtes pas un administrateur");
		}
	}

	public function getFavoritePage()
	{
		if ($_SESSION['loger'] === 'yes' && isset($_SESSION['id'])) {
			
			$favoriteManager = new FavoriteManager;
			$itemManager = new ItemManager;
			
			require 'view/favorite.php';
		}
		else
		{
			throw new Exception("Vous n'êtes pas connecter");
		}
	}

	public function getAddSizesPage()
	{
		if (isset($_SESSION['loger']) && $_SESSION['acces'] == 1) {
			require 'view/addsizes.php';
		}
		else
		{
			throw new Exception("Vous n'êtes pas un administrateur");
		}
	}

	public function getModifyItemPage()
	{
		if (isset($_SESSION['loger']) && $_SESSION['acces'] == 1 && isset($_GET['id']) && $_GET['id'] > 0) {
			$itemManager = new ItemManager;
			$item = $itemManager->getSingleItem($_GET['id'], 'ItemsController');
			require 'view/modifyitem.php';
		}
		else
		{
			throw new Exception("Vous n'êtes pas un administrateur");
		}
	}

	public function getCartPage()
	{
		if (isset($_SESSION['loger']) && $_SESSION['loger'] == 'yes') {
			$cartManager = new CartManager;
			$itemManager = new ItemManager;
			require 'view/cart.php';
		}
		else
		{
			throw new Exception("Vous n'êtes pas connecter");
		}
	}
}