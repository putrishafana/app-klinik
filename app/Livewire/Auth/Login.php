<?php

namespace App\Livewire\Auth;

use Livewire\Component;

class Login extends Component
{
    public $email = '';
    public $password = '';
    public $remember = false;

    public function authenticate()
    {
        $this->validate([
            'email' => 'required|email',
            'password' => 'required',
        ]);

        if (! Auth::attempt([
            'email' => $this->email,
            'password' => $this->password,
        ], $this->remember)) {
            throw ValidationException::withMessages([
                'email' => __('auth.failed'),
            ]);
        }

        session()->regenerate();

        $role = Auth::user()->role;

        if ($role == 1) {
            return redirect()->intended('/admin');
        } elseif ($role == 2) {
            return redirect()->intended('/user');
        } elseif ($role == 3) {
            return redirect()->intended('/moderator');
        } elseif ($role == 4) {
            return redirect()->intended('/guest');
        } else {
            return redirect()->intended('/dashboard');
        }
    }
    public function render()
    {
        return view('livewire.auth.login');
    }
}