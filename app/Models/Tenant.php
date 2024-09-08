<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Tenant extends Model
{
    protected $fillable = [
        'tenant_type_id',
        'display_name',
        'name',
        'surname',
        'email',
        'mobile_number',
        'office_number',
        'address_id'
    ];

    public function tenantType(): BelongsTo
    {
        return $this->belongsTo(TenantType::class);
    }

    public function address(): BelongsTo
    {
        return $this->belongsTo(Address::class);
    }

    public function tenant_type(): BelongsTo
    {
        return $this->belongsTo(TenantType::class);
    }
}
