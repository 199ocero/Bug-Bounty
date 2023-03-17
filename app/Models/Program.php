<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Program extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'pentesting_start_date',
        'pentesting_end_date',
    ];

    public function report()
    {
        return $this->hasMany(Report::class);
    }
}