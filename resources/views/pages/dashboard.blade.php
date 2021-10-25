@extends('layouts.base')

@section('body')
    <div class="container mx-auto">
      <div class="flex justify-between align-middle my-10">
          <div>
            <h1 class="mt-5 ml-3 text-2xl text-gray-500">All Patients</h1>
          </div>
          <div class="">
              <a href="{{ route('patient.add') }}" class="bg-transparent hover:bg-blue-500 text-blue-700 hover:text-white py-1 px-2 border border-blue-500 hover:border-transparent rounded">New Patient</a>
          </div>
      </div>
      <div class="w-full rounded overflow-hidden shadow-lg my-5">
          <div class="px-6 py-4 mt-2 mb-7">
            <div class="w-full text-justify text-sm">
              <div class="mb-10">
                @livewire('export-patient')
              </div>
              @livewire('patient-table')
            </div>
          </div>
      </div>
    </div>
@endsection