<?php

namespace App\Http\Livewire;

use Illuminate\Database\Eloquent\Builder;
use Rappasoft\LaravelLivewireTables\DataTableComponent;
use Rappasoft\LaravelLivewireTables\Views\Column;
use App\Models\BloodPressureReading;

class BloodPressureReadingTable extends DataTableComponent
{

    public $patient_id;

    public bool $showSearch = false;

    public function mount($patient_id)
    {
        $this->patient_id = $patient_id;
    }

    public function columns(): array
    {
        return [
            Column::make('Systolic Reading', 'systolic_pressure')->sortable(),
            Column::make('Diastolic Reading', 'diastolic_pressure')->sortable()
        ];
    }

    public function query(): Builder
    {
        return BloodPressureReading::query()->where('patient_id', '=', $this->patient_id);
    }

    public function rowView(): string
    {
        return 'livewire-tables.rows.blood-pressure-reading-table';
    }
}
