<?php include ('inc/pdo.php') ?>
<?php include ('inc/fonction.php') ?>

<?php
$slug = $_GET['slug'];
$title = 'Films a voir !';
if(!empty($_GET['slug'])) {
$slug = urldecode($_GET['slug']);
$slug = trim($_GET['slug']);
$sql = "SELECT * FROM movies_full WHERE slug = :slug";
$query = $pdo ->prepare($sql);
$query -> bindValue(':slug',$slug,PDO::PARAM_STR);
$query -> execute();
$movies = $query->fetch();
}
?>
<?php include ('inc/header.php') ?>

<h1>Films a voir !</h1>


 <a href="detail.php?slug=<?php echo $slug?>"><img src="posters/<?php echo $movies['id'] ?>.jpg" alt="<?php echo $slug ?>"></a><br>
<p><?php echo $slug ?></p>


<?php include ('inc/footer.php') ?>
