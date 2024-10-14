<?php

namespace App\Models\Events;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
// use Illuminate\Database\Eloquent\Relations\BelongsToMany;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class ServiceItem extends Model
{
    use HasFactory;
    use SoftDeletes;

    protected $fillable = [
        'name',
        'description',
        'price',
        'quantity',
        // $table->foreignId('service_category_id')->constrained()->onDelete('cascade');
        // $table->foreignId('service_id')->constrained()->onDelete('cascade');
    ];
    public function items(): BelongsTo
    {
        return $this->belongsTo(Service::class);
    }
}
