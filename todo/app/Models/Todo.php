<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Carbon;

class Todo extends Model
{
    use HasFactory;

    protected $fillable = ['title', 'notes', 'start', 'end', 'duetime'];

    public $timestamps = false;

    protected $casts = [
        'complete' => 'boolean',
        'start' => 'date',
        'end' => 'date',
    ];

    public function getDuetimeAttribute($value)
    {
        return $value ? Carbon::createFromFormat('H:i:s', $value) : null;
    }
}
