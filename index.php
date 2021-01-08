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
}

catch(Exception $e)
{
	echo "Erreur : " . $e->getMessage();
}