<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreComicRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
        return false;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array<mixed>|string>
     */
    public function rules()
{
    return [
        'title' => 'required|string|max:255',
        'description' => 'required|string',
        'thumb' => 'required|url',
        'price' => 'required|numeric|min:0',
        'series' => 'required|string|max:255',
        'sale_date' => 'required|date',
        'type' => 'required|string|max:255',
    ];
}


public function messages()
{
    return [
        'title.required' => 'Il titolo è obbligatorio.',
        'description.required' => 'La descrizione è obbligatoria.',
        'thumb.required' => 'L\'URL dell\'immagine è obbligatorio.',
        'price.required' => 'Il prezzo è obbligatorio.',
        'price.numeric' => 'Il prezzo deve essere un numero.',
        'series.required' => 'La serie è obbligatoria.',
        'sale_date.required' => 'La data di vendita è obbligatoria.',
        'type.required' => 'Il tipo è obbligatorio.',
    ];
}


}