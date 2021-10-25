@extends('layouts.base')

@section('body')
    <div class="container mx-auto">
        <div class="flex justify-between align-middle">
            <div>
                <h1 class="mt-5 ml-3 text-2xl text-gray-500">New Pressure Reading</h1>
            </div>
        </div>
        <div class="w-full rounded overflow-hidden shadow-lg my-5">
            <div class="px-6 py-4 mt-2 mb-7">
              <div class="w-full text-justify text-sm">
                  <div class="flex justify-between">
                    <p>Name: {{ $patient->name }}</p>
                    <p>Phone Number: {{ $patient->phone_number }}</p>
                    <p>Age: {{ \Carbon\Carbon::parse($patient->date_of_birth)->diffInYears(today()) }}</p>
                    <p>Gender: {{ $patient->gender }}</p>
                  </div>
              </div>
            </div>
        </div>

        <div class="flex justify-between">
            <div class="w-1/3">
                <div class="w-full rounded overflow-hidden shadow-lg my-5">
                    <h3 class="px-6 py-4 mt-2">New Pressure Reading</h3>
                    @livewire('read-pressure', ['patient' => $patient->id])
                </div>
            </div>
            <div class="w-2/3 pl-4">
                <div class="w-full rounded overflow-hidden shadow-lg my-5">
                    <h3 class="px-6 py-4 mt-2">Blood Pressure History</h3>
                    <div class="p-4">
                        @livewire('pressure-reading-table', ['patient' => $patient->id])
                    </div>
                </div>
            </div>
        </div>

    </div>
@endsection