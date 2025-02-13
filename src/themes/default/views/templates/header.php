<?php
if (session_status() === PHP_SESSION_NONE) {
    session_start();
}
?>
<!DOCTYPE html>
<html lang="de">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?= SITE_NAME ?></title>
    <link rel="stylesheet" href="<?= $this->theme->getAssetUrl('css/style.css') ?>">
</head>
<body>
    <header>
        <nav>
            <div class="logo">
                <a href="<?= BASE_URL ?>"><?= SITE_NAME ?></a>
            </div>
            <ul>
                <li><a href="<?= BASE_URL ?>">Start</a></li>
                <?php if(isset($_SESSION['user_id'])) : ?>
                    <li><a href="<?= BASE_URL ?>/user/profile">Profil</a></li>
                    <li><a href="<?= BASE_URL ?>/user/logout">Logout</a></li>
                <?php else : ?>
                    <li><a href="<?= BASE_URL ?>/user/login">Login</a></li>
                    <li><a href="<?= BASE_URL ?>/user/register">Registrieren</a></li>
                <?php endif; ?>
            </ul>
        </nav>
    </header>
    <main> 