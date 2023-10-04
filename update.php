<?php
    include_once('mysql.php');

    if(!isset($_GET['id']) && is_numeric($_GET['id'])){
        echo "il faut un identifiant de recette pour le modifier";
        return;
    }

    $requete = $db->prepare("SELECT * FROM recipes WHERE recipe_id = ?");
    $requete->execute(array($_GET['id']));
    $recipe = $requete->fetchAll();

    if(!isset($recipe[0]['title'], $recipe[0]['recipe'], $recipe[0]['recipe_id'])){
        echo "Il manque des informations pour permettre l'édition du formulaire.";
        return;
    }
?>

<!-- update.php -->
<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Site de recettes - Formulaire de Contact</title>
    <link
        href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" 
        rel="stylesheet"
    >
</head>
<body class="d-flex flex-column min-vh-100">
    <div class="container">

    <?php include_once('header.php'); ?>
        <h1>Mettre à jour <?php echo $recipe[0]['title']; ?></h1>
        <form action="update_recipe.php" method="POST">
            <div class="mb-3 visually-hidden">
                <label for="id" class="form-label">Identifiant de la recette</label>
                <?php echo '<input type="hidden" class="form-control" id="id" name="id" value="'.$recipe[0]['recipe_id'].'">'; ?>
            </div>
            <div class="mb-3">
                <label for="text" class="form-label">Titre de la recette</label>
                <?php echo '<input type="text" class="form-control" id="title" name="title" aria-describedby="title-help" value="'.$recipe[0]['title'].'">'; ?>
                <div id="title-help" class="form-text">Choisissez un titre percutant !.</div>
            </div>
            <div class="mb-3">
                <label for="recipe" class="form-label">Description de la recette</label>
                <textarea class="form-control" placeholder="Seulement du contenu vous appartenant ou libre de droits" id="recipe" name="recipe">
                    <?php echo $recipe[0]['recipe']; ?>
                </textarea>
            </div>
            <button type="submit" class="btn btn-primary">Envoyer</button>
        </form>
        <br />
    </div>

    <?php include_once('footer.php'); ?>
</body>
</html>