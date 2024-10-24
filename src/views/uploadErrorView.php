<!DOCTYPE html>
<html lang="pl-PL">

<head>
    <meta charset="utf-8">
    <meta name="author" content="Marcin Bajkowski, nr 193696, semestr 3, IT">
    <meta name="generator" content="Atom">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="/styles/upload.css">
    <title>Upload Error</title>
</head>

<body>
    <div class="window">
		Upload nie powiódł się!
        <?php if ($typeError && $sizeError): ?>
            <br>Rozmiar pliku przekracza 1 MB oraz zawiera nieprawidłowy format!
        <?php elseif ($typeError): ?>
            <br>Plik zawiera nieprawidłowy format!
        <?php elseif ($sizeError): ?>
            <br>Plik przekracza 1 MB!
        <?php endif; ?>
        <br>Za chwilę nastąpi przekierowanie do galerii.
    </div>
    <script type="text/javascript">
        setTimeout(function() { window.location.replace("gallery"); }, 5000);
    </script>
</body>

</html>
