<?php include ('inc/pdo.php') ?>
<?php include ('inc/fonction.php') ?>

<?php
$id = $_GET['id'];
$title = 'Films a voir !';
if(!empty($_GET['id'])) {
$id = urldecode($_GET['id']);
$id = trim($_GET['id']);
$sql = "SELECT * FROM movies_full WHERE id = :id";
$query = $pdo ->prepare($sql);
$query -> bindValue(':id',$id,PDO::PARAM_STR);
$query -> execute();
$movies = $query->fetch();
}
?>
<?php include ('inc/header.php') ?>

<h1>Films a voir !</h1>


 <a href="detail.php?id=<?php echo $id?>"><img src="posters/<?php echo $id ?>.jpg" alt="<?php echo $movies['slug'] ?>"></a><br>
<p><?php echo $movies['slug'] ?></p>


<?php include ('inc/footer.php') ?>
