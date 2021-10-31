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
            Column::make('Diastolic Reading', 'diastolic_pressure')->sortable(),
            Column::make('Blood Pressure Status')
        ];
    }

    public function getBloodPressureStatus(int $stystolic_reading, int $diastolic_reading)
    {
        if ($stystolic_reading < 120 && $diastolic_reading < 80)
        {
            return 'Normal Blood Pressure';
        }
        elseif ($stystolic_reading > 119 && $stystolic_reading < 140 || $diastolic_reading > 79 && $diastolic_reading < 90) {
            return 'Pre-hypertension';
        }
        elseif ($stystolic_reading > 139 && $stystolic_reading < 160 || $diastolic_reading > 89 && $diastolic_reading < 100) {
            return 'Stage I high blood pressure-hypertension';
        }
        elseif ($stystolic_reading > 159 && $stystolic_reading < 181 || $diastolic_reading > 99 && $diastolic_reading < 111) {
            return 'Stage II high blood pressure-hypertension';
        }
        elseif ($stystolic_reading > 180 || $diastolic_reading > 110) {
            return 'Hypertensive crisis (Emergency care is required)';
        }
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
