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
			<h2>Galeria zdjęć</h2>
			<form action="/remember" method="post" style="text-align: center;">
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
									$id = (string)$image["_id"];
									if (isset($image["selected"])) {
										echo "<input type='checkbox' name='{$image['_id']}' value='{$image['_id']}' checked='checked' disabled='disabled'>";
									} else {
										echo "<input type='checkbox' name='{$image['_id']}' value='{$image['_id']}'>";
									}
								}
							?>
						</div>
					<?php endforeach ?>
				</div>
				<?php if (isset($logged) && count($images) > 0): ?>
					<input type="submit" name="" value="Zapamiętaj wybrane">
				<?php endif ?>
			</form>
			<br><br>

			<form id="form_id" action="/upload" method="post" enctype="multipart/form-data">
				<h3>Wrzuć swoją grafikę!</h3>
				Grafika w formacie jpg/png o rozmiarze < 1 MB<br>
				<input type="file" name="image" required="required"><br>
				Znak wodny: <input type="text" name="watermark" value="" required="required" autocomplete="off"><br>
				<?php if (isset($logged)): ?>
					Autor: <input type="text" name="author" value="<?php echo $loggedUser ?>" required="required" autocomplete="off" readonly="readonly"><br>
				<?php else: ?>
					Autor: <input type="text" name="author" required="required" autocomplete="off"><br>
				<?php endif ?>
				Tytuł: <input type="text" name="title" value="" required="required" autocomplete="off"><br>
				<?php if (isset($logged)): ?>
					Typ zdjęcia:<br>
					<input type="radio" name="publicitySetting" value="public" checked="checked"> Publiczne<br>
					<input type="radio" name="publicitySetting" value="private"> Prywatne<br>
				<?php endif ?>
				<input type="reset" name="" value="Wyczyść">
				<input type="submit" name="submit" value="Wyślij">
			</form>
			
		</section>
	</div>

	<?php include_once "../views/templates/footer.php" ?>
</body>

</html>
