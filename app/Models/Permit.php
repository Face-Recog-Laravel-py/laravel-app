<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Permit extends Model
{
    use HasFactory;

    protected $guarded = ['id'];

    public function users ()
    {
        return $this->belongsTo(User::class);
    }

    public function permits ()
    {
        return $this->belongsTo(Permit::class);
    }
}
