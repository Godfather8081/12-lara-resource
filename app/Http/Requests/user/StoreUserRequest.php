<?php

namespace App\Http\Requests\user;

use App\Http\Requests\RequestWrapper;

class StoreUserRequest extends RequestWrapper
{

    // hear we are inheriting RequestWrapper class so this class will get all it's properties

    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */

    //  we are overriding authorize method because we are not using any authentication 
    // system right now so we don't have user so we are overriding this method to 
    // always return true

    // comment this method to see authorization fail response
    public function authorize()
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */

    //  if any of this rule will fail then we will get same response because of RequestWrapper
    // class's failedValidation method
    public function rules()
    {
        return [
            'name' => 'required',
            'age' => 'required|max:10'
        ];
    }
}
