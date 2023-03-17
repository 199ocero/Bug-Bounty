<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Program extends Model
{
    use HasFactory;

    protected $fillable = [
        'user_id',
        'name',
        'pentesting_start_date',
        'pentesting_end_date',
    ];

    public function report()
    {
        return $this->hasMany(Report::class);
    }
    public function user()
    {
        return $this->belongsTo(User::class);
    }
}