<?php require_once 'views/templates/header.php'; ?>

<div class="form-container">
    <h2>Registrierung</h2>
    
    <form action="<?= BASE_URL ?>/user/register" method="post">
        <div class="form-group">
            <label for="username">Benutzername:</label>
            <input type="text" id="username" name="username" 
                   value="<?= htmlspecialchars($data['username'] ?? '') ?>" required>
            <?php if (isset($data['errors']['username'])) : ?>
                <span class="error"><?= $data['errors']['username'] ?></span>
            <?php endif; ?>
        </div>

        <div class="form-group">
            <label for="email">E-Mail:</label>
            <input type="email" id="email" name="email" 
                   value="<?= htmlspecialchars($data['email'] ?? '') ?>" required>
            <?php if (isset($data['errors']['email'])) : ?>
                <span class="error"><?= $data['errors']['email'] ?></span>
            <?php endif; ?>
        </div>

        <div class="form-group">
            <label for="password">Passwort:</label>
            <input type="password" id="password" name="password" required>
            <?php if (isset($data['errors']['password'])) : ?>
                <span class="error"><?= $data['errors']['password'] ?></span>
            <?php endif; ?>
        </div>

        <div class="form-group">
            <label for="confirm_password">Passwort bestätigen:</label>
            <input type="password" id="confirm_password" name="confirm_password" required>
            <?php if (isset($data['errors']['confirm_password'])) : ?>
                <span class="error"><?= $data['errors']['confirm_password'] ?></span>
            <?php endif; ?>
        </div>

        <button type="submit">Registrieren</button>
    </form>
    
    <p>Bereits registriert? <a href="<?= BASE_URL ?>/user/login">Hier einloggen</a></p>
</div>

<?php require_once 'views/templates/footer.php'; ?> 