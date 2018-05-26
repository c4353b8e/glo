<?php declare(strict_types = 1);

$twigLoaderRule = [
    "constructParams" => [ROOT . '/resources/templates'],
    "shared" => true,
];

$dice->addRule("Twig_Loader_Filesystem", $twigLoaderRule);

$twigEnvironmentRule = [
    "constructParams" => [$dice->create("Twig_Loader_Filesystem"), array('cache' => ROOT . '/storage/cache/templates/')],
    "shared" => true,
];

$dice->addRule("Twig_Environment", $twigEnvironmentRule);

$controllerRule = [
    "constructParams" => [$dice->create("App\Providers\Template")],
];

$dice->addRule("LoginController", $controllerRule);