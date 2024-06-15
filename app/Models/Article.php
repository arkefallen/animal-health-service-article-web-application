<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Article extends Model
{
    protected $table = 'articles';

    protected $primaryKey = 'id';

    use HasFactory;

    protected $fillable = [
        'title',
        'content',
        'author',
        'date',
        'category_id'
    ];

    public function category() {
        return $this->belongsTo(ArticleCategory::class, 'category_id', 'id');
    }
}
