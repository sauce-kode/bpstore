<?php

namespace App\Models;

use App\Traits\Uuids;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Patient extends Model
{
    use HasFactory, Uuids;

    public $incrementing = false;

    protected $fillable = [
        'name',
        'phone_number',
        'date_of_birth',
        'gender',
        'address'
    ];

    public function setNameAttribute($value)
    {
        $this->attributes['name'] = ucwords($value);
    }

    public function setGenderAttribute($value)
    {
        $this->attributes['gender'] = strtolower($value);
    }

    public function getGenderAttribute($value)
    {
        return ucfirst($value);
    }

}
