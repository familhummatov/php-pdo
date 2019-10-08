<?php 
if (!isset($_GET['id']) || empty($_GET['id'])) {
	header('Location:index.php');
	exit;
}

$myquery=$db->prepare('DELETE FROM dersler WHERE id=?');
$myquery->execute([
	$_GET['id']
]);
header('Location:index.php');
?>