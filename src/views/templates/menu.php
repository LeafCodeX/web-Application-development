<nav class="menu">
	<h3 id="tytul">Podstrony</h3>
	<ul>
		<li><a href="/">Ogólne informacje</a></li>
		<li><a href="/search">Wyszukiwarka</a></li>
		<li><a href="/gallery">Galeria</a></li>
		<?php if(isset($_SESSION["logged"])): ?>
			<?php if(isset($_SESSION["selectedImages"])): ?>
				<?php if(count($_SESSION["selectedImages"]) > 0): ?>
					<li><a href="/selected">Wybrane zdjęcia</a></li>
				<?php endif ?>
			<?php endif ?>
			<li><a href="/logout">Wyloguj się</a></li>
		<?php else: ?>
			<li><a href="/loginPage">Zaloguj się</a></li>
			<li><a href="/registerPage">Zarejestruj się</a></li>
		<?php endif ?>
	</ul>
	<?php
		if(isset($_SESSION["logged"])) {
			echo "<p>Zalogowany jako: {$_SESSION['loggedUser']}</p>";
		}
	?>
</nav>
