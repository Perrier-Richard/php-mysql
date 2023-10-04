<?php
    include_once('mysql.php');
?>

<!-- index.php -->
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

        <?php
            include_once('variables.php');
            include_once('functions.php');
        ?>

        <h1>Site de recettes</h1>

        <?php include_once('login.php'); ?>

        <?php if(isset($loggedUser)):
            $recipesStatement = $db->prepare("SELECT * FROM recipes WHERE is_enabled = 1");
            $recipesStatement->execute();
            $recipes = $recipesStatement->fetchAll();
            foreach($recipes as $recipe) : ?>
                <article>
                    <h3><?php echo $recipe['title']; ?></h3>
                    <div><?php echo $recipe['recipe']; ?></div>
                    <i><?php echo displayAuthor($recipe['author'], $users); ?></i>
                    <?php 
                        if($recipe['author'] == $_SESSION['email']){
                            echo '<a href="update.php?id='.$recipe['recipe_id'].'">Modifier</a>';
                        }
                    ?>
                </article>
            <?php endforeach; ?>
        <?php endif; ?>
    </div>

    <!-- inclusion du bas de page du site -->
    <?php include_once('footer.php'); ?>
</body>
</html>