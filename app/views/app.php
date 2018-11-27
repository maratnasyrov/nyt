<!DOCTYPE html>
<html lang="en" dir="ltr">
    <head>
        <meta charset="utf-8">
        <title>NYT API Search</title>
        <link rel="stylesheet" href="/app/assets/css/app.css">
        <link rel="stylesheet" href="/app/assets/css/article.css">

        <script src="/app/assets/js/search.js" defer></script>
        <script src="https://code.jquery.com/jquery-3.3.1.js" integrity="sha256-2Kok7MbOyxpgUVvAk/HJ2jigOSYS2auK4Pfzbm7uH60=" crossorigin="anonymous"></script>
    </head>
    <body>
        <?php ($content != false) ? include_once($content) : print_r("Страница не создана"); ?>
    </body>
</html>
