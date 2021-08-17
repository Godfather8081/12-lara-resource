<?php

use App\Http\Controllers\testController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
});


// intro 
// 1) resources are place where we can alter our response way we want before it leave application
// 2) main use of resource folder is to serialize response way we want
// 3) mostly we use resource to add extra data to all our responses
// 4) response consistency is very important weather it's success, err, validation err, 
// authorization err or any type of response we want that every response stays same so 
// we can easily work with apis in frontend and overcome unwanted extra headache
// for that we ensure that in any response we sent this things

// - every response always return 200 response as main response type weather it's success or any other type of err
// so we create global interceptors which will reject promise which is giving anything else as main status then 200
// - code = we will manage our own status in response so we can use it in then block in response
// we will give 200 or 201 for success for validation err 400, and for unauthorize 401
// - status = in this we define success for all success responses and error for all error responses
// - message = we give success message if there is success and error messages basically 
// in this send something that frontend developer can show as tost to users
// - errors = we send actual errors that occur in operations and this key will be only available
// when we send error response not in success and we can send validation errors, try catch exceptions errors etc in it
// - data = we give all data which user expect from api in data key and if there is error then data will be []
// - toast = we give toast as true or false base in the value in front-end we can know that in response of api call 
// should we show message or not to user



// in all projects we create this three files for handling response
// responseWrapper, GeneralResponse, GeneralError
// this 3 files will be in resources folder which will be use in all type of response
// and we can create sub folders in resource folder for other type if serializations

// - responseWrapper = this file will contain general response body in with method which we send in all
// type of response it just won't contain data key

// - GeneralResponse = this file class extends ResponseWrapper class to get access to it's with method
// and the file contain toArray method which just return data and at end that data field will merge with 
// with() method of ResponseWrapper class

// - generalError = this method contains toArray method where we define all our extra wrapper
// fields which we send in all responses, the class also contains withResponse method which give
// access to current req and res and there we modify main response status to 200 so
// if we use generalError class for validation and auth related errors then we can also maintain our 
// general response structure 
// 


Route::get('default-success', [testController::class, 'defaultSuccess']);
Route::get('success-res', [testController::class, 'successRes']);
Route::get('default-err', [testController::class, 'defaultErr']);
Route::post('user-validation-err', [testController::class, 'validationErr']);
