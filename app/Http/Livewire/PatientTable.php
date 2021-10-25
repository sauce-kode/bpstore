<?php

namespace App\Http\Livewire;

use App\Models\Patient;
use Carbon\Carbon;
use Illuminate\Database\Eloquent\Builder;
use Rappasoft\LaravelLivewireTables\DataTableComponent;
use Rappasoft\LaravelLivewireTables\Views\Column;

class PatientTable extends DataTableComponent
{

    public function columns(): array
    {
        return [
            Column::make('Name', 'name')
                ->searchable(),
            Column::make('Phone Number', 'phone_number'),
            Column::make('Gender', 'gender'),
            Column::make('Age', 'date_of_birth')
                ->format(function($value){
                    return Carbon::parse($value)->diffInYears(today());
                }),
            Column::make('', 'id')->format(function($value){
                return view('livewire-tables.rows.reading', ['patientId' => $value]);
            }),
        ];
    }

    public function query() : Builder
    {
        return Patient::query();
    }
    
}
