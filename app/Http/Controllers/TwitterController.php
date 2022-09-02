<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Laravel\Socialite\Facades\Socialite;
use Illuminate\Support\Facades\Auth;
use App\Models\User;
use \Exception;

class TwitterController extends Controller
{
    public function redirectToProvider() {
        return Socialite::driver('twitter')->redirect();
    }

    public function handleProviderCallback() {
        try {
            $twitterUser=Socialite::with('twitter')->user();
        }catch (Exception $e) {
            return redirect('login/twitter');
        }

        $user=User::where('twitter', $twitterUser->id)->first();

        if($user) {
            $user->name = $twitterUser->name;
            $user->email = $twitterUser->email;
            $user->update();
        }else {
            $user=New User();
            $user->twitter = $twitterUser->id;
            $user->name = $twitterUser->name;
            $user->email = $twitterUser->email;
            $user->save();
        }

        Auth::login($user);
        return redirect()->to('/home');
    }
}
