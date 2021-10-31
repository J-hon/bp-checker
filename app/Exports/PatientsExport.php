<?php

namespace App\Exports;

use Carbon\Carbon;
use Illuminate\Contracts\Queue\ShouldQueue;
use Maatwebsite\Excel\Concerns\Exportable;
use Maatwebsite\Excel\Concerns\FromQuery;
use Maatwebsite\Excel\Concerns\WithCustomQuerySize;
use Maatwebsite\Excel\Concerns\WithHeadings;
use Maatwebsite\Excel\Concerns\WithMapping;

class PatientsExport implements FromQuery, ShouldQueue, WithHeadings, WithMapping, WithCustomQuerySize
{

    use Exportable;

    protected $query;

    public function __construct($query)
    {
        $this->query = $query;
    }

    public function query()
    {
        return $this->query;
    }

    public function headings(): array
    {
        return [
            'Name',
            'Mobile Number',
            'Email',
            'Joined on'
        ];
    }

    public function map($patient) : array
    {
        return [
            $patient->name,
            $patient->mobile_number,
            $patient->email,
            Carbon::parse($patient->created_at)->format('Y-m-d')
        ];
    }

    public function querySize(): int
    {
        return $this->query->count();
    }
}
