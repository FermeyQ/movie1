<?php include ('inc/pdo.php') ?>
<?php include ('inc/fonction.php') ?>
<?php
$sql = "SELECT genres FROM movies_full";
$query = $pdo ->prepare ($sql);
$query -> execute ();
$genres = $query->fetchAll();

//print_r($genres);
$tableau = array();
foreach ($genres as $genre) {
  $g =  $genre['genres'];
  $explode = explode(',',$g);

  foreach ($explode as $ex) {
    $ex = trim($ex);
    if(!in_array($ex,$tableau)) {
      if(!empty($ex)) {
        $tableau[] = $ex;
      }
    }
  }
}

$title = 'Accueil';
$sql = "SELECT * FROM movies_full ORDER BY RAND() LIMIT 4";
$query = $pdo ->prepare ($sql);
$query -> execute ();
$movies = $query->fetchAll();

// requete id=slug
$sql = "SELECT * FROM movies_full";
$query = $pdo ->prepare ($sql);
$query -> execute ();
$slug = $query->fetch();
print_r ($slug);

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