<?php
require_once 'Zend/Application.php';
require_once 'Zend/Loader/Autoloader.php';

$loader = Zend_Loader_Autoloader::getInstance();
$loader->registerNamespace('Base');
$loader->registerNamespace('Entity');
