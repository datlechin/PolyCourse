<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Models\SocialAccount;
use App\Models\User;
use Illuminate\Http\RedirectResponse;
use Illuminate\Support\Carbon;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;
use Laravel\Socialite\Facades\Socialite;

class SocialiteController extends Controller
{
    public function setConfig(string $provider)
    {
        config()->set('services.facebook.redirect', route('socialite.callback', $provider));
    }

    public function redirect(string $provider): RedirectResponse
    {
        $this->setConfig($provider);

        return Socialite::driver($provider)->redirect();
    }

    public function callback(string $provider): RedirectResponse
    {
        $this->setConfig($provider);

        $providerUser = Socialite::driver($provider)->user();

        $socialAccount = SocialAccount::firstOrNew(
            ['provider_id' => $providerUser->getId(), 'provider_name' => $provider],
            ['token' => $providerUser->token]
        );

        $user = User::updateOrCreate(
            ['email' => $providerUser->getEmail()],
            [
                'name' => $providerUser->getName() ?: $providerUser->getEmail(),
                'username' => $providerUser->getNickname(),
                'avatar' => $providerUser->getAvatar(),
                'email_verified_at' => Carbon::now(),
                'password' => Hash::make(Str::random(32)),
            ]
        );

        $socialAccount->user()->associate($user);
        $socialAccount->save();

        Auth::login($user);

        return to_route('home');
    }
}
