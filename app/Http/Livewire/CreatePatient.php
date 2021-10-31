<?php

namespace App\Http\Livewire;

use App\Models\Patient;
use Livewire\Component;

class CreatePatient extends Component
{

    public $name, $email, $mobile_number;

    public function submit()
    {
        $this->validate([
            'name' => ['required'],
            'email' => ['sometimes', 'nullable', 'email', 'unique:patients'],
            'mobile_number' => ['required', 'unique:patients']
        ]);

        Patient::query()->create([
            'name' => $this->name,
            'email' => $this->email,
            'mobile_number' => $this->mobile_number
        ]);

        return redirect(route('dashboard'));
    }

    public function render()
    {
        return view('livewire.create-patient');
    }
}
