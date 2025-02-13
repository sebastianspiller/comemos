<?php
class Theme {
    private $currentTheme;
    private $themePath;

    public function __construct() {
        $this->currentTheme = 'default';
        $this->themePath = 'themes/' . $this->currentTheme;
    }

    public function getView($view) {
        $themeView = $this->themePath . '/views/' . $view . '.php';
        $defaultView = 'views/' . $view . '.php';
        
        return file_exists($themeView) ? $themeView : $defaultView;
    }

    public function getAssetUrl($path) {
        return BASE_URL . '/' . $this->themePath . '/assets/' . $path;
    }

    public function setTheme($theme) {
        if (is_dir('themes/' . $theme)) {
            $this->currentTheme = $theme;
            $this->themePath = 'themes/' . $theme;
            return true;
        }
        return false;
    }
} 