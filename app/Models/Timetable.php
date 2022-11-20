<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Timetable extends Model
{
    use HasFactory;

    use SoftDeletes;

    protected $fillable
        = [
            'group',
            'day_num',
            'time',
            'title',
            'prepod',
            'audience',
            'created_at',
            'updated_at',
        ];
}
