<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Medicament extends Model
{
    use HasFactory;

    protected $fillable = [
        "reference",
        "name",
        "detail",
    ];

    public function ordonnances(){
        return $this->belongsToMany(Ordonnance::class, 'medicament_ordonnance');
    }
}
