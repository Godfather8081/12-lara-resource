<?php

namespace App\Http\Requests;

use App\Http\Resources\GeneralError;
use Illuminate\Contracts\Validation\Validator;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Http\Exceptions\HttpResponseException;

class RequestWrapper extends FormRequest
{

    // hear we created global request wrapper class we can wrap all common things in this class
    // then we can create sub folders and create request there
    // all sub requests will extend RequestWrapper class so they will get access to all
    // methods and properties provided hear
    // and if we want we can override the method in subclass as well

    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */

    // we are checking for user exist or not and class who extends this class will
    // also get authorize method and if for any request there is no user then 
    // it return false and fails
    // if we don't want to check this or want to check something else we can override the method in child class  
    public function authorize()
    {
        if (auth()->user()) {
            return true;
        };
        return false;
    }

    // as we mention all failed validation also return same type of response
    // so we can listen to validation fail event and can send our custom err response there 
    protected function failedValidation(Validator $validator)
    {
        $errors = $validator->errors();
        throw new HttpResponseException(response()->json(new GeneralError([
            'message' => 'validation error occurred',
            'errors' => $errors,
            'toast' => true
        ])));
    }

    // as we mention all failed authorization also return same type of response
    // so we listen to authorization fail event and can send our custom err response there
    protected function failedAuthorization()
    {
        throw new HttpResponseException(response()->json(new GeneralError([
            'message' => 'you are not authorized',
            'code' => 401,
            'toast' => true
        ])));
    }
}
