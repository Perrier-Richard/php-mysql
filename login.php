<?php
	session_start();

	if(isset($_POST['email']) && isset($_POST['password'])){
		foreach($users as $user){
			if($user['password'] == $_POST['password'] && $user['email'] == $_POST['email']){
				$_SESSION['email'] = $user['email'];
				$_SESSION['password'] = $user['password'];
				$_SESSION['full_name'] = $user['full_name'];
				$loggedUser = ['email' => $user['email'],];
				setcookie('LOGGED_USER',$user['email'],time() +365*24*3600,"","",true,true);
			}
			else{
				$errorMessage = sprintf('Les informations envoyées ne permettent pas de vous identifier : (%s/%s)', $_POST['email'], $_POST['password']);
			}
		}
	}
?>

<?php
	if (isset($_COOKIE['LOGGED_USER'])) {
		$loggedUser = ['email' => $_COOKIE['LOGGED_USER'],];
	}
?>

<?php if(!isset($loggedUser)): ?>
<form action="index.php" method="POST">
	<?php if(isset($errorMessage)): ?>
	<div class="alert alert-danger" role="alert">
		<?php echo $errorMessage; ?>
	</div>
	<?php endif; ?>
    <div class="mb-3">
        <label for="email" class="form-label">Email</label>
        <input type="email" class="form-control" id="email" name="email" aria-describedby="email-help">
        <div id="email-help" class="form-text">L'email utilisé lors de la création de compte</div>
    </div>
    <div class="mb-3">
	<label for="password" class="form-label">Mot de passe</label>
	<input type="password" class="form-control" id="password" name="password">
    </div>
    <!-- Fin ajout du champ -->
    <button type="submit" class="btn btn-primary">Envoyer</button>
</form>

<?php else: ?>
	<div class="alert alert-success" role="alert">
		Bonjour <?php echo $_SESSION['email']; ?> et bienvenue sur le site !
	</div>
<?php endif; ?>