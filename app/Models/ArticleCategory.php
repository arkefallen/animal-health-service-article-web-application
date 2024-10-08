<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class ArticleCategory extends Model
{
    use HasFactory;
    use SoftDeletes;

    protected $table = 'article_category';

    protected $primaryKey = 'id';

    protected $fillable = [
        'category_name'
    ];

    public function article() {
        return $this->hasMany(Article::class, 'category_id', 'id');
    }
}
