<?php include ('inc/pdo.php') ?>
<?php include ('inc/fonction.php') ?>

<?php
$title ='Details';

// requete id
if(!empty($_GET['slug'])) {
$slug = $_GET['slug'];
$sql = "SELECT * FROM movies_full WHERE slug = :slug";
$query = $pdo ->prepare($sql);
$query -> bindValue(':slug',$slug,PDO::PARAM_STR);
$query -> execute();
$movies = $query->fetch();

}

?>
<?php if (isLogged()): ?>

<?php endif; ?>
<?php include('inc/header.php'); ?>

<!-- poster -->
<img src="posters/<?php echo $movies['id'] ?>.jpg" alt="<?php echo $movies['slug'] ?>">
<br>
<a href="filmsavoir.php?slug= <?php echo $slug ?>">
<input type="submit" name='submitted' value="Film a voir !">
</a>
<br>
<?php

// tout les details
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
