<h3>LIST</h3>
<form action="" method="get">
	<input type="text" class="tarix" autocomplete="off" name="start" placeholder="Başlanğıc tarix" value="<?php echo isset($_GET['start']) ? $_GET['start'] : '' ?>">
	<input type="text" class="tarix" autocomplete="off" name="finish" placeholder="Son tarix" value="<?php echo isset($_GET['finish']) ? $_GET['finish'] : '' ?>"> <br>
	<input type="text" name="axtar" autocomplete="off" placeholder="Axtar" value="<?php echo isset($_GET['axtar']) ? $_GET['axtar'] : '' ?>">
	<button type="submit">Axtar</button>
</form>
<link rel="stylesheet" href="//code.jquery.com/ui/1.12.1/themes/base/jquery-ui.css">
<script src="https://code.jquery.com/jquery-1.12.4.js"></script>
<script src="https://code.jquery.com/ui/1.12.1/jquery-ui.js"></script>

<script type="text/javascript">
	$('.tarix').datepicker({
		dateFormat: 'yy-mm-dd'
	});
</script>



<?php 
$where=[];
$sql='SELECT dersler.id,dersler.title,dersler.status,GROUP_CONCAT(category.ad) as category_ad,GROUP_CONCAT(category.id) as category_id FROM dersler INNER JOIN category ON FIND_IN_SET(category.id,dersler.category_id)';

if (isset($_GET['axtar']) && !empty($_GET['axtar'])) {
	$where[]='(dersler.title LIKE "%'.$_GET['axtar'].'%" || dersler.content LIKE "%'.$_GET['axtar'].'%")';
}
if ((isset($_GET['start']) && !empty($_GET['start'])) && (isset($_GET['finish']) && !empty($_GET['finish']))) {
	$where[]='dersler.tarix BETWEEN "' . $_GET['start'] . ' 00:00:00 " AND "' . $_GET['finish'] . ' 23:59:59 " ';
}

if (count($where) > 0) {
	$sql.=' WHERE ' . implode(' && ', $where);
}
$sql.=' GROUP BY dersler.id ORDER BY dersler.id DESC';

$mydb=$db->query($sql)->fetchall(PDO::FETCH_ASSOC);
?>
<?php if ($mydb): ?>
	<ul>
		<?php foreach ($mydb as $value):?>
			<li>
				<?php echo $value['title'] ?>
				<?php 
				$cat_name=explode(',', $value['category_ad']);
				$cat_id=explode(',', $value['category_id']);
				foreach ($cat_name as $key => $val) {
				echo '<a href="index.php?page=category_content&id='.$cat_id[$key].'">' . $val . '</a>  ';
				}
				 ?>
				<div>
					<?php if ($value['status']==1):?>
						<a href="index.php?page=read&id=<?php echo $value['id'] ?>">[READ]</a>
					<?php endif; ?>
					<a href="index.php?page=update&id=<?php echo $value['id'] ?>">[UPDATE]</a>
					<a href="index.php?page=delete&id=<?php echo $value['id'] ?>">[DELETE]</a>
				</div>
			</li>
		<?php endforeach; ?>
	</ul>
	<?php else: ?>
		<div>
			<?php if(isset($_GET['axtar'])): ?>
				Axtardığınız dərs tapılmadı!
				<?php else: ?>
					Cannot found anything.
				<?php endif; ?>
			</div>
			<?php endif; ?>