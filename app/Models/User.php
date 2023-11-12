<?php

namespace App\Models;

// use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;
use Spatie\Permission\Traits\HasRoles;


class User extends Authenticatable
{
    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'first_name',
        'last_name',
        'email',
        'password',
        'marital_status',
        'gender',
        'phone_code',
        'phone',
        'nationality',
        'additional_phone_code',
        'additional_phone',
        'date_of_birth',
        'identity_type',
        'identity_no',
        'identity_proof',
        'identity_location',
        'religion',
        'blood_group_id',
        'pp_name',
        'pp_location',
        'is_verified',

    ];
    use HasRoles; # from spatie


    use HasApiTokens, HasFactory, Notifiable, SoftDeletes;

    /**
     * The attributes that should be hidden for serialization.
     *
     * @var array<int, string>
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * The attributes that should be cast.
     *
     * @var array<string, string>
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
        'password' => 'hashed',
    ];

    public function bloodGroup(){
        return $this->belongsTo(BloodGroup::class);
    }
    public function address(){
        return $this->hasOne(Address::class);
    }

    public function expert(){
        return $this->hasOne(Expert::class);
    }

    public function training(){
        return $this->hasMany(TrainingInfo::class);
    }

    public function education(){
        return $this->hasMany(Education::class);
    }

    public function experience(){
        return $this->hasMany(ExperienceInfo::class);
    }

    public function post(){
        return $this->hasMany(Post::class);
    }

    // relationship with comment
    public function comment(){
        return $this->hasMany(Comment::class);
    }
}
