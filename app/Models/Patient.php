<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Patient extends Model
{
    use HasFactory;
    protected $fillable = ['name', 'location', 'pharmacienID', "ordonnanceID"];

    public function pharmacien()
    {
        return $this->belongsTo(Pharmacien::class, "pharmacienID");
    }
    public function ordonnance(){
        return $this->hasOne(Ordonnance::class, "ordonnanceID");
    }
}
