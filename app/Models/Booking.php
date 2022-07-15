<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Booking extends Model
{
    use HasFactory;

    public $fillable = [
        'name',
        'email',
        'phone',
        'participants',
        'class_id',
        'date_id'
    ];

    public function class() {
        return $this->belongsTo('App\Models\Classes');
    }

    public function Date() {
        return $this->belongsTo('App\Models\Date');
    }
}
