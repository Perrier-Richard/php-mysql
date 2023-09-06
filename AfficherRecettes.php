<?php
	$recipes = [
		['title'=>'Cassoulet','recipe'=>'Etape 1: faire jsp','author'=>'mickael.andrieu@exemple.com','is_enabled'=> true,],
		['title'=>'Couscous','recipe'=>'Etape 3: fini','author'=>'mickael.andrieu@exemple.com','is_enabled'=> false,],
		['title'=>'Escalopemilanaise','recipe'=>'Etape1: regarder top chef','author'=>'mathieu.nebra@exemple.com','is_enabled'=> true,]
	];
?>

<style>
	h4{
		padding: 0px;
		margin: 0px;
	}
</style>

<!DOCTYPE html>
<html>
	<head>
		<title>Affichage des recettes</title>
	</head>
	<body>
		<?php
			foreach($recipes as $recipe) {
				if($recipe['is_enabled']){
					echo "<h2>".$recipe['title']."</h2>";
					echo "<h4>".$recipe['recipe']."</h4>";
					echo "<h4>".$recipe['author']."</h4>";
				}
			}
		?>
	</body>
</html>