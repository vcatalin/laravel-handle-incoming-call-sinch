<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HandleIncomingCall;
use Illuminate\Support\Facades\Log;

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

/*
    {ngrok-path}/api/incoming-call
        or
    localhost:8081/api/incoming-call

    The localhost port can be changed adjusted in .env using APP_PORT value
*/
Route::Post('/incoming-call', function (Request $request) {
    Log::info('Sinch Incoming Request => ', ['sinchRequest' => $request->all()]);
    $svamlResponse = [
        'instructions' => [
            [
            'name' => 'say',
            'text' => 'Hi, thank you for calling your Sinch number. Congratulations! You just responded to a phone call.',
            'locale' => 'en-US'
            ]
        ],
        'action' => [
            'name' => 'hangup'
        ]
    ];
    return response()->json($svamlResponse, 200);
});
