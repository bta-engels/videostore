<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Support\Facades\Auth;

/**
 * Class MovieRequest
 * @package App\Http\Requests
 */
class MovieRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        // Gib Zustand der Auth-Funktion zurück (s. AuthorController)
        return Auth::check();
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            // Felder author_id und title sind Pflichtfeld
            'author_id' => 'required',
            'title'     => 'required|min:3',
            'price'     => 'required',
            'image'     => '',
        ];
    }

    /**
     * Gib mir meine eigenen Fehlermeldungen aus
     * Überschreiben der vordefinierten messages-Funktion mit engl. default Fehlermeldungen
     * @return array
     */
    public function messages()
    {
        return [
            'author_id.required'    => 'Bitte einen Autor angeben',
            'title.required'        => 'Bitte einen Titel angeben',
            'title.min'             => 'Der Nachname muß mindesten :min Zeichen enthalten',
            'price.required'        => 'Bitte einen Presi angeben',
        ];
    }


}
