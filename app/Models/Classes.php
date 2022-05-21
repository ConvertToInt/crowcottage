<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Str;
use Carbon\Carbon;

class Classes extends Model
{
    use HasFactory;

    public $fillable = [
        'name',
        'desc',
        'price_per_block',
        'weeks_per_block',
        'start_time',
        'end_time',
        'spaces'
    ];

    public function dates()
    {
        return $this->hasMany('App\Models\Date', 'class_id', 'id');
    }

    public function name_trimmed()
    {
        return str_replace(' ', '', Str::lower($this->name));
    }
}
