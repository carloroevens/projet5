<?php
/*
*	Cette class s'occupe des fonctions SQL pour gérer les favoris de chaque utilisateur
*/
class FavoriteManager extends Manager
{
	public function addFavorite($user_id, $item_id)
	{
		$db = $this->dbConnect();

		$req = $db->prepare('INSERT INTO favorite (user_id, item_id) VALUES (?, ?)');
		$req->execute([$user_id, $item_id]);
	}

	public function deleteFavorite($item_id)
	{
		$db = $this->dbConnect();

		$req = $db->prepare('DELETE FROM favorite WHERE item_id = ?');
		$req->execute([$item_id])
	}

	public function getFavorite($user_id, $class)
	{
		$db = $this->dbConnect();

		$req = $db->prepare('SELECT item_id FROM favorite WHERE user_id = ?');
		$req->execute([$user_id]);
		$datas = $req->fetchAll(PDO::FETCH_CLASS, $class);

		return $datas;
	}
}