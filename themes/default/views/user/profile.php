<?php require_once 'views/templates/header.php'; ?>

<div class="profile-container">
    <h2>Benutzerprofil</h2>
    
    <div class="profile-info">
        <div class="info-group">
            <label>Benutzername:</label>
            <span><?= htmlspecialchars($data['user']->username) ?></span>
        </div>
        
        <div class="info-group">
            <label>E-Mail:</label>
            <span><?= htmlspecialchars($data['user']->email) ?></span>
        </div>
        
        <div class="info-group">
            <label>Mitglied seit:</label>
            <span><?= date('d.m.Y', strtotime($data['user']->created_at)) ?></span>
        </div>
    </div>
</div>

<?php require_once 'views/templates/footer.php'; ?> 