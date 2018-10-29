<?php

namespace App\Http\Controllers;

use App\FacebookUser;
use Illuminate\Http\Request;

class FacebookUserController extends Controller
{
    public function create(Request $request)
    {
        $user = FacebookUser::where('facebook_id', $request->input('id'))->first();
        if (!$user) {
            $user = FacebookUser::create([
                'first_name' => $request->input('first_name'),
                'last_name' => $request->input('last_name'),
                'email' => $request->input('email'),
                'facebook_id' => $request->input('id')
            ]);
        }
        return $user;
    }
}
