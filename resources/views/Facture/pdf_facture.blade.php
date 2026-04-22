@extends('layouts.footer')
@section('contant')
    

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
@endsection