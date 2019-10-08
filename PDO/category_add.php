<?php 
if (isset($_POST['ad'])) {
	if (empty($_POST['ad'])) {
		echo "Enter category name";
	}
	else{
		$myquery=$db->prepare('INSERT INTO category SET  ad=?');
		$add=$myquery->execute([
			$_POST['ad']
		]);

		if ($add) {
			header('Location:index.php?page=category');
		}
		else{
			echo "Cannot add caategory!";
		}
	}
}
 ?>




<form action="" method="post">
	Category:<br>
	<input type="text" name="ad"> <br> <br>
	<button type="submit">ADD</button>	
</form>