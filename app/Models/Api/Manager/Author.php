<?php

namespace App\Models\Api\Manager;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Author extends Model
{
    use HasFactory;

    protected $table = 'authors';

    protected $fillable = [
        'author_name',
        'website',
    ];

    public function book()
    {
        return $this->hasMany(Book::class);
    }

}
