<?php
/**
* Целью создания данного класса является добавление основной
* view с ПОДКЛЮЧЕННЫМИ НАСТРОЙКАМИ (JS, CSS И Т.Д.), и дальнейшего подставления нужных вьюх в главную.
**/
class View {
    private $mainPage;

    public function __construct($pagepath, $data) {
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
        $this->mainPage = ROOT.'/app/views/app.php';

        // создаем переменную content, которая будет в дальнейшем подключать часть вьюхи, которая необходима
        $content = $this->render($pagepath, $data);
        include_once($this->mainPage);
    }

    // метод для добавления content на основную страницу
    public static function render($pagepath) {
        $viewSegments = explode("/", $pagepath);
        $className = array_shift($viewSegments);
        $page = array_shift($viewSegments);

        $viewFile = ROOT.'/app/views/'.$className.'/'.$page.'.php';

        if (file_exists($viewFile)) {
            return $viewFile;
        } else {
            return false;
        }
    }
}
