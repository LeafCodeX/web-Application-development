<!DOCTYPE html>
<html lang="pl-PL">

<head>
	<?php require_once "../views/templates/head.php"; ?>
	<script src="/scripts/searchEngine.js" charset="utf-8"></script>
</head>

<body>
	<?php require_once "../views/templates/header.php"; ?>
	<div class="srodek">
		<?php include_once "../views/templates/menu.php"; ?>

		<section class="tresc">
			<h3>Wyszukiwarka</h3>
			Wyszukaj zdjęcie w bazie danych:<br>
			<input type="text" name="searchQuery" id="searchQuery" placeholder="Wyszukaj..." autofocus="autofocuscat ">
			<br>
			<h3>Wynik</h3>
			<div class="galeria" id="searchOutput"></div>
		</section>
		
	<?php include_once "../views/templates/footer.php" ?>
</body>

</html>
