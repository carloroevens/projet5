<?php
/*
*	Cette class s'occupe des fonctions SQL pour la connection et les informations des utilisateurs
*/
class UserManager extends Manager
{
	public function addUser ($user_login, $user_password)
	{
		$db = $this->dbConnect();

		$req = $db->prepare('INSERT INTO users_inscription (user_login, user_password, user_acces, user_date) VALUES (?, ?, 0, NOW())');
		$req->execute([$user_login, $user_password]);
	}

	public function updateUserLog($user_login, $user_password, $user_id)
	{
		$db = $this->dbConnect();

		$req = $db->prepare('UPDATE users_inscription SET user_login = ?, user_password = ? WHERE id = ?');
		$req->execute([$user_login, $user_password, $user_id]);
	}

	public function getUserLog($user_id, $class)
	{
		$db = $this->dbConnect();

		$req = $db->prepare('SELECT user_login, user_password FROM users_inscription WHERE id = ?');
		$req->execute(array($user_id));
		$req->setFetchMode(PDO::FETCH_CLASS, $class);
		$datas = $req->fetch();

		return $datas;
	}

	//On passe a ce qui touche a la table users_information

	public function addUserInformation($user_id, $user_name, $user_lastname, $user_mail, $user_adress)
	{
		$db = $this->dbConnect();

		$req = $db->prepare('INSERT INTO users_information (user_id, user_name, user_lastname, user_mail, user_adress) VALUES (?, ?, ?, ?, ?)');
		$req->execute([$user_id, $user_name, $user_lastname, $user_mail, $user_adress]);
	}

	public function updateUserInformation($user_id, $user_name, $user_lastname, $user_mail, $user_adress)
	{
		$db = $this->dbConnect();

		$req = $db->prepare('UPDATE users_information SET user_name = ?, user_lastname = ?, user_mail = ?, user_adress = ? WHERE user_id = ?');
		$req->execute([$user_name, $user_lastname, $user_mail, $user_adress, $user_id]);
	}

	public function getUserInformation($user_id, $class)
	{
		$db = $this->dbConnect();

		$req = $db->prepare('SELECT user_name, user_lastname, user_mail, user_adress FROM users_information WHERE user_id = ?');
		$req->execute(array($user_id));
		$req->setFetchMode(PDO::FETCH_CLASS, $class);
		$datas = $req->fetch();

		return $datas;
	}
}