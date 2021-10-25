<?php

namespace App\Http\Livewire;

use App\Models\PressureReading;
use Livewire\Component;

class ReadPressure extends Component
{

    public $systolicPressure, $diastolicPressure, $patientId;

    protected $rules = [
        'systolicPressure' => 'required|numeric|min:1',
        'diastolicPressure' => 'required|numeric|min:1',
    ];

    protected $messages = [
        'systolicPressure.required' => 'Enter Systolic Pressure',
        'systolicPressure.numeric' => 'Value must be a number',
        'systolicPressure.min' => 'Systolic pressure cannot be less than 1',
        'diastolicPressure.required' => 'Enter Diastolic Pressure',
        'diastolicPressure.numeric' => 'Value must be a number',
        'diastolicPressure.min' => 'Systolic pressure cannot be less than 1'
    ];

    public function mount($patient)
    {
        $this->patientId = $patient;
    }

    public function render()
    {
        return view('livewire.read-pressure');
    }

    public function create()
    {
        try {
            $data = $this->validate();
            PressureReading::create([
                'patient_id' => $this->patientId,
                'systolic' => $data['systolicPressure'],
                'diastolic' => $data['diastolicPressure']
            ]);
            $this->emit('refreshReadingsTable', $this->patientId);
        } catch (\Throwable $th) {
            throw $th;
        }
    }

}
