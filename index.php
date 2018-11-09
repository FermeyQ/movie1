<?php include ('inc/pdo.php') ?>
<?php include ('inc/fonction.php') ?>

<?php
print_r ($_SESSION);
$title = 'Accueil';

// requete genres
$sql = "SELECT genres FROM movies_full";
$query = $pdo ->prepare ($sql);
$query -> execute ();
$genres = $query->fetchAll();

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

$sql = "SELECT * FROM movies_full ORDER BY RAND() LIMIT 4";
$query = $pdo ->prepare ($sql);
$query -> execute ();
$movies = $query->fetchAll();

// requete id=slug
// $sql = "SELECT * FROM movies_full";
// $query = $pdo ->prepare ($sql);
// $query -> execute ();
// $slug = $query->fetch();
// print_r ($slug);

?>
<?php include ('inc/header.php') ?>

<h1>Accueil</h1>

<!-- checkbox -->
<form id="checkbox" method="post" action="">
      <input type="checkbox" name="Action " class="checkbox" <?=(isset($_POST['Action '])?' checked':'')?>/> Action
      <input type="checkbox" name="Adventure " class="checkbox" <?=(isset($_POST['Adventure '])?' checked':'')?>/> Adventure
      <input type="checkbox" name="Animation " class="checkbox" <?=(isset($_POST['Animation '])?' checked':'')?>/> Animation
      <input type="checkbox" name="Biography " class="checkbox" <?=(isset($_POST['Biography '])?' checked':'')?>/> Biography 
      <input type="checkbox" name="Comedy " class="checkbox" <?=(isset($_POST['Comedy '])?' checked':'')?>/> Comedy
      <input type="checkbox" name="Crime " class="checkbox" <?=(isset($_POST['Crime '])?' checked':'')?>/> Crime 
      <input type="checkbox" name="Documentary " class="checkbox" <?=(isset($_POST['Documentary '])?' checked':'')?>/> Documentary 
      <input type="checkbox" name="Drama" class="checkbox" <?=(isset($_POST['Drama'])?' checked':'')?>/> Drama
      <input type="checkbox" name="Family" class="checkbox" <?=(isset($_POST['Family'])?' checked':'')?>/> Family
      <input type="checkbox" name="Fantasy " class="checkbox" <?=(isset($_POST['Fantasy '])?' checked':'')?>/> Fantasy
      <input type="checkbox" name="Film-Noir" class="checkbox" <?=(isset($_POST['Film-Noir'])?' checked':'')?>/> Film-Noir
      <input type="checkbox" name="History " class="checkbox" <?=(isset($_POST['History '])?' checked':'')?>/> History
      <input type="checkbox" name="Horror " class="checkbox" <?=(isset($_POST['Horror '])?' checked':'')?>/> Horror
      <input type="checkbox" name="Music " class="checkbox" <?=(isset($_POST['Music '])?' checked':'')?>/> Music 
      <input type="checkbox" name="Musical " class="checkbox" <?=(isset($_POST['Musical '])?' checked':'')?>/> Musical
      <input type="checkbox" name="Mystery " class="checkbox" <?=(isset($_POST['Mystery '])?' checked':'')?>/> Mystery
      <input type="checkbox" name="News " class="checkbox" <?=(isset($_POST['News '])?' checked':'')?>/> News 
      <input type="checkbox" name="Romance " class="checkbox" <?=(isset($_POST['Romance '])?' checked':'')?>/> animation
      <input type="checkbox" name="Sci-Fi " class="checkbox" <?=(isset($_POST['Sci-Fi '])?' checked':'')?>/> Sci-Fi 
      <input type="checkbox" name="Short " class="checkbox" <?=(isset($_POST['Short '])?' checked':'')?>/> Short 
      <input type="checkbox" name="Sport " class="checkbox" <?=(isset($_POST['Sport '])?' checked':'')?>/> Sport
      <input type="checkbox" name="Thriller " class="checkbox" <?=(isset($_POST['Thriller '])?' checked':'')?>/> Thriller
      <input type="checkbox" name="War " class="checkbox" <?=(isset($_POST['War '])?' checked':'')?>/> War
      <input type="checkbox" name="Western " class="checkbox" <?=(isset($_POST['Western '])?' checked':'')?>/> Western 
      <input type="checkbox" name="N/A " class="checkbox" <?=(isset($_POST['N/A '])?' checked':'')?>/> N/A
  </form>

<?php

// lien detail
foreach ( $movies as $movie ) {
  echo '<a href="detail.php?id=' . $movie['id'] . '"><img src="posters/' . $movie['id'] . '.jpg" alt=" '. $movie['slug'].'"></a>';
  echo $movie['title'];
};
?>
<input type="button" onclick='window.location.reload(false)' value="+ de films !"/>

<?php include ('inc/footer.php') ?>