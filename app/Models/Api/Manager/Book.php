<?php

namespace App\Models\Api\Manager;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Book extends Model
{
    use HasFactory;

    protected $table = 'books';

    protected $fillable = [
        'book_name',
        'id_manager',
        'id_author',
        'id_category',
        'price',
        'image',
        'description',
    ];

    public function manager()
    {
        return $this->belongsTo(Manager::class);
    }

    public function author()
    {
        return $this->belongsTo(Author::class);
    }

    public function category()
    {
        return $this->belongsTo(Category::class);
    }

}
