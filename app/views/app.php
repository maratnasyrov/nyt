<!DOCTYPE html>
<html lang="en" dir="ltr">
    <head>
        <meta charset="utf-8">
        <title></title>
    </head>
    <body>
        <h2>Главная страница</h2>

        <?php ($content != false) ? include_once($content) : print_r("Страница не создана"); ?>
    </body>
</html>
