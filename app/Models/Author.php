<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Book;

class Author extends Model
{
    use HasFactory;
    
    protected $fillable = [
        'name',
        'birth_date',
    ];  

    public function books(): HasMany
    {
        return $this->hasMany(Book::class);
    }
}
