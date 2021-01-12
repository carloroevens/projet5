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
}

catch(Exception $e)
{
	echo "Erreur : " . $e->getMessage();
}