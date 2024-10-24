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
			<h2>Galeria wybranych zdjęć</h2>
			<form action="/forget" method="post" style="text-align: center;">
				<div class="galeria">
					<?php foreach ($images as $image): ?>
						<div>
							<?php echo "<a href='/images/{$image['_id']}/watermarked{$image['type']}'>"; ?>
								<?php echo"<img src='/images/{$image['_id']}/thumbnail{$image['type']}' alt='miniaturka'>"; ?>
							</a>
							<?php if ($image["publicity"] !== "public"): ?>
								<p style="color: #AC2222;">Zdjęcie prywatne</p>
							<?php endif ?>
							<p>Tytuł: <?php echo $image["title"]; ?></p>
							<p>Autor: <?php echo $image["author"]; ?></p>
							<?php
                                if (isset($logged)) {
                                    echo "<input type='checkbox' name='{$image['_id']}' value='{$image['_id']}'>";
                                }
                            ?>
						</div>
					<?php endforeach ?>
				</div>
				<?php if (isset($logged)): ?>
					<input type="submit" name="" value="Usuń zaznaczone z zapamiętanych">
				<?php endif ?>
			</form>
		</section>
	</div>

	<?php include_once "../views/templates/footer.php" ?>
</body>

</html>
