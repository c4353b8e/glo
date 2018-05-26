<?php declare(strict_types = 1);

$dispatcher = FastRoute\cachedDispatcher(function(FastRoute\RouteCollector $router) {

    $router->addRoute('GET', '/', ['App\Controllers\Frontend\Guest\LoginController', 'getView']);

}, [ 'cacheFile' => ROOT . '/storage/cache/route.cache', 'cacheDisabled' => false, ]);


$httpMethod = $_SERVER['REQUEST_METHOD'];
$uri = $_SERVER['REQUEST_URI'];

if (false !== $pos = strpos($uri, '?')) {
    $uri = substr($uri, 0, $pos);
}

$uri = rawurldecode($uri);

$routeInfo = $dispatcher->dispatch($httpMethod, $uri);

switch ($routeInfo[0]) {
    case FastRoute\Dispatcher::NOT_FOUND:
        echo '404 Not Found';
        break;
    case FastRoute\Dispatcher::METHOD_NOT_ALLOWED:
        $allowedMethods = $routeInfo[1];
        echo '405 Method Not Allowed';
        break;
    case FastRoute\Dispatcher::FOUND:

        $controller = $dice->create($routeInfo[1][0]);
        echo $controller->{$routeInfo[1][1]}($routeInfo[2]);
        break;
}