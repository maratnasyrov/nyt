<?php

class Router {
    private $routes;

    // подключаем файл с маршрутами
    public function __construct() {
        $routesPath = ROOT.'/config/routes.php';
        $this->routes = include "$routesPath";
    }

    public function run() {
        $url = $this->getURL();

        foreach ($this->routes as $route => $path) {
            if ($route == $url) {
                $controllerSegments = explode('/', $path);

                $controllerName = array_shift($controllerSegments).'Controller';
                $controllerName = ucfirst($controllerName);

                $actionName = ucfirst(array_shift($controllerSegments));

                // Подключаю файл класса контроллера
                $controllerFile = ROOT.'/app/controllers/'.$controllerName.'.php';
                (file_exists($controllerFile)) ? include_once($controllerFile) : false;
                $controllerObj = new $controllerName;
                $result = $controllerObj->$actionName();

                if ($result != null) {
                    break;
                }
            }
        }
    }

    // Возвращаем строку запроса
    private function getURL() {
        if (!empty($_SERVER['REQUEST_URI'])) {
            $url = trim($_SERVER['REQUEST_URI'], '/');
        }

        return $url;
    }
}
