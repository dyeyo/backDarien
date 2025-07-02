<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UpdateTaskRequest extends FormRequest
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
            'title' => 'sometimes|string|max:255',
            'description' => 'sometimes|string',
            'completed' => 'sometimes|boolean',
            'due_date' => 'nullable|date',
        ];
    }

    public function messages(): array
    {
        return [
            'title.string' => 'El título debe ser una cadena de texto.',
            'title.max' => 'El título no debe superar los 255 caracteres.',

            'description.string' => 'La descripción debe ser una cadena de texto.',

            'completed.boolean' => 'El campo completado debe ser verdadero o falso.',

            'due_date.date' => 'La fecha de vencimiento debe ser una fecha válida.',
        ];
    }
}
