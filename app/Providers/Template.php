<?php declare(strict_types = 1);

namespace App\Providers;

class Template {

    private $environment;

    public function __construct(\Twig_Environment $environment) {
        $this->environment = $environment;
    }

    public function render($template) {
        return $this->environment->render($template);
    }

}