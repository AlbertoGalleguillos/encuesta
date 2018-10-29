<?php

namespace App\Http\Controllers;

use App\GoogleUser;
use Illuminate\Http\Request;

class GoogleUserController extends Controller
{
    public function create(Request $request)
    {
        return $request->all();
        $user = GoogleUser::where('google_id', $request->input('id'))->first();
        if (!$user) {
            $user = GoogleUser::create([
                'display_name' => $request->input('first_name'),
                'email' => $request->input('email'),
                'google_id' => $request->input('id'),
                'photo_url' => $request->input('last_name')
            ]);
        }
        return $user;
    }
}
