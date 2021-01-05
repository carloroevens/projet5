<?php

if (isset($_GET['p'])) {
	$p = $_GET['p'];
} else {
	$p = 'home';
}

try{
	if ($p === 'home') {
		require 'view/home.php';
	}
}

catch(Exception $e)
{
	echo "Erreur : " . $e->getMessage();
}