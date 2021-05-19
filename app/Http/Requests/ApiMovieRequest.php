<?php

namespace App\Http\Requests;

use Illuminate\Contracts\Validation\Validator;

/**
 * Class AuthorRequest
 * @package App\Http\Requests
 */
class ApiMovieRequest extends MovieRequest
{
    /**
     * @var Validator
     */
    public $validator = null;

    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return request()->user()->tokenCan('write');
    }

    /**
     * @param Validator $validator
     */
    protected function failedValidation(Validator $validator)
    {
        // keine weiterleitung mehr zum formular zurück
        $this->validator = $validator;
    }
}
