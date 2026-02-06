<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <title>HOTELO | Inscription</title>
                <link rel="stylesheet" href="{{asset('css/style.css')}}">

</head>
<body>

    <div class="login-wrapper">
        <div class="login-card">
            
            <h1 class="logo-hotel">HOTELO</h1>
            <p class="sub-logo">Gestion Palace</p>

            <form action="" method="POST">
                <div class="form-group">
                    <label>Nom Complet</label>
                    <input type="text" name="nom" placeholder="Ex: Yassmine Jabal" required>
                </div>

                <div class="form-group">
                    <label>Adresse E-mail</label>
                    <input type="email" name="email" placeholder="admin@hotelo.com" required>
                </div>

                <div class="form-group">
                    <label>Mot de passe</label>
                    <input type="password" name="mot_de_passe" placeholder="••••••••" required>
                </div>

                <div class="form-group">
                    <label>Rôle Utilisateur</label>
                    <select name="role" required>
                        <option value="" disabled selected>Choisir un rôle...</option>
                        <option value="Receptionniste">Réceptionniste</option>
                        <option value="Client">Client</option>
                    </select>
                </div>

                <button type="submit" class="btn-submit">Créer le compte</button>
            </form>

            <div class="footer-link">
                <a href="login.html">Déjà inscrit ? Se connecter</a>
            </div>

        </div>
    </div>

</body>
</html>