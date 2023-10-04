<?php
    include_once('mysql.php');
    session_start();
?>

<!-- submit_recipe.php -->
<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Site de recettes - Page d'accueil</title>
    <link
        href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" 
        rel="stylesheet"
    >
</head>
<body class="d-flex flex-column min-vh-100">
    <div class="container">

    <?php include_once('header.php'); ?>
        <h1>Site de recettes</h1>

        <!-- inclusion des variables et fonctions -->
        <?php
            include_once('variables.php');
            include_once('functions.php');
        ?>

        <!-- inclusion de l'entête du site -->
        <?php include_once('header.php'); ?>

        <?php
            if (
                (!isset($_POST['id']) || empty($_POST['id']))
                || (!isset($_POST['comment']) || empty($_POST['comment']))
                || (!isset($_SESSION['email']) || empty($_SESSION['email']))
                )
            {
                echo('<h1>Il faut un identifiant ou une session valides pour soumettre le formulaire.</h1>');
                return;
            }
        ?>

        <?php
            $requete = $db->prepare("SELECT * FROM users WHERE email = ?");
            $requete->execute(array($_SESSION['email']));
            $userData = $requete->fetchAll();
            $userId = $userData[0]['user_id'];
            
            $recipesStatement = $db->prepare("INSERT INTO comments (comment_id, user_id, recipe_id, comment) VALUES ('0', ?, ?, ?)");
            $recipesStatement->execute(array($userId, $_POST['id'], $_POST['comment']))
            or die(print_r($db->errorInfo()));
        ?>

        <h1>Commmentaire ajouté avec succés !</h1>
        <div class="card">
            <div class="card-body">
                <p class="card-text"><b>Votre commentaire</b> : <?php echo $_POST['comment']; ?></p>
            </div>
        </div>
    </div>

    <!-- inclusion du bas de page du site -->
    <?php include_once('footer.php'); ?>
</body>
</html>