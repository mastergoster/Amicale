<div class="card login">
	<article class="card-body">
		<h4 class="card-title text-center mb-4 mt-1">Se connecter</h4>
		<hr>
		<p class="text-success text-center">Veuillez entrer un identifiant et un mot de passe :</p>
		<form action="index.php?action=login" method="POST">
		<div class="form-group">
			<div class="input-group">
				<div class="input-group-prepend">
					<span class="input-group-text"> <i class="fa fa-user"></i> </span>
				</div>
				<input name="username" id="username" class="form-control" placeholder="login" type="text">
			</div> <!-- input-group.// -->
		</div> <!-- form-group// -->
		<div class="form-group">
			<div class="input-group">
				<div class="input-group-prepend">
					<span class="input-group-text"> <i class="fa fa-lock"></i> </span>
				</div>
				<input name="password" id="password" class="form-control" placeholder="******" type="password">
			</div> <!-- input-group.// -->
		</div> <!-- form-group// -->
		<div class="form-group">
			<button type="submit" class="btn btn-primary btn-block">Connexion</button>
		</form>
	</article>
</div>