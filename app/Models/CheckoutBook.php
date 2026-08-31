<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Attributes\Fillable;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Relations\BelongsTo;


#[Fillable(['checkout_id', 'book_id', 'total_book'])]
class CheckoutBook extends Model
{
    public function checkoutBooks(): HasMany
    {
        return $this->hasMany(CheckoutBook::class);
    }
    public function user(): BelongsTo
    {
        return $this->belongsTo(User::class);
    }
}
