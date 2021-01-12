<?php
require_once '../model/Manager.php';
require '../model/ItemManager.php';

$itemManager = new ItemManager;

$test = $itemManager->addItem('test', 30, 'test', file_get_contents("https://cdn.monsieurtshirt.com/images/6161/product_large/t-shirt-homme-velo-frenchy.jpg?1543835177503"), 'test');
echo "tout vas bien";
