<?php

namespace App\Http\Livewire;

use App\Models\Patient;
use Livewire\Component;

class Dashboard extends Component
{
    public $query_count;

    public function mount()
    {
        $this->query_count = Patient::query()->count();
    }

    public function render()
    {
        return view('livewire.dashboard');
    }
}
