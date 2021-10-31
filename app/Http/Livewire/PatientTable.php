<?php

namespace App\Http\Livewire;

use App\Exports\PatientsExport;
use Illuminate\Database\Eloquent\Builder;
use Maatwebsite\Excel\Excel;
use Rappasoft\LaravelLivewireTables\DataTableComponent;
use Rappasoft\LaravelLivewireTables\Views\Column;
use App\Models\Patient;

class PatientTable extends DataTableComponent
{

    protected string $pageName = 'patients';
    protected string $tableName = 'patients';

    public array $bulkActions = [
        'exportSelected' => 'Export',
    ];

    public function exportSelected()
    {
        if ($this->selectedRowsQuery->count() > 0) {
            return (new PatientsExport($this->selectedRowsQuery))->queue($this->tableName . '.csv');
        }

        session()->flash('message', 'You did not select any patients to export.');
    }

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
