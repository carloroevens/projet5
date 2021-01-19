<?php
/*
*	Cette class s'occupe des fonctions SQL pour la connection et les informations des utilisateurs
*/
class UserManager extends Manager
{
	public function addUser ($user_mail, $user_password)
	{
		$db = $this->dbConnect();

		$req = $db->prepare('INSERT INTO users_information (user_mail, user_password, user_name, user_lastname, user_birthday, user_adress) VALUES (?, ?, ?, ?, NOW(), ?)');
		$req->execute([$user_mail, $user_password, '', '', '']);
	}

	/*public function updateUserLog($user_login, $user_password, $user_id)
	{
		$db = $this->dbConnect();

		$req = $db->prepare('UPDATE users_information SET user_login = ?, user_password = ? WHERE id = ?');
		$req->execute([$user_login, $user_password, $user_id]);
	}*/

	public function getUserLog($user_mail)
	{
		$db = $this->dbConnect();

		$req = $db->prepare('SELECT id, user_password, user_acces FROM users_information WHERE user_mail = ?');
		$req->execute([$user_mail]);
		$data = $req->fetch();

		return $data;
	}

	public function countUserMail($user_mail)
	{
		$db = $this->dbConnect();

		$req = $db->prepare('SELECT COUNT(*) FROM users_information WHERE user_mail = ?');
		$req->execute([$user_mail]);
		$data = $req->fetch();

		return $data;
	}

	//On passe a ce qui touche a la table users_information

	/*public function addUserInformation($user_id, $user_name, $user_lastname, $user_mail, $user_adress)
	{
		$db = $this->dbConnect();

		$req = $db->prepare('INSERT INTO users_information (user_id, user_name, user_lastname, user_mail, user_adress) VALUES (?, ?, ?, ?, ?)');
		$req->execute([$user_id, $user_name, $user_lastname, $user_mail, $user_adress]);
	}*/

	public function updateUserInformation($user_mail, $user_password, $user_name, $user_lastname, $user_birthday, $user_adress, $user_id)
	{
		$db = $this->dbConnect();

		$req = $db->prepare('UPDATE users_information SET user_mail = ?, user_password = ?, user_name = ?, user_lastname = ?, user_birthday = ?, user_adress = ? WHERE id = ?');
		$req->execute(array($user_mail, $user_password, $user_name, $user_lastname, $user_birthday, $user_adress, $user_id));
	}

	public function getUserInformation($user_id, $class)
	{
		$db = $this->dbConnect();

		$req = $db->prepare('SELECT user_mail, user_name, user_lastname, user_birthday, user_adress FROM users_information WHERE id = ?');
		$req->execute(array($user_id));
		$req->setFetchMode(PDO::FETCH_CLASS, $class);
		$datas = $req->fetch();

		return $datas;
	}
}