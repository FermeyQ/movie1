<?php include ('inc/pdo.php') ?>
<?php include ('inc/fonction.php') ?>

<?php
if(!empty($_GET['id']) && is_numeric($_GET['id'])) {
 $id = $_GET['id'];
}
$sql = "SELECT * FROM movies_full WHERE id = $id";
$query = $pdo ->prepare($sql);
$query -> execute();
$movies = $query->fetch();
?>

<?php $title ='Details'; ?>
<?php include('inc/header.php'); ?>

<img src="posters/<?php echo $id ?>.jpg" alt="">
<?php
foreach ($movies as $movie) {
  echo $movie . '<br>';
}
?>
<?php include('inc/footer.php'); ?>
