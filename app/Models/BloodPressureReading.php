<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class BloodPressureReading extends Model
{

    /**
     * The attributes that are mass assignable.
     *
     * @var string[]
     */
    protected $fillable = [
        'patient_id',
        'systolic_pressure',
        'diastolic_pressure'
    ];

    /**
     * Define relationships
     */
    public function patient()
    {
        return $this->belongsTo(Patient::class);
    }

}
