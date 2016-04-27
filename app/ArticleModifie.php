<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class ArticleModifie extends Model
{
    protected $table = 'article_modifie';
    protected $fillable = ['reference', 'numero_article', 'titre'];
}
