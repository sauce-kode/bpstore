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

    public function map($patient) : array
    {
        return [
            ucwords($patient->name),
            $patient->phone_number,
            ucwords($patient->address),
            $patient->date_of_birth,
            Carbon::parse($patient->date_of_birth)->diffInYears(today()),
            ucfirst($patient->gender),
            $patient->created_at
        ];
    }

    public function headings(): array
    {
        return [
            'Name',
            'Contact Number',
            'Contact Address',
            'Date Of Birth',
            'Age',
            'Gender',
            'Registration Date/Time'
        ];
    }

}
