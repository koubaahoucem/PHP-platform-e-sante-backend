<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Pharmacien extends Model
{
    use HasFactory;
    protected $fillable = [
        'name',
        'lastname',
        'email',
        'speciality',
        'password',
    ];

    public function Patient()
    {
        return $this->hasMany(Patient::class, "pharmacienID");
    }

    public function Ordonnace(){
        return $this->hasMany(Ordonnance::class, "pharmacienID");
    }
}
