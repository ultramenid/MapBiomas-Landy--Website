<?php

namespace App\Livewire;

use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\RateLimiter;
use Illuminate\Support\Str;
use Livewire\Component;

class LoginComponent extends Component
{
    public $email, $password;

    public function getDatauser(){
        return DB::table('users')->where('email', $this->email)->first();
    }

    public function login(){
        $this->validate([
            'email' => 'required|email',
            'password' => 'required'
        ]);

        $throttleKey = Str::transliterate(Str::lower($this->email).'|'.request()->ip());

        if (RateLimiter::tooManyAttempts($throttleKey, 5)) {
            $seconds = RateLimiter::availableIn($throttleKey);
            session()->flash('message', "Too many login attempts. Please try again in {$seconds} seconds.");
            return;
        }

        $user = $this->getDatauser();

        // Check user credentials
        if ($user && Hash::check($this->password, $user->password) && $this->email === $user->email) {
            RateLimiter::clear($throttleKey);
            session()->regenerate();
            session([
                'id' => $user->id,
                'role_id' => $user->role_id
            ]);
            redirect('/cms/dashboard');
        } else {
            RateLimiter::hit($throttleKey, 300); // Lockout for 5 minutes after 5 failed attempts
            session()->flash('message', 'Email or password not valid.');
        }
    }
    public function render()
    {
        return view('livewire.login-component');
    }
}
