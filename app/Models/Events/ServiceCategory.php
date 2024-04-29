<?php

namespace App\Models\Events;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Relations\HasMany;


class ServiceCategory extends Model
{
    use HasFactory;
    use SoftDeletes;



    protected $fillable = [
        'category_name',
        'description',
        'status',
    ];

    public function services()
    {
        return $this->hasMany(Service::class);
    }
}
