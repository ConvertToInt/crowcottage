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
        'time',
        'price'
    ];

    public function dates()
    {
        return $this->hasMany('App\Models\Date', 'class_id', 'id');
    }

    public function date($date)
    {
        return $this->dates()->where('date', $date);
    }

    public function name_trimmed()
    {
        return str_replace(' ', '', Str::lower($this->name));
    }
}
