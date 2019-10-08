<?php 
$categories=$db->query('SELECT * FROM category ORDER BY ad ASC')->fetchall(PDO::FETCH_ASSOC);
if (isset($_POST['submit'])) {
	$title=isset($_POST['title']) ? $_POST['title'] : null;
	$content=isset($_POST['content']) ? $_POST['content'] : null;
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
		$myquery=$db->prepare('INSERT INTO dersler SET
			title=?,
			content=?,
			category_id=?,
			status=?');
		$ins=$myquery->execute([
			$title,
			$content,
			$category_id,
			$status
		]);

		$last_id=$db->lastinsertid();

		if ($ins) {
			header('Location:index.php?page=read&id='.$last_id);
		}
		else{
			$err=$myquery->errorInfo();
			echo 'MYSQL error:'.$err[2];
		}
	}
}
?>

<form action="" method="post">
	Title:<br>
	<input type="text" value="<?php echo isset($_POST['title']) ? $_POST['title'] : '' ?>" name="title"> <br> <br>
	Content:<br>
	<textarea name="content" cols="30" rows="10"><?php echo isset($_POST['content']) ? $_POST['content'] : '' ?>
</textarea> <br> <br>
Category:<br>
<select name="category_id[]" multiple size="5">
	<?php foreach ($categories as $category ):?>
		<option value="<?php echo $category['id'] ?>"><?php echo $category['ad']?></option>
	<?php endforeach; ?>
</select> <br><br>
Status:<br>
<select name="status">
	<option value="1">Ready</option>
	<option value="0">Not Ready</option>
</select> <br> <br>
<input type="hidden" name="submit" value="1">
<button type="submit">SEND</button>	

</form>