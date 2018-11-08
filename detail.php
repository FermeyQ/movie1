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
<br>
<?php

echo 'title: ' . $movies['title'] . '<br>';
echo 'year : ' . $movies['year'] . '<br>';
echo 'genres : ' . $movies['genres'] . '<br>';
echo 'plot : ' . $movies['plot'] . '<br>';
echo 'directors : ' . $movies['directors'] . '<br>';
echo 'cast : ' . $movies['cast'] . '<br>';
echo 'writters : ' . $movies['writers'] . '<br>';
echo 'runtime : ' . $movies['runtime'] . '<br>';
echo 'mpaa : ' . $movies['mpaa'] . '<br>';
echo 'rating : ' . $movies['rating'] . '<br>';
echo 'popularity : ' . $movies['popularity'] . '<br>';
echo 'modified : ' . $movies['modified'] . '<br>';
echo 'created : ' . $movies['created'] . '<br>';
echo 'poster_flag : ' . $movies['poster_flag'] . '<br>';
?>
<?php include('inc/footer.php'); ?>
