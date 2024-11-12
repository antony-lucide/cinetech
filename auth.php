<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Cinetech - Connexion/Inscription</title>
    <link rel="stylesheet" href="./assets/style.css">
    <link rel="stylesheet" href="./assets/auth.css">
</head>
<body>
    <header>
        <h1>Cinetech</h1>
    </header>
    <main class="auth-container">
        <!-- Formulaire de connexion -->
        <section class="auth-form" id="login-form">
            <h2>Connexion</h2>
            <form action="/login" method="POST">
                <div class="form-group">
                    <label for="login-email">Email</label>
                    <input type="email" id="login-email" name="email" required>
                </div>
                <div class="form-group">
                    <label for="login-password">Mot de passe</label>
                    <input type="password" id="login-password" name="password" required>
                </div>
                <button type="submit">Se connecter</button>
            </form>
            <p>Pas encore de compte ? <a href="#" id="show-register">S'inscrire</a></p>
        </section>

        <!-- Formulaire d'inscription -->
        <section class="auth-form hidden" id="register-form">
            <h2>Inscription</h2>
            <form action="/register" method="POST">
                <div class="form-group">
                    <label for="register-username">Nom d'utilisateur</label>
                    <input type="text" id="register-username" name="username" required>
                </div>
                <div class="form-group">
                    <label for="register-email">Email</label>
                    <input type="email" id="register-email" name="email" required>
                </div>
                <div class="form-group">
                    <label for="register-password">Mot de passe</label>
                    <input type="password" id="register-password" name="password" required>
                </div>
                <div class="form-group">
                    <label for="register-confirm-password">Confirmer le mot de passe</label>
                    <input type="password" id="register-confirm-password" name="confirm-password" required>
                </div>
                <button type="submit">S'inscrire</button>
            </form>
            <p>Déjà inscrit ? <a href="#" id="show-login">Se connecter</a></p>
        </section>
    </main>
    <script src="./assets/auth.js"></script>
</body>
</html>