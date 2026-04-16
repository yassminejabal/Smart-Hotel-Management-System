<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ReservationRequest extends FormRequest
{
    public function authorize(): bool
    {
        return true;
    }

    public function rules()
    {
        return [
            'client_id'      => 'required|exists:users,id',
            'chambre_id'     => 'required|exists:chambres,id',
            'check_in'       => 'required|date',
            'check_out'      => 'required|date',
            'invitees'       => 'required|integer',
            'total_price'    => 'required|numeric',
            'payment_status' => 'required|in:En attente,Payé,Échoué',
            'status'         => 'nullable|in:en_attente,confirmee,annulee',
        ];
    }
}
