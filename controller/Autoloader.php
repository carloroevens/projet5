<?php
/* 
*	Comme sont nom l'indique cette class sert à auloloader toute les class quand elle sont appelé
*/
class Autoloader {

	static function register() {
		spl_autoload_register(array(__CLASS__, 'autoload'));
	}

	static function autoload($class) {
		if ($class == 'Manager' || $class == 'ItemManager' || $class == 'UserManager' || $class == 'FavoriteManager' || $class == 'CartManager') {
			require 'model/' . $class . '.php';
		}
		else {
			require 'controller/' . $class . '.php';
		}
		
	}
}