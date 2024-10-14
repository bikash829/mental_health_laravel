<?php

namespace App\Models\Events;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Relations\HasMany;
use App\Models\Events\ServiceCategory;

// import category model 


class Service extends Model
{
    use HasFactory;
    use SoftDeletes;

    protected $fillable = [
        'service_name',
        'description',
        'user_id',
        'service_category_id',
        'is_available',
    ];



    public function category()
    {
        return $this->belongsTo(ServiceCategory::class);
    }

    public function items()
    {
        return $this->hasMany(ServiceItem::class);
    }

}
