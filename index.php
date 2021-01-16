<?php

require('controller/Autoloader.php');
Autoloader::register();

if (isset($_GET['p'])) {
	$p = $_GET['p'];
} else {
	$p = 'home';
}

//initialization of objects
$appController = new AppController;
$itemController = new ItemsController;
$userController = new UsersController;

try{
	if ($p === 'home') {
		$appController->getHomePage();
	}
	elseif ($p === 'shop') {
		$appController->getShopPage();
	}
	elseif ($p === 'single') {
		$appController->getSinglePage($_GET['idProduct']);
	}
	elseif ($p === 'connexionpage') {
		$appController->getConnexionPage();
	}
	elseif ($p === 'registration') {
		$appController->getRegistrationPage();
	}
	elseif ($p === 'insert-user') {
		$userController->addUser();
	}
	elseif ($p === 'connexion') {
		$userController->connexion();
	}
	elseif ($p === 'disconnection') {
		$userController->disconnection();
	}
	elseif ($p === 'profile') {
		$appController->getProfilePage();
	}
	elseif ($p === 'information') {
		$appController->getInformationPage();
	}
	elseif ($p === 'modifyinfos') {
		$userController->modifyinfos();
	}
	elseif ($p === 'admin') {
		$appController->getAdminPage();
	}
	elseif ($p === 'addproduct') {
		$appController->getAddProductPage();
	}
	elseif ($p === 'insertitem') {
		$itemController->insertItem();
	}
	elseif ($p === 'productmanagement') {
		$appController->getProductManagementPage();
	}
	elseif ($p === 'deleteitem') {
		$itemController->deleteitem();
	}
	elseif ($p === 'stock') {
		$appController->getStockPage($_GET['id']);
	}
	elseif ($p === 'updatesize') {
		$itemController->updateSizes();
	}
	elseif ($p === 'addfavorite') {
		$userController->addFavorite($_GET['itemid']);
	}
	elseif ($p === 'removefavorite') {
		$userController->removeFavorite($_GET['itemid']);
	}
	elseif ($p === 'getfavoritepage') {
		$appController->getFavoritePage();
	}
}

catch(Exception $e)
{
	echo "Erreur : " . $e->getMessage();
}