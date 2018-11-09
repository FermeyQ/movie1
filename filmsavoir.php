<?php include ('inc/pdo.php') ?>
<?php include ('inc/fonction.php') ?>

<?php
$title = 'Films a voir !';

$id = urldecode($_GET['id']);
$id = trim($id);
$sql = "SELECT title FROM movies_full WHERE id = $id";
$query = $pdo -> prepare($sql);
$query -> execute();
$titles = $query ->fetch();
print_r ($titles);
?>
<?php include ('inc/header.php') ?>

<h1>Films a voir !</h1>

<?php
echo '<a href="detail.php?id=' . $id . '"><img src="posters/' . $id . '.jpg" alt=" '. $id.'"></a>';
?>


<?php include ('inc/footer.php') ?>