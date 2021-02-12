<?php

namespace App\Http\Requests;

use Illuminate\Contracts\Validation\Validator;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Support\Facades\Auth;

/**
 * Class AuthorRequest
 * @package App\Http\Requests
 */
class ApiTodoRequest extends TodoRequest
{
    /**
     * @var Validator
     */
    public $validator = null;

    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     *
     * Überschreibe authorize-Funktion aus TodoRequest, sodass Bearbeitung
     * auch als nicht eingeloggter user möglich ist
     */
    public function authorize()
    {
        return true;
    }

    // Überschreiben der default Funktion von Laravel
    // Rufe diese Funktion auf, wenn Validierung schiefläuft
    /**
     * @param Validator $validator
     */
    protected function failedValidation(Validator $validator)
    {
        // setze validator-Variable mit dem Wert, der aus Abfrage kommt,
        // anstatt Weiterleitung zum Formular zurück
        $this->validator = $validator;
    }


}
