<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Pending extends Model
{
    use HasFactory;
    public function user()
    {
        return $this->belongsTo(User::class);
    }
    protected $fillable = [
        'title',
        'image',
        'description',
        'date',
        'registration_link',
        'status',
        'user_id'
    ];
}
