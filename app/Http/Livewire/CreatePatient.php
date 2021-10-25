<?php

namespace App\Http\Livewire;

use App\Models\Patient;
use Illuminate\Support\Facades\Log;
use Livewire\Component;

class CreatePatient extends Component
{

    public $name, $phoneNumber, $dateOfBirth, $gender, $address;

    protected $rules = [
        'name' => 'required',
        'phoneNumber' => 'required',
        'dateOfBirth' => 'required',
        'gender' => 'required',
        'address' => 'required'
    ];

    protected $messages = [
        'name.required' => 'Enter Patient\'s name',
        'phoneNumber.required' => 'Enter Patien\'s phone number',
        'dateOfBirth.required' => 'Select Date Of Birth',
        'gender.required' => 'Select Patient\'s Gender',
        'address.required' => 'Enter Patient\'s address'
    ];

    public function render()
    {
        return view('livewire.create-patient');
    }

    public function create()
    {
        $data = $this->validate();
        try {
            Patient::create([
                'name' => $data['name'],
                'phone_number' => $data['phoneNumber'],
                'date_of_birth' => $data['dateOfBirth'],
                'gender' => $data['gender'],
                'address' => $data['address']
            ]);
            session()->flash('success', 'Patient successfully created.');
            $this->emit('patientCreated');
            $this->reset();
        } catch (\Throwable $th) {
            throw $th;
        }
    }
}
