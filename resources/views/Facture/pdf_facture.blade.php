<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <title>{{ $titre }}</title>
    <style>
        /* Configuration de base pour le PDF */
        @page { margin: 0; }
        body {
            font-family: 'Helvetica', 'Arial', sans-serif;
            margin: 0;
            padding: 0;
            color: #1f2937;
            font-size: 14px;
        }
        
        /* En-tête (Header) */
        .header {
            background-color: #111827;
            color: #ffffff;
            padding: 40px;
            border-bottom: 4px solid #b89146;
        }
        .header-table { width: 100%; }
        .header-left { width: 50%; vertical-align: top; }
        .header-right { width: 50%; vertical-align: top; text-align: right; }
        
        .brand { color: #b89146; font-size: 28px; font-weight: bold; text-transform: uppercase; letter-spacing: 2px; }
        .subtitle { color: #9ca3af; font-size: 12px; margin-top: 4px; }
        .doc-title { font-size: 20px; font-weight: bold; }
        .doc-date { font-size: 14px; margin-top: 4px; color: #e5e7eb; }

        /* Contenu principal */
        .content { padding: 40px; }

        /* Section Infos Client */
        .info-table { width: 100%; margin-bottom: 40px; }
        .info-col { width: 50%; vertical-align: top; }
        .info-col-right { width: 50%; vertical-align: top; text-align: right; }
        
        .label { 
            color: #b89146; 
            font-weight: bold; 
            text-transform: uppercase; 
            font-size: 12px; 
            border-bottom: 1px solid #e5e7eb; 
            padding-bottom: 4px; 
            margin-bottom: 8px; 
        }
        .client-name { font-size: 18px; font-weight: bold; color: #111827; margin-top: 8px;}
        
        /* Badge de paiement */
        .badge { 
            padding: 4px 12px; 
            border-radius: 20px; 
            font-size: 12px; 
            font-weight: bold; 
            display: inline-block;
            margin-top: 8px;
        }
        .badge-paid { background-color: #dcfce7; color: #166534; }
        .badge-pending { background-color: #fef9c3; color: #854d0e; }

        /* Tableau des détails */
        .details-table { width: 100%; border-collapse: collapse; margin-bottom: 40px; }
        .details-table th { 
            background-color: #f9fafb; 
            padding: 12px; 
            text-align: left; 
            font-size: 12px; 
            text-transform: uppercase; 
            color: #4b5563; 
            border-bottom: 2px solid #e5e7eb; 
        }
        .details-table td { 
            padding: 16px 12px; 
            border-bottom: 1px solid #f3f4f6; 
            color: #374151; 
        }
        .text-right { text-align: right !important; }
        
        .desc-title { font-weight: bold; color: #111827; font-size: 14px; }
        .desc-sub { color: #6b7280; font-size: 12px; display: block; margin-top: 4px;}

        /* Bloc du Total */
        .total-box { 
            width: 250px; 
            float: right; 
            background-color: #f9fafb; 
            padding: 20px; 
            border-radius: 8px; 
        }
        .total-table { width: 100%; }
        .total-label { color: #6b7280; font-size: 14px; padding-bottom: 10px; }
        .total-value { text-align: right; font-size: 14px; padding-bottom: 10px; }
        .total-final-label { font-weight: bold; font-size: 18px; color: #111827; border-top: 1px solid #e5e7eb; padding-top: 10px; }
        .total-final-value { font-weight: bold; font-size: 18px; color: #b89146; text-align: right; border-top: 1px solid #e5e7eb; padding-top: 10px; }

        /* Pied de page */
        .footer { 
            position: absolute; 
            bottom: 30px; 
            width: 100%; 
            text-align: center; 
            font-size: 12px; 
            color: #9ca3af; 
        }
    </style>
</head>
<body>

    <div class="header">
        <table class="header-table">
            <tr>
                <td class="header-left">
                    <div class="brand">HOTELO</div>
                    <div class="subtitle">Luxurious Experience</div>
                </td>
                <td class="header-right">
                    <div class="doc-title">REÇU / FACTURE</div>
                    <div class="doc-date">Date: {{ $date }}</div>
                </td>
            </tr>
        </table>
    </div>

    <div class="content">
        
        <table class="info-table">
            <tr>
                <td class="info-col">
                    <div class="label">Client</div>
                    <div class="client-name">{{ $client }}</div>
                </td>
                <td class="info-col-right">
                <div class="label">Statut du Paiement</div><br>
                @if($payment_status == 'Payé')
                    <div class="badge badge-paid">PAYÉ</div>

                @elseif($payment_status == 'En attente')
                    <div class="badge badge-pending">EN ATTENTE</div>

                @elseif($payment_status == 'Échoué')
                    <div class="badge badge-failed">ÉCHOUÉ</div>
                @endif
            </tr>
        </table>

        <table class="details-table">
            <thead>
                <tr>
                    <th>Description</th>
                    <th>Check-in</th>
                    <th>Check-out</th>
                    <th class="text-right">Total</th>
                </tr>
            </thead>
            <tbody>
                <tr>
                    <td>
                        <div class="desc-title">Hébergement</div>
                        <div class="desc-sub">Séjour à l'hôtel HOTELO</div>
                    </td>
                    <td>{{ $check_in }}</td>
                    <td>{{ $check_out }}</td>
                    <td class="text-right" style="font-weight: bold; color: #111827;">{{ $price_totale }} MAD</td>
                </tr>
            </tbody>
        </table>

        <div class="total-box">
            <table class="total-table">
                <tr>
                    <td class="total-label">Sous-total :</td>
                    <td class="total-value">{{ $price_totale }}</td>
                </tr>
                <tr>
                    <td class="total-final-label">TOTAL :</td>
                    <td class="total-final-value">{{ $price_totale }} MAD</td>
                </tr>
            </table>
        </div>

    </div>

    <div class="footer">
        HOTELO S.A. | Youssoufia, Maroc | www.hotelo.ma<br>
        Merci pour votre confiance. À bientôt !
    </div>

</body>
</html>