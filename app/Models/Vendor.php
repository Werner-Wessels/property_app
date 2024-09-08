<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Vendor extends Model
{
    protected $fillable = ['name'];

    public function vendorType(): BelongsTo
    {
        return $this->belongsTo(VendorType::class);
    }
}
