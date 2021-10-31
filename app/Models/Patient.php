<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Patient extends Model
{

    use HasFactory;

    /**
     * The attributes that are mass assignable.
     *
     * @var string[]
     */
    protected $fillable = [
        'name',
        'mobile_number',
        'email'
    ];

    /**
     * Define relationships
     */
    public function bloodPressureReadings()
    {
        return $this->hasMany(BloodPressureReading::class);
    }
}
