<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ReservationUpdateRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array<mixed>|string>
     */
    public function rules(): array
    {
        return [
            'client_id'      => 'required|exists:clients,id',
            'chambre_id'     => 'required|exists:chambres,id',
            'check_in'       => 'required|date',
            'check_out'      => 'required|date',
            'invitees'       => 'required|integer',
            'total_price'    => 'required|numeric',
            'payment_status' => 'required|string',
            'status'         => 'required|string',
        ];
    }
}
