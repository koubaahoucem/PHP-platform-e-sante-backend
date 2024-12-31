<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Ordonnance extends Model
{
    use HasFactory;
    protected $fillable=[
        "reference",
        "dataOrdonnance",
        "detailsOrdonnance",
        "pharmacienID",
        "patientID",
    ];

    public function pharmacien(){
        return $this->belongsTo(Pharmacien::class, 'pharmacienID');
    }

    public function patient(){
        return $this->belongsTo(Patient::class, 'patientID');
    }
}
