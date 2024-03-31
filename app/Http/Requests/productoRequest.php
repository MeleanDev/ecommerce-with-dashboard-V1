<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rules\File;

class productoRequest extends FormRequest
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
            'nombre' =>  ['required', 'max:252'],
            'prefijo' => ['required', 'max:4'],
            'telefono' =>  ['required', 'max:252'],
            'ubicacion' =>  ['required', 'max:252'],
            'correo' =>  ['required', 'max:255'],
            'foto' => ['required', File::image()->max(111 * 1024),]
        ];
    }
}
