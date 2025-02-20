<?php

namespace App\Models;


use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class UserStats extends Model
{
    use HasFactory;

    protected $fillable = ['currentlyReading', 'finishedReading', 'notReading'];

    protected $table = "userStats";

    public function user()
    {
        return $this->belongsTo(User::class, 'user_id', 'id');
    }

}
