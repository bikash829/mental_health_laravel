<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Expert extends Model
{
    use HasFactory;
    public $timestamps = true;


    protected $fillable = [
        'doc_title',
        'license_no',
        'license_attachment',
        'license_attachment_location',
        'user_id',
    ];

    public function user(){
        return $this->belongsTo(User::class);
    }
}
