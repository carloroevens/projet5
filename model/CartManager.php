<?php
/**
 *  Cette class s'occupe des fonctions SQL pour les articles dans le panier
 */
class CartManager extends Manager
{
	public function addItem($user_id, $item_id, $item_number, $item_size)
	{
		$db = $this->dbConnect();

		$req = $db->prepare('INSERT INTO cart (user_id, item_id, item_number, item_size) VALUES (?, ?, ?, ?)');
		$req->execute([$user_id, $item_id, $item_number, $item_size]);
	}

	public function deleteItem($item_id)
	{
		$db = $this->dbConnect();

		$req = $db->prepare('DELETE FROM cart WHERE item_id = ?');
		$req->execute([$item_id]);
	}

	public function updateNumber($item_number, $item_id)
	{
		$db = $this->dbConnect();

		$req = $db->prepare('UPDATE cart SET item_number = ? WHERE item_id = ?');
		$req->execute([$item_number, $item_id]);
	}

	public function getItem($user_id)
	{
		$db = $this->dbConnect();

		$req = $db->prepare('SELECT item_id, item_number, item_size FROM cart WHERE user_id = ?');
		$req->execute([$user_id]);
		$datas = $req->fetchAll();

		return $datas;
	}
}