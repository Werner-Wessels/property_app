<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Transaction extends Model
{
    use HasFactory;

    protected $fillable = [
        'date',
        'property_id',
        'type_id',
        'amount',
        'transaction_type',
        'type',
        'comment',
    ];

    public function type()
    {
        return $this->belongsTo(TransactionType::class);
    }

    public function property()
    {
        return $this->belongsTo(Property::class);
    }


}
