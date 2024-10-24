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
			<?php if (isset($userExists)): ?>
				<p style="color: #B82525;">Uzytkownik <?php echo $user; ?> już istnieje!</p>
			<?php endif ?>
			<?php if (isset($passwordError)): ?>
				<p style="color: #B82525;">Podane hasła nie zgadzają się!</p>
			<?php endif ?>
			<h3>Zarejestruj się</h3><br>
			<form class="" action="/addUser" method="post">
				E-mail: <input type="email" name="email" value="" required="required" autocomplete="off" autofocus="autofocus"><br>
				Nazwa użytkownika: <input type="text" name="username" value="" required="required" autocomplete="off" maxlength="20"><br>
				Hasło: <input type="password" name="password" value="" required="required" autocomplete="off" maxlength="20"><br>
				Powtórz hasło: <input type="password" name="passRep" value="" required="required" autocomplete="off" maxlength="20"><br>
				<input type="submit" name="submit" value="Zarejestruj">
			</form>
		</section>
	</div>

	<?php include_once "../views/templates/footer.php" ?>
</body>

</html>
