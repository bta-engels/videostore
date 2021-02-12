<?php

namespace App\Http\Requests;

use Illuminate\Contracts\Validation\Validator;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Support\Facades\Auth;


/**
 * Class ApiAuthorRequest
 * @package App\Http\Requests
 */
class ApiAuthorRequest extends AuthorRequest
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
        return true;
    }

    protected function failedValidation(Validator $validator)
    {
        $this->validator = $validator;
    }
}

