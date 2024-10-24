<!DOCTYPE html>
<html lang="pl-PL">

<head>
	<?php require_once "../views/templates/head.php"; ?>
</head>

<body>
	<?php require_once "../views/templates/header.php"; ?>
	<div class="srodek">
		<?php include_once "../views/templates/menu.php"; ?>

		<section class="tresc">
			<?php if (isset($registerSucces)): ?>
				<p style="color: #1B9F24;">Rejestracja przebiegła pomyślnie!</p>
				<p style="color: #1B9F24;">Teraz możesz się zalogować.</p>
			<?php endif ?>
			<h3>Zaloguj się</h3><br>
			<form class="" action="/login" method="post">
				Nazwa użytkownika: <input type="text" name="username" value="" required="required" maxlength="20" autofocus="autofocus"><br>
				Hasło: <input type="password" name="password" value="" required="required" maxlength="20"><br>
				<input type="submit" name="submit" value="Zaloguj">
			</form>
			<?php if (isset($nouser)): ?>
				<p style="color: #B82525;">Podany użytkownik nie istnieje!</p>
			<?php endif ?>
			<?php if (isset($wrongpassword)): ?>
				<p style="color: #B82525;">Podane hasło jest niepoprawne!</p>
			<?php endif ?>
		</section>
	</div>

	<?php include_once "../views/templates/footer.php" ?>
</body>

</html>
