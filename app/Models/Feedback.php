<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Feedback extends Model
{
    use HasFactory;
    use SoftDeletes;

    protected $table = 'feedback';

    protected $primaryKey = 'id';

    protected $fillable = [
        'username',
        'comment',
        'score',
        'checkup_id',
        'checkup_category',
        'feedback_category',
        'animal_category'
    ];
}
