<?php

namespace Tests\Feature;

use App\Models\Patient;
use Illuminate\Foundation\Testing\DatabaseMigrations;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Livewire\Livewire;
use Tests\TestCase;

class BloodPressureTest extends TestCase
{

    use DatabaseMigrations, RefreshDatabase;

    public function testCanCreateBloodPressureReading()
    {
        $patient = Patient::factory()->create();
        
        Livewire::test('read-pressure', ['patient' => $patient->id])
            ->set('systolicPressure', 120)
            ->set('diastolicPressure', 80)
            ->call('create')
            ->assertEmitted('refreshReadingsTable');
    }

    public function testSystolicPressureIsRequired()
    {
        $patient = Patient::factory()->create();
        
        Livewire::test('read-pressure', ['patient' => $patient->id])
            ->set('diastolicPressure', 80)
            ->call('create')
            ->assertHasErrors(['systolicPressure']);
    }

    public function testSystolicPressureCannotBeLessThanZero()
    {
        $patient = Patient::factory()->create();
        
        Livewire::test('read-pressure', ['patient' => $patient->id])
            ->set('systolicPressure', 0)
            ->set('diastolicPressure', 80)
            ->call('create')
            ->assertHasErrors(['systolicPressure']);
    }

    public function testSystolicPressureIsANumber()
    {
        $patient = Patient::factory()->create();
        
        Livewire::test('read-pressure', ['patient' => $patient->id])
            ->set('systolicPressure', 'string')
            ->set('diastolicPressure', 80)
            ->call('create')
            ->assertHasErrors(['systolicPressure']);
    }

    public function testDiastolicPressureIsRequired()
    {
        $patient = Patient::factory()->create();
        
        Livewire::test('read-pressure', ['patient' => $patient->id])
            ->set('systolicPressure', 120)
            ->call('create')
            ->assertHasErrors(['diastolicPressure']);
    }

    public function testDiastolicPressureCannotBeLessThanZero()
    {
        $patient = Patient::factory()->create();
        
        Livewire::test('read-pressure', ['patient' => $patient->id])
            ->set('systolicPressure', 120)
            ->set('diastolicPressure', 0)
            ->call('create')
            ->assertHasErrors(['diastolicPressure']);
    }

    public function testDiastolicPressureIsANumber()
    {
        $patient = Patient::factory()->create();
        
        Livewire::test('read-pressure', ['patient' => $patient->id])
            ->set('systolicPressure', 120)
            ->set('diastolicPressure', 'string')
            ->call('create')
            ->assertHasErrors(['diastolicPressure']);
    }

}
