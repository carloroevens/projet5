<?php
require_once '../model/Manager.php';
require '../model/ItemManager.php';

$itemManager = new ItemManager;

$test = $itemManager->addItem('test', 30, 'test', file_get_contents("https://i.imgur.com/UYcHkKD.png"), 'test');
echo "tout vas bien";
