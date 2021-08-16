<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class ResponseWrapper extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array
     */

    //  we are using jsonResponse class which is laravel class which will convert our response to json
    // with method will use to merge existing response with returned data hear
    // we are checking for key data is passed or not and if not then we are setting default
    // now whenever we extend this class we will get with method so we don't have to repeat it every place
    // we will extend it to GeneralResponse class to merge data with billow data
    public function with($request)
    {
        return [
            'status' => $this['status'] ? $this['status'] : 'success',
            'code' => $this['code'] ? $this['code'] : 200,
            'message' => $this['message'] ? $this['message'] : '',
            'toast' => $this['toast'] ? $this['toast'] : false
        ];
    }
}
