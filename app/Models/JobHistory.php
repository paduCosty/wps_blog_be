<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class JobHistory extends Model
{
    use HasFactory;
    
    protected $table = 'jobs_history';

    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
