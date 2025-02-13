<?php
require_once __DIR__ . '/Theme.php';

class Controller {
    protected $theme;

    public function __construct() {
        $this->theme = new Theme();
    }

    protected function model($model) {
        require_once __DIR__ . '/../../models/' . $model . '.php';
        return new $model();
    }

    protected function view($view, $data = []) {
        require_once $this->theme->getView($view);
    }
} 