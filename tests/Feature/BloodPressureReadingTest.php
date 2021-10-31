<?php

namespace Tests\Feature;

use App\Models\Patient;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Livewire\Livewire;
use Tests\TestCase;

class BloodPressureReadingTest extends TestCase
{

    use RefreshDatabase;

    public function test_can_create_blood_pressure_reading()
    {
        $patient = Patient::factory()->create();

        Livewire::test('create-blood-pressure-reading', ['patient_id' => $patient->id])->set([
            'systolic_reading' => 200,
            'diastolic_reading' => 100
        ])->call('submit');
    }

    public function test_systolic_reading_is_required()
    {
        $patient = Patient::factory()->create();

        Livewire::test('create-blood-pressure-reading', ['patient_id' => $patient->id])->set([
            'diastolic_reading' => 100
        ])->call('submit')->assertHasErrors(['systolic_reading']);
    }

    public function test_diastolic_reading_is_required()
    {
        $patient = Patient::factory()->create();

        Livewire::test('create-blood-pressure-reading', ['patient_id' => $patient->id])->set([
            'systolic_reading' => 200
        ])->call('submit')->assertHasErrors(['diastolic_reading']);
    }
}
