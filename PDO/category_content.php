<?php 
if (!isset($_GET['id']) || empty($_GET['id'])) {
	header('Location:index.php?page=category');
	exit;
}

$myquery=$db->prepare('SELECT * FROM category WHERE id=?');
$myquery->execute([$_GET['id']]);
$category=$myquery->fetch(PDO::FETCH_ASSOC);

$myquery=$db->prepare('SELECT * FROM dersler WHERE FIND_IN_SET(?,category_id)');
$myquery->execute([$category['id']]);
$dersler=$myquery->fetchall(PDO::FETCH_ASSOC);
?>
<h3>
	Category: <?php echo $category['ad'] ?>
</h3>
<?php if ($dersler):?>
<ul>
	<?php foreach ($dersler as $ders): ?>
		<li>
			<div>
				<?php echo $ders['title']; ?>
				<?php if ($ders['status']==1):?>
					<a href="index.php?page=read&id=<?php echo $ders['id'] ?>">[READ]</a>
				<?php endif; ?>
				<a href="index.php?page=update&id=<?php echo $ders['id'] ?>">[UPDATE]</a>
				<a href="index.php?page=delete&id=<?php echo $ders['id'] ?>">[DELETE]</a>
			</div>
		</li>
	<?php endforeach; ?>
</ul>
<?php else: ?>
	Ders has not been found!
<?php endif; ?>