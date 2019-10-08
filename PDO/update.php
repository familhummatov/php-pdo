<?php 
if (!isset($_GET['id']) || empty($_GET['id'])) {
	header('Location:index.php');
	exit;
}

$myquery=$db->prepare('SELECT * FROM dersler WHERE id=?');
$myquery->execute([
	$_GET['id']
]);
$myarr=$myquery->fetch(PDO::FETCH_ASSOC);
if (!$myarr) {
	header('Location:index.php');
	exit;
}
$dersCategory=explode(',', $myarr['category_id']);
$categories=$db->query('SELECT * FROM category ORDER BY ad ASC')->fetchall(PDO::FETCH_ASSOC);
if (isset($_POST['submit'])) {
	$title=isset($_POST['title']) ? $_POST['title'] : $myarr['title'];
	$content=isset($_POST['content']) ? $_POST['content'] : $myarr['content'];
	$status=isset($_POST['status']) ? $_POST['status'] : 0;
	$category_id=isset($_POST['category_id']) && is_array($_POST['category_id']) ? implode(',', $_POST['category_id']) : null;
	if (!$title) {
		echo "Enter title";
	}
	elseif(!$content){
		echo "Enter content";
	}
	elseif(!$category_id){
		echo "Enter category";
	}
	else{
		$uptd=$db->prepare('UPDATE dersler SET
			title=?,
			content=?,
			category_id=?,
			status=?  WHERE id=?
			');
		$uptd->execute([
			$title,$content,$category_id,$status,$myarr['id']
		]);
		if ($uptd) {
			header('Location:index.php?page=read&id='.$myarr['id']);
		}
		else{
			echo "NOT UPDATED";
		}
	} 
}
?>

<form action="" method="post">
	Title:<br>
	<input type="text" value="<?php echo isset($_POST['title']) ? $_POST['title'] : $myarr['title'] ?>" name="title"> <br> <br>
	Content:<br>
	<textarea name="content" cols="30" rows="10"><?php echo isset($_POST['content']) ? $_POST['content'] : $myarr['content'] ?>
</textarea> <br> <br>
Category:<br>
<select name="category_id[]" multiple size="5">
	<?php foreach ($categories as $category ):?>
		<option <?php echo in_array($category['id'], $dersCategory) ? 'selected' : '' ?> value="<?php echo $category['id'] ?>"> <?php echo $category['ad'] ?></option>
	<?php endforeach; ?>
</select> <br><br>
Status:<br>
<select name="status">
	<option <?php echo $myarr['status']==1 ? 'selected' : '' ?> value="1">Ready</option>
	<option <?php echo $myarr['status']==0 ? 'selected' : '' ?> value="0">Not Ready</option>
</select> <br> <br>
<input type="hidden" name="submit" value="1">
<button type="submit">UPDATE</button>	

</form>