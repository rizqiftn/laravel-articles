<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Article extends Model
{
    use HasFactory;

    protected $fillable = ['title', 'content', 'creator', 'article_img'];

    public function getAllArticles($pagination)
    {
        return self::join('users', 'users.id', '=', 'articles.creator')->paginate($pagination, [
            'articles.*',
            'users.name',
            'users.email'
        ]);
    }
}
