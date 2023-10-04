<?php
    include_once('mysql.php');

    if(!isset($_GET['id']) && is_numeric($_GET['id'])){
        echo "il faut un identifiant de recette pour pouvoir la voir";
        return;
    }

    $requete = $db->prepare("SELECT * FROM recipes WHERE recipe_id = ?");
    $requete->execute(array($_GET['id']));
    $recipe = $requete->fetchAll();

    if(!isset($recipe[0]['title'], $recipe[0]['recipe'], $recipe[0]['recipe_id'])){
        echo "Il manque des informations pour permettre l'affichache des commentaires.";
        return;
    }
?>

<!-- comment.php -->
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
        <article>
            <h3><?php echo $recipe[0]['title']; ?></h3>
            <div><?php echo $recipe[0]['recipe']; ?></div>
            <br>
            <i>Contribuée par <?php echo $recipe[0]['author']; ?></i>
        </article>

        <br>

        <h1>Commentaires</h1>
        <form action="submit_comment.php" method="POST">
            <div class="mb-3 visually-hidden">
                <label for="id" class="form-label">Identifiant de la recette</label>
                <?php echo '<input type="hidden" class="form-control" id="id" name="id" value="'.$recipe[0]['recipe_id'].'">'; ?>
            </div>
            <div class="mb-3">
                <label for="comment" class="form-label">Postez un commentaire</label>
                <textarea class="form-control" placeholder="Soyez respectueux/se, nous sommes humain(e)s" id="comment" name="comment"></textarea>
            </div>
            <button type="submit" class="btn btn-primary">Envoyer</button>
        </form>
        <br />
    </div>

    <?php include_once('footer.php'); ?>
</body>
</html>