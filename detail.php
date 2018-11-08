<?php include ('inc/pdo.php') ?>
<?php include ('inc/fonction.php') ?>

<?php $title = 'Detail';
$sql = "SELECT * FROM movies_full ORDER BY RAND() LIMIT 4";
$query = $pdo ->prepare ($sql);
$query -> execute ();
$movies = $query->fetchAll();
foreach ( $movies as $movie ) {
  echo $movie['title'];
}
?>

<?php include ('inc/header.php') ?>

<h1>Detail</h1>
<img src="posters/<?php echo $movies[0]['id']; ?>.jpg" alt=" <?php echo $movies['slug']?>">
<img src="posters/<?php echo $movies[1]['id']; ?>.jpg" alt=" <?php echo $movies['slug']?>">
<img src="posters/<?php echo $movies[2]['id']; ?>.jpg" alt=" <?php echo $movies['slug']?>">
<img src="posters/<?php echo $movies[3]['id']; ?>.jpg" alt=" <?php echo $movies['slug']?>">

<?php include ('inc/footer.php') ?>