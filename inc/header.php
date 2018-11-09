<!DOCTYPE html>
<html lang="fr">
  <head>
    <meta charset="utf-8">
    <title><?php echo $title ?></title>
    <link rel="stylesheet" href="asset/css/style.css">
  </head>
  <body>
    <nav>
      <ul>
      <li><a href="index.php">Accueil</a></li>
      <?php if (isLogged()){ ?>
        <li><a href="filmsavoir.php">Films a voir !</a></li>
        <li><a href="deconnection.php">Déconnexion</a></li>
        <li>Bonjour <?php echo $_SESSION['user']['pseudo']; ?></li>
      <?php }else{ ?>
        <li><a href="inscription.php">Inscription</a></li>
        <li><a href="connection.php">Connexion</a></li>
      <?php } ?>
      </ul>
    </nav>
