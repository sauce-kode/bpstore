<?php

namespace Tests\Feature;

use App\Models\Patient;
use Illuminate\Bus\PendingBatch;
use Illuminate\Foundation\Testing\DatabaseMigrations;
use Illuminate\Support\Facades\Bus;
use Livewire\Livewire;
use Tests\TestCase;

class PatientTest extends TestCase
{
    
    // use RefreshDatabase;

    use DatabaseMigrations;

    public function testCanCreatePatient()
    {
        Livewire::test('create-patient')
            ->set('name', 'Jack Bauer')
            ->set('phoneNumber', '803-841-094')
            ->set('dateOfBirth', '1993-07-10')
            ->set('gender', 'male')
            ->set('address', 'Los Angeles')
            ->call('create')
            ->assertEmitted('patientCreated');
    }

    public function testNameIsRequired()
    {
        Livewire::test('create-patient')
            ->set('phoneNumber', '803-841-094')
            ->set('dateOfBirth', '1993-07-10')
            ->set('gender', 'male')
            ->set('address', 'Los Angeles')
            ->call('create')
            ->assertHasErrors(['name']);
    }

    public function testPhoneNumberIsRequired()
    {
        Livewire::test('create-patient')
            ->set('name', 'Jack Bauer')
            ->set('dateOfBirth', '1993-07-10')
            ->set('gender', 'male')
            ->set('address', 'Los Angeles')
            ->call('create')
            ->assertHasErrors(['phoneNumber']);
    }

    public function testDateOfBirthIsRequired()
    {
        Livewire::test('create-patient')
            ->set('name', 'Jack Bauer')
            ->set('phoneNumber', '803-841-094')
            ->set('gender', 'male')
            ->set('address', 'Los Angeles')
            ->call('create')
            ->assertHasErrors(['dateOfBirth']);
    }

    public function testGenderIsRequired()
    {
        Livewire::test('create-patient')
            ->set('name', 'Jack Bauer')
            ->set('phoneNumber', '803-841-094')
            ->set('dateOfBirth', '1993-07-10')
            ->set('address', 'Los Angeles')
            ->call('create')
            ->assertHasErrors(['gender']);
    }

    public function testAddressIsRequired()
    {
        Livewire::test('create-patient')
            ->set('name', 'Jack Bauer')
            ->set('phoneNumber', '803-841-094')
            ->set('dateOfBirth', '1993-07-10')
            ->set('gender', 'male')
            ->call('create')
            ->assertHasErrors(['address']);
    }

    public function testCanExportPatients()
    {
        Bus::fake();
        Patient::factory()->count(1000)->create();
        Livewire::test('export-patient')->call('export');
        Bus::assertBatched(function(PendingBatch $batch){
            return $batch->name == 'export-patients';
        });
    }

}
