<?php

namespace App\Http\Controllers;

use App\Http\Requests\user\StoreUserRequest;
use App\Http\Resources\GeneralError;
use App\Http\Resources\GeneralResponse;
use Illuminate\Http\Request;

class testController extends Controller
{
    public function defaultSuccess()
    {
        $data = [
            ['name' => 'vatsal']
        ];

        return new GeneralResponse(['data' => $data]);
    }

    public function successRes()
    {
        $data = [
            ['name' => 'vatsal']
        ];

        return new GeneralResponse([
            'data' => $data,
            'code' => 201,
            'toast' => true,
            'message' => 'added successfully.'
        ]);
    }

    public function defaultErr()
    {
        $message = 'not able to add data';
        return new GeneralError([
            'code' => 500,
            'message' => $message,
            'tost' => true
        ]);
    }

    public function validationErr(StoreUserRequest $req)
    {
        dd('hit');
    }
}
