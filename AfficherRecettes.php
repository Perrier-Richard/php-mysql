<?php
	$users = [
	    [
	        'full_name' => 'Mickaël Andrieu',
	        'email' => 'mickael.andrieu@exemple.com',
	        'age' => 34,
	    ],
	    [
	        'full_name' => 'Mathieu Nebra',
	        'email' => 'mathieu.nebra@exemple.com',
	        'age' => 34,
	    ],
	    [
	        'full_name' => 'Laurène Castor',
	        'email' => 'laurene.castor@exemple.com',
	        'age' => 28,
	    ],
	];

	$recipes = [
	    [
	        'title' => 'Cassoulet',
	        'recipe' => '',
	        'author' => 'mickael.andrieu@exemple.com',
	        'is_enabled' => true,
	    ],
	    [
	        'title' => 'Couscous',
	        'recipe' => '',
	        'author' => 'mickael.andrieu@exemple.com',
	        'is_enabled' => false,
	    ],
	    [
	        'title' => 'Escalope milanaise',
	        'recipe' => '',
	        'author' => 'mathieu.nebra@exemple.com',
	        'is_enabled' => true,
	    ],
	    [
	        'title' => 'Salade Romaine',
	        'recipe' => '',
	        'author' => 'laurene.castor@exemple.com',
	        'is_enabled' => false,
	    ],
	];

	function isValidRecipe(array $recipe):bool {
		if(array_key_exists('is_enabled', $recipe)) {
			$isEnabled = $recipe['is_enabled'];
		}else{
			$isEnabled = false;
		}
		return $isEnabled;
	}

	function getRecipes(array $recipes):array {
		$validRecipes = [];
		foreach($recipes as $recipe)  {
			if (isValidRecipe($recipe)) {
				$validRecipes[] = $recipe;
			}
		}
		return $validRecipes;
	}

	function displayAuthor(string $authorEmail, array $users):string {
		for($i = 0; $i < count($users); $i++) {
			$author = $users[$i];
			if ($authorEmail === $author['email']) {
				return $author['full_name'].'('.$author['age'].'ans)';
			}
		}
	}

	$romanSalad = ['title'=>'Salade Romaine','recipe'=>'Etape 1: Lavez la salade; Etape 2: euh...','author'=>'laurene.castor@exemple.com','is_enabled'=> true,];
	$sushis = ['title'=>'Sushis','recipe'=>'Etape 1: du saumon; Etape 2: du riz','author'=>'laurene.castor@exemple.com','is_enabled'=> false,];

	$isRomandSaladValid = isValidRecipe($romanSalad);
	$isSushisValid = isValidRecipe($sushis);
?>

<style>
	h2{
		margin-bottom: 10px;
	}

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
		<h1>Liste des recettes de cuisine</h1>

		<?php
/*			foreach(getRecipes($recipes) as $recipe) {
				echo "<h2>".$recipe['title']."</h2>";
				echo "<h4>".$recipe['recipe']."</h4>";
				echo "<h4>".$recipe['author']."</h4>";
			}*/

			foreach(getRecipes($recipes) as $recipe) {
				echo "<h2>".$recipe['title']."</h2>";
				echo "<h4>".displayAuthor($recipe['author'], $users)."</h4>";	
			}
		?>
	</body>
</html>