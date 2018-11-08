<!DOCTYPE html>
<html lang="fr">
  <head>
    <meta charset="utf-8">
    <title>Inscription - Connexion</title>
    <style media="screen">
      label {display:block;}
    </style>
  </head>
  <body>
    <header>
      <nav>
        <ul>
          <li><a href="index.php">Home</a></li>
          <?php if(isLogged()) { ?>
              <li><a href="deconnexion.php">Deconnexion</a></li>
              <li>Bonjour <?= $_SESSION['user']['pseudo']; ?></li>
          <?php } else { ?>
              <li><a href="inscription.php">Inscription</a></li>
              <li><a href="connexion.php">connexion</a></li>
          <?php } ?>

        </ul>
      </nav>


    <div id="container">
