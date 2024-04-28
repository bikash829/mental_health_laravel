<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
// import user
use App\Models\User;

class UserFeedback extends Model
{
    use HasFactory;

    protected $fillable = [
        'user_id',
        'expert_id',
        'feedback',
        'rating_point',
    ];

    // public function patient()
    // {
    //     return $this->hasOne(User::class);
    // }

    public function user() {
        return $this->belongsTo(User::class, 'user_id');
    }

    public function expert() {
        return $this->belongsTo(User::class, 'expert_id');
    }
}
