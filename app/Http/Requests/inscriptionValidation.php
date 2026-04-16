<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class inscriptionValidation extends FormRequest
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
    'name'           => ['required', 'string'],
    'email'          => ['required', 'email'],
    'telephone'      => ['required', 'string'],
    'adresse'        => ['required', 'string'],
    'date_naissance' => ['required', 'date'],
    'password'       => ['required', 'string', 'min:8'],
    'role'           => ['required', Rule::in(['Client'])],
];
    }
}
