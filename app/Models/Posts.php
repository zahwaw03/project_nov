<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Posts extends Model
{
    use HasFactory;

    protected $table = 'posts';

    protected $primaryKey = 'id';

    protected $fillable = [
        'title',
        'body',
        'image',
        'category_id',
        'author_id',
    ];

    public function category()
    {
        return $this->belongsTo(Category::class, 'category_id');
    }

}
