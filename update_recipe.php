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
                (!isset($_POST['title']) || empty($_POST['title']))
                || (!isset($_POST['recipe']) || empty($_POST['recipe']))
                )
            {
                echo('<h1>Il faut un titre et une rectte valides pour soumettre le formulaire.</h1>');
                return;
            }
        ?>

        <?php
            $recipesStatement = $db->prepare("UPDATE recipes SET title = ?, recipe = ? WHERE recipe_id = ?");
            $recipesStatement->execute(array($_POST['title'], $_POST['recipe'], $_POST['id']))
            or die(print_r($db->errorInfo()));
        ?>

        <h1>Recette modifiée avec succès !</h1>
        <div class="card">
            <div class="card-body">
                <h5 class="card-title"><?php echo $_POST['title']; ?></h5>
                <p class="card-text"><b>email</b> : <?php echo $_SESSION['email']; ?></p>
                <p class="card-text"><b>Recette</b> : <?php echo strip_tags($_POST['recipe']); ?></p>
            </div>
        </div>
    </div>

    <!-- inclusion du bas de page du site -->
    <?php include_once('footer.php'); ?>
</body>
</html>