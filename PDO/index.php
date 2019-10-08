<?php 
require_once 'connection.php';
require 'header.php';
$_GET=array_map(function($get){
	return htmlspecialchars(trim($get));
}, $_GET) ;
if (!isset($_GET['page'])) {
	$_GET['page']='index';
}
switch ($_GET['page']) {
	case 'index';
	require_once 'homepage.php';
	break;
	case 'insert':
	require_once 'insert.php';
	break;
	case 'read':
	require_once 'read.php';
	break;
	case 'update':
	require_once 'update.php';
	break;
	case 'delete':
	require_once 'delete.php';
	break;
	case 'category':
	require_once 'category.php';
	break;
	case 'category_add':
	require_once 'category_add.php';
	break;
	case 'category_content':
	require_once 'category_content.php';
	break;
}
?>