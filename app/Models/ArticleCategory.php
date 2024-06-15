<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ArticleCategory extends Model
{
    use HasFactory;

    protected $table = 'article_category';

    protected $primaryKey = 'id';

    protected $fillable = [
        'category_name'
    ];

    public function article() {
        return $this->hasMany(Article::class, 'category_id', 'id');
    }
}
