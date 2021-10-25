<?php

namespace App\Models;

use App\Traits\Uuids;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PressureReading extends Model
{
    use HasFactory, Uuids;

    public $incrementing = false;

    protected $fillable = [
        'patient_id',
        'systolic',
        'diastolic'
    ];

    public function patient()
    {
        return $this->belongsTo(Patient::class);
    }
    
}
