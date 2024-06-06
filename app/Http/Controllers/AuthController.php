<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;

class AuthController extends Controller
{
    /**
     * Undocumented function
     *
     * @return void
     */
    public function formLogin()
    {
        return view('auth.formLogin');
    }

    /**
     * Undocumented function
     *
     * @param Request $request
     * @return void
     */
    public function login(Request $request)
    {
        $url = env('URL_SERVER_API');

        $response = Http::post($url . '/login', [
            'email' => $request->email,
            'password' => $request->password,
        ]);

        session(['accessToken' => $response->json()['access_token']]);

        return $response->json();
    }

    /**
     * Undocumented function
     *
     * @return void
     */
    public function logout()
    {
        $url = env('URL_SERVER_API');

        $accessToken = session('accessToken');

        $response = Http::accept('application/json')
            ->withToken($accessToken)
            ->get($url . '/logout');

        return $response->json();
    }

    /**
     * Undocumented function
     *
     * @return void
     */
    public function me()
    {
        $url = env('URL_SERVER_API');

        $accessToken = session('accessToken');

        $response = Http::accept('application/json')
            ->withToken($accessToken)
            ->get($url . '/me');

        return $response->json();
    }
}
