<?php
// Autoload core classes and controllers
spl_autoload_register(function ($class) {
    $paths = [
        __DIR__ . '/../core/' . $class . '.php',
        __DIR__ . '/../app/controllers/' . $class . '.php',
        __DIR__ . '/../app/models/' . $class . '.php',
    ];
    foreach ($paths as $path) {
        if (file_exists($path)) {
            require_once $path;
            return;
        }
    }
});

$url = isset($_GET['url']) ? trim($_GET['url'], '/') : 'home/index';
$urlSegments = explode('/', $url);

$controllerName = ucfirst(strtolower($urlSegments[0])) . 'Controller';
$action = isset($urlSegments[1]) ? strtolower($urlSegments[1]) : 'index';
$params = array_slice($urlSegments, 2);

echo "Routing to controller: $controllerName, action: $action\n";

if (class_exists($controllerName)) {
    $controller = new $controllerName();
    if (method_exists($controller, $action)) {
        call_user_func_array([$controller, $action], $params);
    } else {
        http_response_code(404);
        echo "Action '$action' not found.";
    }
} else {
    http_response_code(404);
    echo "Controller '$controllerName' not found.";
}
