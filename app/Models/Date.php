<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Date extends Model
{
    use HasFactory;

    public $fillable = [
        'class_id',
        'date',
        'availability'
    ];

    public function class() {
        return $this->belongsTo('App\Models\Classes');
    }
}
