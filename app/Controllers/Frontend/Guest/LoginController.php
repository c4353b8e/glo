<?php declare(strict_types = 1);

namespace App\Controllers\Frontend\Guest;

use App\Controllers\Controller;
use App\Providers\Template;

class LoginController extends Controller {

    private $template;

    public function __construct(Template $template) {
        $this->template = $template;
    }

    public function getView() {
        return $this->template->render('login.html');
    }

}