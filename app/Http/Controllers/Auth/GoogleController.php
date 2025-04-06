<?php
namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Laravel\Socialite\Facades\Socialite;
use App\Models\User;

class GoogleController extends Controller
{
    public function redirectToGoogle()
    {
        return Socialite::driver('google')->stateless()->redirect();
    }

    public function handleGoogleCallback()
    {
        $googleUser = Socialite::driver('google')->stateless()->user();

        $user = User::firstOrCreate(
            ['email' => $googleUser->getEmail()],
            [
                'username' => $googleUser->getName(),
                'first_name' => $googleUser->user['given_name'] ?? '',
                'last_name' => $googleUser->user['family_name'] ?? '',
                'password' => bcrypt('google_auth'),
            ]
        );

        Auth::login($user);

        return redirect('/dashboard');
    }
}
