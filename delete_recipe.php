<?php
    include_once('mysql.php');
?>

<!-- delete_recipe.php -->
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
            if(!isset($_GET['id']) && is_numeric($_GET['id'])){
                echo "<h1>il faut un identifiant de recette pour le supprimer</h1>";
                return;
            }
        
            $requete = $db->prepare("DELETE FROM recipes WHERE recipe_id = ?");
            $requete->execute(array($_GET['id']));
        ?>

        <h1>Recette supprimer avec succès !</h1>
    </div>

    <!-- inclusion du bas de page du site -->
    <?php include_once('footer.php'); ?>
</body>
</html>