<?php
require_once 'src/core/Theme.php';

class Controller {
    protected $theme;

    public function __construct() {
        $this->theme = new Theme();
    }

    protected function model($model) {
        require_once 'models/' . $model . '.php';
        return new $model();
    }

    protected function view($view, $data = []) {
        require_once $this->theme->getView($view);
    }
} 