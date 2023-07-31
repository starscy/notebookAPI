<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Notebook extends Model
{
    use HasFactory;

    public $timestamps = false;

    protected $table = 'notebooks';
    protected $fillable = [
        'title',
        'company',
        'phone',
        'email',
        'birthday',
        'photo',
    ];
}
