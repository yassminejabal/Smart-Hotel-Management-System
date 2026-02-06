<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>HOTELO | Connexion Exclusive</title>
        <link rel="stylesheet" href="{{asset('css/style.css')}}">

</head>
<body>

    <div class="login-wrapper">
        <div class="login-card">
            
            <h1 class="logo-hotel">HOTELO</h1>
            <p class="sub-logo">Gestion Palace</p>

            <form action="dashboard.php" method="POST">
                <div class="form-group">
                    <label>Adresse E-mail</label>
                    <input type="email" name="email" placeholder="admin@hotelo.com" required>
                </div>

                <div class="form-group">
                    <label>Mot de passe</label>
                    <input type="password" name="password" placeholder="••••••••" required>
                </div>

                <button type="submit" class="btn-submit">S'identifier</button>
            </form>

            <div class="footer-links">
                <p style="font-size: 0.8rem; color: #bbb; margin-bottom: 15px;">Accès réservé au personnel</p>
                <div style="display: flex; justify-content: space-between;">
                    <a href="register.html">Créer un compte</a>
                    <a href="index.html">Site Public →</a>
                </div>
            </div>

        </div>
    </div>

</body>
</html>