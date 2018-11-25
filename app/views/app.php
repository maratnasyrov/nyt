<!DOCTYPE html>
<html lang="en" dir="ltr">
    <head>
        <meta charset="utf-8">
        <title></title>
        <link rel="stylesheet" href="/app/assets/css/app.css">
        <link rel="stylesheet" href="/app/assets/css/article.css">
    </head>
    <body>
        <?php ($content != false) ? include_once($content) : print_r("Страница не создана"); ?>
    </body>
</html>
