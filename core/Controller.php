<?php
require_once 'core/Theme.php';

class Controller {
    protected $theme;

    public function __construct() {
        $this->theme = new Theme();
    }

    // ... existing code ...
} 