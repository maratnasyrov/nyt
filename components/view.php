<?php
/**
* Целью создания данного класса является добавление основной
* view с ПОДКЛЮЧЕННЫМИ НАСТРОЙКАМИ (JS, CSS И Т.Д.), и дальнейшего подставления нужных вьюх в главную.
**/
class View {
    public static function show_page($pagepath, $data) {
        /**
        * создаем для вьюхи переданные переменные в массиве data,
        * для использования непосредственно вызовом самой переменной во вьюхе,
        * а не через массив data
        **/
        foreach (array_keys($data) as $variable) {
            $object = "$variable";
            ${$object} = $data[$variable];
        }

        // подключаем основную страницу с различными настройками (js, css)
        $mainPageFile = ROOT.'/app/views/app.php';
        $viewFile = ROOT.'/app/views/'.$pagepath.'.php';

        if (file_exists($viewFile)) {
            // создаем переменную content, которая будет в дальнейшем подключать часть вьюхи, которая необходима
            $content = $viewFile;
        } else {
            $content =  false;
        }

        include_once($mainPageFile);
    }

    public static function render_page_part($pagepath, $data) {
        foreach (array_keys($data) as $variable) {
            $object = "$variable";
            ${$object} = $data[$variable];
        }

        $viewFile = ROOT.'/app/views/'.$pagepath.'.php';

        include_once($viewFile);
    }
}
