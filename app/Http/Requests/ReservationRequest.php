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
        'client_id'      => 'required|exists:clients,id',
        'chambre_id'     => 'required|exists:chambres,id',
        'check_in'       => 'required|date',
        'check_out'      => 'required|date',
        'invitees'       => 'required|integer|min:1',
        'total_price'    => 'required|numeric|min:0',
        'payment_status' => 'required|in:non_paye,paye',
        'status'         => 'nullable|in:en_attente,confirmee,annulee',
    ];
}
}
