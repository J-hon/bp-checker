<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Livewire\Livewire;
use Tests\TestCase;

class LoginTest extends TestCase
{

    use RefreshDatabase;

    /**
     * A basic feature test example.
     *
     * @return void
     */
    public function test_user_can_view_a_login_form()
    {
        $response = $this->get('/login');

        $response->assertSuccessful();
        $response->assertViewIs('login');
    }

    public function test_user_can_login_with_correct_credentials()
    {
        Livewire::test('login')->set([
            'email' => 'johndoe@example.com',
            'password' => 'password'
        ])->call('submit');
    }
}
