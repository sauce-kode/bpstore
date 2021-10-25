<?php

namespace App\Http\Livewire;

use App\Models\PressureReading;
use Illuminate\Database\Eloquent\Builder;
use Rappasoft\LaravelLivewireTables\DataTableComponent;
use Rappasoft\LaravelLivewireTables\Views\Column;

class PressureReadingTable extends DataTableComponent
{

    public $patientId;

    protected $listeners = ['refreshReadingsTable' => '$refresh'];

    public function mount($patient)
    {
        $this->patientId = $patient;
    }

    public function columns(): array
    {
        return [
            Column::make('Date/Time', 'created_at')
                ->sortable(),
            Column::make('Blood Pressure')->format(function($value, $column, $reading){
                return "{$reading->systolic}/{$reading->diastolic}";
            }),
        ];
    }

    public function query(): Builder
    {
        return PressureReading::query()->where('patient_id', $this->patientId);
    }
}
