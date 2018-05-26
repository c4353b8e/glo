<?php declare(strict_types = 1);

error_reporting(E_ALL);

define("START", microtime(true));
define("ROOT", realpath(__DIR__ . '/..'));

require ROOT . '/app/bootstrap.php';