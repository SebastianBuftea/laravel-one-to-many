<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreProjectRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, mixed>
     */
    public function rules()
    {
        return [
            'title' => 'required|max:100|unique:projects',
            'description' => 'required',
            'languages' => 'required',
        ];
    }

    public function messages()
    {
        return [
            'title.required' => 'Titolo del progetto obbligatorio',
            'title.max' => 'lunghezza massima consentita è di 100 caratteri',
            'title.unique' => 'Il titolo è gia esistente',
            'description.required' => 'Descrizione obbligatoria',
            'languages.required' => 'Linguaggio di programmazione obbligatorio',
        ];
    }
}
