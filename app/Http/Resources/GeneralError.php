<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class GeneralError extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array
     */


    //  we create same toArray method for our err responses so that we can send same type
    // of response like success for error as well
    public function toArray($request)
    {
        return [
            'status' => $this['status'] ? $this['status'] : 'error',
            'code' => $this['code'] ? $this['code'] : 400,
            'message' => $this['message'] ? $this['message'] : '',
            'data' => $this['data'] ? $this['data'] : [],
            'toast' => $this['toast'] ? $this['toast'] : false
        ];
    }

    // hear we are changing main response type to 200 so every time use GeneralError class
    // for send error responses we will get main status as 200 so we can manage status in response
    // our code key   
    public function withResponse($request, $response)
    {
        return $response->setStatusCode(200);
    }
}
