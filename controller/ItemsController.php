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
		$itemManager = new ItemManager;

		//$img = $_POST['img'];

		$binimg = file_get_contents($_FILES);

		/*$handle = fopen($img, "rb");
		$contents = fread($handle, filesize($img));
		fclose($handle);*/

		//$img_bin = fread(fopen($img, "r"), filesize($img));


		$test = $itemManager->addItem($_POST['name'], $_POST['price'], $_POST['description'], $binimg, $_POST['category']);
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
			throw new Exception("Vous n'étes pas un administrateur");
		}
	}
}