<?php 
if (!isset($_GET['id']) || empty($_GET['id'])) {
header('Location:index.php');
exit;
}

$myquery=$db->prepare('SELECT * FROM dersler WHERE id=? && status=1');
$myquery->execute([
$_GET['id']
]);
$slct=$myquery->fetch(PDO::FETCH_ASSOC);
if (!$slct) {
	header('Location:index.php');
	exit;
}
?>
<h3><?php echo $slct['title'] ?></h3>
<div>
	<strong>Tarix: </strong> <?php echo $slct['tarix']?> <hr>
	<?php echo nl2br($slct['content'])?>
</div>