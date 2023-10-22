<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Education extends Model
{
    use HasFactory;
    public $timestamps = true;

    protected $fillable = [
        'institute',
        'specialization',
        'duration',
        'passing_year',
        'edu_doc_title',
        'certificate_location',
        'user_id',

    ];

    public function user(){
        return $this->belongsTo(User::class);
    }
}
