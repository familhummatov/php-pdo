<a href="index.php?page=category_add">[Add category]</a>

<?php 
$categories=$db->query('SELECT category.*,COUNT(dersler.id) as sumders FROM category LEFT JOIN dersler ON FIND_IN_SET(category.id ,dersler.category_id) GROUP BY category.id')->fetchall(PDO::FETCH_ASSOC);
?>

<ul>
	<?php foreach ($categories as $category):?>
		<li>
			<a href="index.php?page=category_content&id=<?php echo $category['id'] ?>">
				<?php echo $category['ad'] ?>
				(<?php echo $category['sumders'] ?>)
			</a>
		</li>
	<?php endforeach; ?>
</ul>