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
}