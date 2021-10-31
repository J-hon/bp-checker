<?php

namespace App\Http\Livewire;

use Illuminate\Support\Facades\Auth;
use Livewire\Component;

class Login extends Component
{

    public $email, $password;

    public function submit()
    {
        $this->validate([
            'email' => ['required', 'email', 'exists:users'],
            'password' => ['required']
        ]);

        Auth::attempt([
            'email' => $this->email,
            'password' => $this->password
        ]);

        return redirect(route('dashboard'));
    }

    public function render()
    {
        return view('livewire.login');
    }
}
