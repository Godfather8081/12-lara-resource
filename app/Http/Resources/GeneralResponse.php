<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class GeneralResponse extends ResponseWrapper
{
    /**
     * Transform the resource into an array.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array
     */

    //  hear we are extending ResponseWrapper class to get use of with method 
    // and we are defining toArray method so at end toArray and with will merge to gather

    public function toArray($request)
    {
        return isset($this['data']) ? $this['data'] : [];
    }
}
