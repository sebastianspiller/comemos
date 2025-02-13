<?php require_once __DIR__ . '/../templates/header.php'; ?>

<div class="home-container">
    <div class="welcome-section">
        <h1><?= $data['title'] ?></h1>
        <p class="lead"><?= $data['description'] ?></p>
        
        <?php if(!isset($_SESSION['user_id'])) : ?>
            <div class="cta-buttons">
                <a href="<?= BASE_URL ?>/user/register" class="btn btn-primary">Jetzt registrieren</a>
                <a href="<?= BASE_URL ?>/user/login" class="btn btn-secondary">Einloggen</a>
            </div>
        <?php endif; ?>
    </div>

    <div class="features-section">
        <h2>Unsere Features</h2>
        <div class="features-grid">
            <div class="feature-card">
                <h3>Community</h3>
                <p>Vernetzen Sie sich mit Gleichgesinnten und tauschen Sie sich aus.</p>
            </div>
            <div class="feature-card">
                <h3>Diskussionen</h3>
                <p>Starten Sie interessante Diskussionen oder nehmen Sie an bestehenden teil.</p>
            </div>
            <div class="feature-card">
                <h3>Profile</h3>
                <p>Erstellen Sie Ihr persönliches Profil und teilen Sie Ihre Interessen.</p>
            </div>
        </div>
    </div>
</div>

<?php require_once __DIR__ . '/../templates/footer.php'; ?> 