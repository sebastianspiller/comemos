<?php
// Haupteinstiegspunkt der Anwendung
session_start();
require_once 'config/config.php';
require_once 'core/Router.php';
require_once 'core/Controller.php';
require_once 'core/Database.php';

// Initialisiere Router
$router = new Router();
$router->dispatch(); 