<?php
/*
*	Cette class s'occupe des fonctions SQL pour les articles du shop
*/
class ItemManager extends Manager
{
	public function addItem($item_name, $item_price, $item_description, $item_img, $item_category)
	{
		$db = $this->dbConnect();

		$req = $db->prepare('INSERT INTO items_description (item_name, item_price, item_description, item_img, item_category, item_date) VALUES (?, ?, ?, ?, ?, NOW())');
		$req->execute([$item_name, $item_price, $item_description, $item_img, $item_category]);
	}

	public function updateItem($item_name, $item_price, $item_description, $item_img, $item_category, $item_id)
	{
		$db = $this->dbConnect();

		$req = $db->prepare('UPDATE items_description SET item_name = ?, item_price = ?, item_description = ?, item_img = ?, item_category = ? WHERE id = ?');
		$req->execute([$item_name, $item_price, $item_description, $item_img, $item_category, $item_id]);
	}

	public function updateItemNoImg($item_name, $item_price, $item_description, $item_category, $item_id)
	{
		$db = $this->dbConnect();

		$req = $db->prepare('UPDATE items_description SET item_name = ?, item_price = ?, item_description = ?, item_category = ? WHERE id = ?');
		$req->execute([$item_name, $item_price, $item_description, $item_category, $item_id]);
	}

	public function deleteItem($item_id)
	{
		$db = $this->dbConnect();

		$req = $db->prepare('DELETE FROM items_description WHERE id = ?');
		$req->execute(array($item_id));
	}

	public function getItems($page, $nbparpage, $class)
	{
		$db = $this->dbConnect();

		$req = $db->query('SELECT * FROM items_description LIMIT '. $page . "," . $nbparpage);
		
		$datas = $req->fetchAll(PDO::FETCH_CLASS, $class);

		return $datas;
	}

	public function getFavoriteItems($item_id, $class)
	{
		$db = $this->dbConnect();

		$req = $db->prepare('SELECT * FROM items_description WHERE id = ?');
		$req->execute([$item_id]);
		
		$datas = $req->fetchAll(PDO::FETCH_CLASS, $class);

		return $datas;
	}

	public function getSingleItem($item_id, $class)
	{
		$db = $this->dbConnect();

		$req = $db->prepare('SELECT * FROM items_description WHERE id = ?');
		$req->execute(array($item_id));
		$req->setFetchMode(PDO::FETCH_CLASS, $class);
		$datas = $req->fetch();

		return $datas;
	}

	public function getRecommendationItem($item_category, $item_id, $class)
	{
		$db = $this->dbConnect();

		$req = $db->prepare('SELECT id, item_name, item_price, item_img FROM items_description WHERE item_category = ? AND id != ? LIMIT 0, 4');
		$req->execute(array($item_category, $item_id));
		$req->setFetchMode(PDO::FETCH_CLASS, $class);
		$datas = $req->fetchAll();

		return $datas;
	}

	public function getItemByName($item_name)
	{
		$db = $this->dbConnect();

		$req = $db->prepare('SELECT id FROM items_description WHERE item_name = ?');
		$req->execute(array($item_name));
		$data = $req->fetch();

		return $data;
	}

	public function getItemByCategory($page, $nbparpage, $item_category, $class)
	{
		$db = $this->dbConnect();

		$req = $db->prepare('SELECT id, item_name, item_price, item_img FROM items_description WHERE item_category = ?  LIMIT '. $page . "," . $nbparpage);
		$req->execute(array($item_category));
		$req->setFetchMode(PDO::FETCH_CLASS, $class);
		$datas = $req->fetchAll();

		return $datas;
	}

	public function getNumberItemByCategory($category)
	{
		$db = $this->dbConnect();

		$req = $db->prepare('SELECT COUNT(id) FROM items_description WHERE item_category = ?');
		$req->execute([$category]);
		$datas = $req->fetch();
		$data = intval($datas['COUNT(id)']);

		return $data;
	}

	public function getNumberItem()
	{
		$db = $this->dbConnect();

		$req = $db->query('SELECT COUNT(id) FROM items_description');
		$datas = $req->fetch();
		$data = intval($datas['COUNT(id)']);

		return $data;
	}

	//On passe a la table items_size

	public function addSize($item_id, $item_numberofs, $item_numberofm, $item_numberofl, $item_numberofxl, $item_numberofxxl)
	{
		$db = $this->dbConnect();

		$req = $db->prepare('INSERT INTO items_size (item_id, item_numberofs, item_numberofm, item_numberofl, item_numberofxl, item_numberofxxl) VALUES (?, ?, ?, ?, ?, ?)');
		$req->execute([$item_id, $item_numberofs, $item_numberofm, $item_numberofl, $item_numberofxl, $item_numberofxxl]);
	}

	public function updateSize($item_numberofs, $item_numberofm, $item_numberofl, $item_numberofxl, $item_numberofxxl, $item_id)
	{
		$db = $this->dbConnect();

		$req = $db->prepare('UPDATE items_size SET item_numberofs = ?, item_numberofm = ?, item_numberofl = ?, item_numberofxl = ?, item_numberofxxl = ? WHERE item_id = ?');
		$req->execute([$item_numberofs, $item_numberofm, $item_numberofl, $item_numberofxl, $item_numberofxxl, $item_id]);
	}

	public function deleteSize($item_id)
	{
		$db = $this->dbConnect();

		$req = $db->prepare('DELETE FROM items_size WHERE item_id = ?');
		$req->execute(array($item_id));
	}

	public function getSize($item_id, $class)
	{
		$db = $this->dbConnect();

		$req = $db->prepare('SELECT * FROM items_size WHERE item_id = ?');	
		$req->execute(array($item_id));
		$req->setFetchMode(PDO::FETCH_CLASS, $class);
		$datas = $req->fetchAll();

		return $datas;
	}

	public function getSingleSize($item_id, $class)
	{
		$db = $this->dbConnect();

		$req = $db->prepare('SELECT * FROM items_size WHERE item_id = ?');
		$req->execute(array($item_id));
		$req->setFetchMode(PDO::FETCH_CLASS, $class);
		$datas = $req->fetch();

		return $datas;
	}
}