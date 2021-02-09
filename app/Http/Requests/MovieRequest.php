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
            // Alles Plichtfelder und mindestens 3 Zeichen lang
            'author_id' => 'required',
            'title'     => 'required|min:3',
            'price'     => 'required',
            'image'     => '',
        ];
    }

    /**
     * Gib mir meine eigene Fehlermeldungen aus
     * @return array
     */
    public function messages()
    {
        return [
            'author_id.required'=> 'Bitte einen Author angeben',
            'title.required'    => 'Bitte einen Titel angeben',
            'title.min'         => 'Der Titel muß mindesten :min Zeichen enthalten',
            'price.required'    => 'Bitte einen Preis angeben',
        ];
    }

}
