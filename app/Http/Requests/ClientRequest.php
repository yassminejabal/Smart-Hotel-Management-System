<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ClientRequest extends FormRequest
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
        'nom'            => 'required|string|max:255',
        'prenom'         => 'required|string|max:255',
        'email'          => 'required|email|unique:clients,email|max:255',
        'telephone'      => 'nullable|string|max:20',
        'adresse'        => 'nullable|string|max:500',
        'date_naissance' => 'nullable|date|before:today',
    ];
}
}
