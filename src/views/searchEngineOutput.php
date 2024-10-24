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
	</div>
<?php endforeach ?>
