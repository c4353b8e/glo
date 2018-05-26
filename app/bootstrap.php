<?php declare(strict_types = 1);

require ROOT . '/vendor/autoload.php';

$environment = 'development';
$whoops = new \Whoops\Run;

if ($environment !== 'production') {
    $whoops->pushHandler(new \Whoops\Handler\PrettyPageHandler);
}
else {
    $whoops->pushHandler(function ($e) {
        echo 'TODO: Friendly error page and send an email?';
    });
}

$whoops->register();

$dice = new \Dice\Dice;

include 'dependencies.php';
include 'routes.php';
