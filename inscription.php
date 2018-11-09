<?php include 'inc/fonction.php' ?>
<?php include 'inc/pdo.php' ?>
<?php
$title = 'S\'inscrire';

// FORMULAIRE SOUMIS
$error = array();
if (!empty($_POST['submitted'])) {
// FAILLE XSS
    $pseudo = trim(strip_tags($_POST['pseudo']));
    $email = trim(strip_tags($_POST['email']));
    $password = trim(strip_tags($_POST['password']));
    $password2 = trim(strip_tags($_POST['password2']));

// VALIDATION
    // validation pseudo
    if (!empty($pseudo)) {
        if (strlen($pseudo) < 5) {
            $error['pseudo'] = 'min 5 caracteres';
        } elseif (strlen($pseudo) > 50) {
            $error['pseudo'] = 'max 50 caracteres';
        } else {
            //    requete
            $sql = "SELECT pseudo FROM m1_users WHERE pseudo = :pseudo";
            $query = $pdo->prepare($sql);
            $query->bindValue(':pseudo', $pseudo, PDO::PARAM_STR);
            $query->execute();
            $userpseudo = $query->fetch();
            if (!empty($userpseudo)) {
                $error['pseudo'] = 'pseudo deja utilisé';
            }
        }
    } else {
        $error['pseudo'] = 'renseigner un pseudo';
    }

// validation email
    if (!empty($email)) {
        if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
            $error['email'] = 'renseigner un email';
        } else {
            //    requete
            $sql = "SELECT email FROM m1_users WHERE email = :email";
            $query = $pdo->prepare($sql);
            $query->bindValue(':email', $email, PDO::PARAM_STR);
            $query->execute();
            $useremail = $query->fetch();
            if (!empty($useremail)) {
                $error['email'] = 'email deja utilisé';
            }
        }
    } else {
        $error['email'] = 'renseigner un email';
    }

// validation password
    if (!empty($password) && !empty($password2)) {
        if ($password != $password2) {
            $error['password'] = 'Vos mots de passe ne correspondent pas';
        }
        if (strlen($password) < 6) {
            $error['password'] = 'Votre mot de passe est trop court. (minimum 6 caractères)';
        }
    } else {
        $error['password'] = 'Veuillez entrer un mot de passe';
    }

// SI AUCUNE ERROR
    if (count($error) == 0) {
        $success = true;
        $hash = password_hash($password, PASSWORD_DEFAULT);
        $token = generateRandomString(120);
        $sql = "INSERT INTO m1_users (pseudo,email,token,password,role,created_at) VALUES (:pseudo,:email,'$token',:password,'user',NOW())";
        $query = $pdo->prepare($sql);
        $query->bindValue(':pseudo', $pseudo, PDO::PARAM_STR);
        $query->bindValue(':email', $email, PDO::PARAM_STR);
        $query->bindValue(':password', $hash, PDO::PARAM_STR);
        $query->execute();
        header ('location: connection.php');
    }
}
?>
<?php include 'inc/header.php' ?>

<h2>S'inscrire</h2>

<!-- FORMULAIRES -->
<form action="" method="post">

    <!-- form pseudo -->
    <label for="pseudo">pseudo *</label>
    <span class="error"><?php if (!empty($error['pseudo'])) {echo $error['pseudo'];}?></span>
    <input type="text" name="pseudo" value="<?php if (!empty($_POST['pseudo'])) {echo $_POST['pseudo'];}?>" placeholder="jeanjean">

    <!-- form email -->
    <label for="email">Email *</label>
    <span class="error"><?php if (!empty($error['email'])) {echo $error['email'];}?></span>
    <input type="email" name="email" value="<?php if (!empty($_POST['email'])) {echo $_POST['email'];}?>" placeholder="jeanjean@gmail.com">

    <!-- form password -->
    <label for="password">Password *</label>
    <span class="error"><?php if (!empty($error['password'])) {echo $error['password'];}?></span>
    <input type="password" name="password" value="">

    <!-- form password2 -->
    <label for="password2">Confirm Password *</label>
    <input type="password" name="password2" value="">

    <!-- form submit -->
    <input type="submit" name="submitted" value="Envoyer">
</form>

<?php include 'inc/footer.php'?>
