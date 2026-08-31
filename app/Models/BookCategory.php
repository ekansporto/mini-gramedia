<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class BookCategory extends Model
{
    //nama jarak menggunakan e/es karena book category berperan sebagai many pada relasi one to many milik kategori buku
    public function books(): HasMany
    {
        return $this->hasMany(Book::class);
    }
}
