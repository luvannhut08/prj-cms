<?php

namespace App\Models\Api\Manager;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    use HasFactory;

    protected $table = 'categorys';

    protected $fillable = [
        'category_name',
        'level',
        'parent',
    ];

    public function book()
    {
        return $this->hasMany(Book::class, 'id_category');
    }
}
