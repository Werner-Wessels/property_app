<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Address extends Model
{
    protected $fillable = [
        'name',
        'address_type_id',
        'street_address',
        'address_line_2',
        'suburb',
        'city',
        'province',
        'postal_code'
    ];

    public function addressType(): BelongsTo
    {
        return $this->belongsTo(AddressType::class);
    }

    public function properties(): HasMany
    {
        return $this->hasMany(Property::class, 'entity_id');
    }
}
