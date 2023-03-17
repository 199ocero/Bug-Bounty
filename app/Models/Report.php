<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Report extends Model
{
    use HasFactory;

    protected $fillable = [
        'program_id',
        'title',
        'severity',
        'status',
    ];

    public function program()
    {
        return $this->belongsTo(Program::class);
    }
}