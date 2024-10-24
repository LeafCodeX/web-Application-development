<!DOCTYPE html>
<html lang="pl-PL">

<head>
	<meta charset="utf-8">
	<meta name="author" content="Marcin Bajkowski, nr 193696, semestr 3, IT">
	<meta name="generator" content="Atom">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<link rel="stylesheet" href="/styles/upload.css">
	<title>Login Succes</title>
</head>

<body>
	<div class="window" style="background-color: #5EC766;">
		Rejestracja używkownika <?php echo $user; ?> <br>
		przebiegła pomyślnie!<br><br>
		Za chwilę nastąpi przekierowanie do strony logowania
	</div>
	<script type="text/javascript">
		setTimeout(function() {window.location.replace("loginPage");}, 3000);
	</script>
</body>

</html>
