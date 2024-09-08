<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Landlord extends Model
{
    protected $fillable = [
        'landlord_type_id',
        'address_id',
        'display_name',
        'name',
        'surname',
        'mobile_number',
        'office_number',
        'email'
    ];

    public function landlordType(): BelongsTo
    {
        return $this->belongsTo(LandlordType::class);
    }

    public function address(): BelongsTo
    {
        return $this->belongsTo(Address::class);
    }

    public function properties(): HasMany
    {
        return $this->hasMany(Property::class, 'entity_id');
    }
}
