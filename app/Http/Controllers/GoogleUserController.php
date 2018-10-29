<?php

namespace App\Http\Controllers;

use App\GoogleUser;
use Illuminate\Http\Request;

class GoogleUserController extends Controller
{
    public function create(Request $request)
    {
        $user = GoogleUser::where('google_id', $request->input('id'))->first();
        if (!$user) {
            $user = GoogleUser::create([
                'display_name' => $request->input('display_name'),
                'email' => $request->input('email'),
                'google_id' => $request->input('id'),
                'photo_url' => $request->input('photo_url')
            ]);
        }
        $user['type'] = 'Google';
        return $user;
    }
}
