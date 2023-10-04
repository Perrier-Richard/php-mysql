<!-- recipe.php -->
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
        <h1>Ajouter une recette</h1>
        <form action="submit_recipe.php" method="POST">
            <div class="mb-3">
                <label for="text" class="form-label">Titre</label>
                <input type="text" class="form-control" id="title" name="title" aria-describedby="title-help">
            </div>
            <div class="mb-3">
                <label for="recipe" class="form-label">Votre recette</label>
                <textarea class="form-control" placeholder="Ecriver les étapes de votre recette" id="recipe" name="recipe"></textarea>
            </div>
            <button type="submit" class="btn btn-primary">Publier</button>
        </form>
        <br />
    </div>

    <?php include_once('footer.php'); ?>
</body>
</html>