<?php
// Haupteinstiegspunkt der Anwendung
session_start();
require_once __DIR__ . '/config/config.php';
require_once __DIR__ . '/core/Router.php';
require_once __DIR__ . '/core/Controller.php';
require_once __DIR__ . '/core/Database.php';


// Initialisiere Router
$router = new Router();
$router->dispatch(); 