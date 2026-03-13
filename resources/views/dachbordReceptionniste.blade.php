<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <title>HOTELO | Gestion Palace</title>
            <link rel="stylesheet" href="{{asset('css/style.css')}}">

</head>
<body>

    <div class="dash-wrapper">
        <aside class="dash-sidebar">
            <div class="dash-logo">HOTELO</div>
            <nav>
                <a href="#" class="dash-nav-link">📊 Tableau de Bord</a>
                <a href="#" class="dash-nav-link active">🏨 Gestion Chambres</a>
                <a href="#" class="dash-nav-link">📅 Réservations</a>
                <a href="login.html" class="dash-nav-link" style="margin-top: 100px; color: #ff6b6b;">🚪 Déconnexion</a>
            </nav>
        </aside>

        <main class="dash-container">
            <h1 class="dash-title" style="color: white; border: none;">Gestion des Chambres</h1>

            <section class="dash-card">
                <h2 style="font-size: 0.8rem; letter-spacing: 2px; color: var(--hotel-gold); margin-bottom: 20px;">AJOUTER UNE CHAMBRE</h2>
                <form action="{{route('Chambre.store')}}" style="display: grid; grid-template-columns: repeat(3, 1fr); gap: 20px;" method="POST">
                @csrf
                    <div>
                        <label style="font-size: 0.7rem; font-weight: 700; color: #888;">N° CHAMBRE</label>
                        <input name="number_Chambre" type="number" class="dash-input" placeholder="101">
                    </div>
                    <div>
                        <label style="font-size: 0.7rem; font-weight: 700; color: #888;">TYPE</label>
                        <select name="type" class="dash-input">
                            <option value="Simple">Simple</option>
                            <option value="Double">Double</option>
                            <option value="Suite">Suite</option>
                        </select>
                    </div>
                    <div>
                        <label style="font-size: 0.7rem; font-weight: 700; color: #888;">STATUT</label>
                        <select name="statut" class="dash-input">
                            <option value="">STATUT</option>
                            <option value="Disponible">Disponible</option>
                            <option value="Occupee">Occupee</option>
                        </select>
                    </div>
                    <div>
                        <label style="font-size: 0.7rem; font-weight: 700; color: #888;">PRIX (DH)</label>
                        <input name="prix_base" type="number" class="dash-input" placeholder="800">
                    </div>
                    <div style="grid-column: span 3; text-align: right;">
                        <button type="submit" class="dash-btn">Enregistrer</button>
                    </div>
                </form>
            </section>

            <section class="dash-card">
                <table style="width: 100%; border-collapse: collapse; text-align: left;">
                    <thead>
                        <tr style="color: #999; font-size: 0.7rem; letter-spacing: 1px; border-bottom: 1px solid #eee;">
                            <th style="padding-bottom: 15px;">NUMÉRO</th>
                            <th style="padding-bottom: 15px;">TYPE</th>
                            <th style="padding-bottom: 15px;">PRIX</th>
                            <th style="padding-bottom: 15px;">STATUT</th>
                            <th style="padding-bottom: 15px;">ACTIONS</th>
                        </tr>
                    </thead>
                    <tbody style="font-size: 0.9rem;">
                        <tr style="border-bottom: 1px solid #f9f9f9;">
                            <td style="padding: 15px 0;"><strong>101</strong></td>
                            <td>Suite Royale</td>
                            <td>1,200 DH</td>
                            <td><span style="color: #27ae60; font-weight: 700;">Disponible</span></td>
                            <td>
                                <button style="color: var(--hotel-gold); border: none; background: none; font-weight: 700; cursor: pointer;">MODIFIER</button>
                            </td>
                        </tr>
                    </tbody>
                </table>
            </section>
        </main>
    </div>

</body>
</html>