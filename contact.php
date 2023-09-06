<!DOCTYPE html>
<html>
    <head>
        <meta charset="UTF-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Site de recettes - Page d'accueil</title>
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css"rel="stylesheet">
    </head>
    <body class="d-flex flex-column min-vh-100">
        <div class="container">
            <?php include_once('header.php'); ?>
            <h1>Contactez nous</h1>
            <form>
                <input type="email" name="email" placeholder="Email">

                <p>Votre message</p>
                <textarea name="message" placeholder="Exprimez vous"></textarea>
                <br>
                <input type="submit" name="send" value="Envoyer">
            </form>
            <?php include_once('footer.php'); ?>
        </div>
    </body>
</html>