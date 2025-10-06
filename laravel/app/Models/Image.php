<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Image extends Model
{
    use HasFactory;
    protected $primaryKey = 'image_id';

    public function articles() {
        return $this->belongsToMany(Article::class, 'image_refs', 'image_id', 'article_id');
    }
}
