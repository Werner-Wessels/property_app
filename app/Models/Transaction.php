<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Transaction extends Model
{
    use HasFactory;

    protected $fillable = [
        'date',
        'property_id',
        'transaction_type_id',
        'transaction_status_id',
        'amount',
        'transaction_type',
        'type',
        'comment',
    ];

    public function transaction_type(): BelongsTo
    {
        return $this->belongsTo(TransactionType::class);
    }

    public function property(): BelongsTo
    {
        return $this->belongsTo(Property::class);
    }

    public function transactionStatus(): BelongsTo
    {
        return $this->belongsTo(TransactionStatus::class);
    }


}
