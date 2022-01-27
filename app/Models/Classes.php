<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Str;

class Classes extends Model
{
    use HasFactory;

    public $fillable = [
        'name',
        'desc',
        'price'
    ];

    public function dates()
    {
        return $this->hasMany('App\Models\Date', 'date_id');
    }

    public function name_trimmed()
    {
        return str_replace(' ', '', Str::lower($this->name));
    }
}
