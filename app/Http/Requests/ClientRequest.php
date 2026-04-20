<?php
namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ClientRequest extends FormRequest
{
    public function authorize(): bool
    {
        return true;
    }

    public function rules(): array
    {
        return [
            'name'           => 'required|string|max:255',
            'email'          => 'required|email|unique:users,email',
            'password'       => 'required|min:8',
            'role'           => 'string',
            'telephone'      => 'required|string|max:20',
            'adresse'        => 'required|string|max:500',
            'date_naissance' => 'required|date',
            'is_banne'       => 'boolean',
        ];
    }
}