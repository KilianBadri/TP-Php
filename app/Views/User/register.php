<form action="/register" method="POST">
    <input type="text" name="name" placeholder="Nom" required>
    <input type="email" name="email" placeholder="Email" required>
    <input type="password" name="password" placeholder="Mot de passe" required>
    <button type="submit" action="/register">S'inscrire</button>
</form>

<p>
    <?php if (isset($_SESSION['message'])): ?>
        <?= $_SESSION['message']; ?>
        <?php unset($_SESSION['message']); ?>
    <?php endif; ?>
</p>
