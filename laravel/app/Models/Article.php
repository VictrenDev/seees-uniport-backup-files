<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Article extends Model
{
    use HasFactory;
    protected $primaryKey = 'article_id';

    public function scopeFilter($query, array $filters) {
        // if($filters['tag'] ?? false) {
        //     $query->where('tags', 'like', '%' . request('tag') . '%');
        // }

        if($filters['search'] ?? false) {
            $query->where('title', 'like', '%' . request('search') . '%')
                ->orWhere('desc', 'like', '%' . request('search') . '%');
        }
    }

    public function images() {
        return $this->belongsToMany(Image::class, 'image_refs', 'article_id', 'image_id');
    }
}
