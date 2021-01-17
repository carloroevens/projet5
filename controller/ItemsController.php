<?php
/*
*	Cette class sert à gérer les fonctionnalités en rapport avec la base de données pour les produits
*/
class ItemsController
{
	public function getUrl()
	{
		return 'index.php?p=single&idProduct=' . $this->id;
	}

	public function insertItem()
	{
		if (isset($_SESSION['loger']) && $_SESSION['acces'] == 1) {
			$itemManager = new ItemManager;

			$productName = $_POST['name'];
			
			$binimg = file_get_contents($_FILES['img']['tmp_name']);

			$itemManager->addItem($productName, $_POST['price'], $_POST['description'], $binimg, $_POST['category']);

			$idProduct = $itemManager->getItemByName($productName);

			header('location: index.php?p=addsizespage&id=' . $idProduct['id']);
		}
		else
		{
			throw new Exception("Vous n'êtes pas un administrateur");
		}
	}

	public function deleteitem()
	{
		if (isset($_SESSION['loger']) && $_SESSION['acces'] == 1 && isset($_GET['id'])) {
			$itemManager = new ItemManager;

			$itemManager->deleteItem($_GET['id']);
			header('location: index.php?p=productmanagement');
		}
		else
		{
			throw new Exception("Vous n'êtes pas un administrateur");
		}
	}

	public function updateSizes()
	{
		if (isset($_SESSION['loger']) && $_SESSION['acces'] == 1 && isset($_GET['id'])) {
			$itemid = $_GET['id'];
			$itemManager = new ItemManager;

			$itemManager->updateSize($_POST['numberofs'], $_POST['numberofm'], $_POST['numberofl'], $_POST['numberofxl'], $_POST['numberofxxl'], $itemid);

			header('location: index.php?p=stock&id=' . $itemid);
		}
		else
		{
			throw new Exception("Vous n'êtes pas un administrateur");
		}
	}

	public function addSizes()
	{
		if (isset($_SESSION['loger']) && $_SESSION['acces'] == 1 && isset($_GET['id'])) {
			$itemManager = new ItemManager;

			$productId = $_GET['id'];

			$itemManager->addSize($productId, $_POST['numberofs'], $_POST['numberofm'], $_POST['numberofl'], $_POST['numberofxl'], $_POST['numberofxxl']);
			header('location: index.php?p=admin');
		}
		else
		{
			throw new Exception("Vous n'êtes pas un administrateur");
		}
	}

	public function modifyItem()
	{
		if (isset($_SESSION['loger']) && $_SESSION['acces'] == 1) {
			$itemManager = new ItemManager;

			if (empty($_FILES['img']['tmp_name'])) {
				
				$itemManager->updateItemNoImg($_POST['name'], $_POST['price'], $_POST['description'], $_POST['category'], $_GET['id']);
				
				header('location: index.php?p=productmanagement');
			}
			else
			{
				$binimg = file_get_contents($_FILES['img']['tmp_name']);

				$itemManager->updateItem($_POST['name'], $_POST['price'], $_POST['description'], $binimg, $_POST['category'], $_GET['id']);

				header('location: index.php?p=productmanagement');
			}
		}
		else
		{
			throw new Exception("Vous n'êtes pas un administrateur");
		}
	}
}