<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Tenant extends Model
{
    protected $fillable = [
        'tenant_type_id',
        'property_id',
        'display_name',
        'name',
        'surname',
        'email',
        'mobile_number',
        'office_number'
    ];

    public function tenantType(): BelongsTo
    {
        return $this->belongsTo(TenantType::class);
    }

    public function property(): BelongsTo
    {
        return $this->belongsTo(Property::class);
    }
}
