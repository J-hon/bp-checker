<?php

namespace App\Exports;

use App\Models\Patient;
use Carbon\Carbon;
use Maatwebsite\Excel\Concerns\Exportable;
use Maatwebsite\Excel\Concerns\FromQuery;
use Maatwebsite\Excel\Concerns\WithHeadings;
use Maatwebsite\Excel\Concerns\WithMapping;

class PatientsExport implements FromQuery, WithHeadings, WithMapping
{

    use Exportable;

    public function query()
    {
        return Patient::query();
    }

    public function headings(): array
    {
        return [
            '#',
            'Name',
            'Mobile Number',
            'Email',
            'Created on'
        ];
    }

    public function map($patient) : array
    {
        return [
            $patient->id,
            $patient->name,
            $patient->mobile_number,
            $patient->email,
            Carbon::parse($patient->created_at)->format('Y-m-d')
        ];
    }
}
