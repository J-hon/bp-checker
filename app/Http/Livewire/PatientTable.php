<?php

namespace App\Http\Livewire;

use Illuminate\Database\Eloquent\Builder;
use Rappasoft\LaravelLivewireTables\DataTableComponent;
use Rappasoft\LaravelLivewireTables\Views\Column;
use App\Models\Patient;

class PatientTable extends DataTableComponent
{

    protected string $pageName = 'patients';
    protected string $tableName = 'patients';

    public function columns(): array
    {
        return [
            Column::make('Name', 'name')->sortable()->searchable(),
            Column::make('E-mail', 'email')->searchable(),
            Column::make('Mobile', 'mobile_number')->searchable(),
        ];
    }

    public function query(): Builder
    {
        return Patient::query();
    }

    public function rowView(): string
    {
        return 'livewire-tables.rows.patient-table';
    }

    public function getTableRowUrl($row): string
    {
        return route('blood-pressure-reading.create', $row);
    }
}
