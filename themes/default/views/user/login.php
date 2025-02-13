<?php require_once 'views/templates/header.php'; ?>

<div class="form-container">
    <h2>Login</h2>

    <?php if (isset($_SESSION['success_message'])) : ?>
        <div class="success-message">
            <?= $_SESSION['success_message'] ?>
            <?php unset($_SESSION['success_message']); ?>
        </div>
    <?php endif; ?>
    
    <form action="<?= BASE_URL ?>/user/login" method="post">
        <div class="form-group">
            <label for="email">E-Mail:</label>
            <input type="email" id="email" name="email" 
                   value="<?= htmlspecialchars($data['email'] ?? '') ?>" required>
        </div>

        <div class="form-group">
            <label for="password">Passwort:</label>
            <input type="password" id="password" name="password" required>
        </div>

        <?php if (isset($data['errors']['login'])) : ?>
            <div class="error"><?= $data['errors']['login'] ?></div>
        <?php endif; ?>

        <button type="submit">Einloggen</button>
    </form>
    
    <p>Noch kein Konto? <a href="<?= BASE_URL ?>/user/register">Hier registrieren</a></p>
</div>

<?php require_once 'views/templates/footer.php'; ?> 