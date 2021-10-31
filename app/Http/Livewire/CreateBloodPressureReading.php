<?php

namespace App\Http\Livewire;

use App\Models\BloodPressureReading;
use Livewire\Component;

class CreateBloodPressureReading extends Component
{

    public $patient_id, $systolic_reading, $diastolic_reading;

    public function mount($patient_id)
    {
        $this->patient_id = $patient_id;
    }

    public function submit()
    {
        $this->validate([
            'systolic_reading' => ['required', 'integer'],
            'diastolic_reading' => ['required', 'integer']
        ]);

        BloodPressureReading::query()->insert([
            'patient_id' => $this->patient_id,
            'systolic_pressure' => $this->systolic_reading,
            'diastolic_pressure' => $this->diastolic_reading,
            'created_at' => now(),
            'updated_at' => now()
        ]);

        session()->flash('message', 'Reading saved successfully');
        return redirect(route('blood-pressure-reading.create', ['patient_id' => $this->patient_id]));
    }

    public function render()
    {
        return view('livewire.create-blood-pressure-reading');
    }
}
