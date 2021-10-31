<?php

namespace Tests\Feature;

use App\Models\Patient;
use Illuminate\Bus\PendingBatch;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Support\Facades\Bus;
use Livewire\Livewire;
use Tests\TestCase;

class PatientTest extends TestCase
{

    use RefreshDatabase;

    public function test_can_create_patient()
    {
        Livewire::test('create-patient')->set([
            'name' => 'jane doe',
            'email' => 'janedoe@gmail.com',
            'mobile_number' => '09011029299'
        ])->call('submit');
    }

    public function test_name_is_required()
    {
        Livewire::test('create-patient')->set([
            'email' => 'janedoe@gmail.com',
            'mobile_number' => '09011029299'
        ])->call('submit')->assertHasErrors(['name']);
    }

    public function test_email_is_nullable()
    {
        Livewire::test('create-patient')->set([
            'name' => 'jane doe',
            'mobile_number' => '09011029299'
        ])->call('submit')->assertHasNoErrors(['email']);
    }

    public function test_mobile_number_is_required()
    {
        Livewire::test('create-patient')->set([
            'name' => 'jane doe',
            'email' => 'janedoe@gmail.com',
        ])->call('submit')->assertHasErrors(['mobile_number']);
    }

    public function test_patients_data_can_be_exported()
    {
        Bus::fake();
        Patient::factory()->count(20)->create();

        Livewire::test('export')->call('export');

        Bus::assertBatched(function(PendingBatch $batch){
            return $batch->name === 'export';
        });
    }

}
