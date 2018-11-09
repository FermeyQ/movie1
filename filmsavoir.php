<?php include ('inc/pdo.php') ?>
<?php include ('inc/fonction.php') ?>

<?php
$title = 'Films a voir !';
if(!empty($_GET['slug'])) {
$slug = urldecode($_GET['slug']);
$slug = trim($slug);
$sql = "SELECT * FROM movies_full WHERE slug = :slug";
$query = $pdo -> prepare($sql);
$query -> bindValue(':slug',$slug,PDO::PARAM_STR);
$query -> execute();
$movies = $query ->fetch();
}
?>
<?php include ('inc/header.php') ?>

<h1>Films a voir !</h1>

<?php
echo '<a href="detail.php?slut=' . $slug . '"><img src="posters/' . $movies['id'] . '.jpg" alt=" '. $slug.'"></a><br>';
echo 'title: ' . $movies['title'] . '<br>';
?>


<?php include ('inc/footer.php') ?>
