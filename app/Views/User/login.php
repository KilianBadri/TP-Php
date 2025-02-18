<?session_start();?>

<form action="/login" method="POST">
    <input type="email" name="email" placeholder="Email" required>
    <input type="password" name="password" placeholder="Mot de passe" required>
    <button type="submit">Se connecter</button>
</form>

<p>
    <?php if (isset($_SESSION['message'])): ?>
        <?= $_SESSION['message']; ?>
        <?php unset($_SESSION['message']); ?>
    <?php endif; ?>
</p>
