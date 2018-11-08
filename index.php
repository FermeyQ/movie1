<?php include ('inc/pdo.php') ?>
<?php include ('inc/fonction.php') ?>

<?php $title = 'Accueil';
$sql = "SELECT * FROM movies_full ORDER BY RAND() LIMIT 4";
$query = $pdo ->prepare ($sql);
$query -> execute ();
$movies = $query->fetchAll();



?>

<?php include ('inc/header.php') ?>

<h1>Accueil</h1>
<?php
foreach ( $movies as $movie ) {
  echo '<img src="posters/' . $movie['id'] . '.jpg" alt=" '. $movie['slug'].'">';
  echo $movie['title'];
};
?>
<input type="button" onclick='window.location.reload(false)' value="+ de films !"/>
<?php include ('inc/footer.php') ?>
