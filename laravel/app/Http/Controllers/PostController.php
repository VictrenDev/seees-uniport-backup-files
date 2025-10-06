<?php

namespace App\Http\Controllers;

use App\Models\Image;
use App\Models\Article;
use Illuminate\View\View;
use Illuminate\Http\Request;

class PostController extends Controller
{
    public function post(Article $article) {
        if (!$article || $article->status === 'pending') {
            // Article doesn't exist, redirect back with a flash message
            return redirect()->route('home')->with('error', 'Article not found.');
        }

        if ($article->tag === 'resource') {
            // $query = Article::orderBy('created_at','desc')
            // ->where('status', 'published')
            // ->where('tag', 'resource')
            // ->with('images');
    
            // $resource = $query->paginate(6);
    
            // return view('/library', ['resources'=> $resource]);
            return view('library');
        }

        if ($article->tag === 'research' || $article->tag === 'project') {
            $query = Article::orderBy('created_at','desc')
            ->where('status', 'published')
            ->where(function ($query) {
                $query->where('tag', 'research')
                ->orWhere('tag', 'project');
            })
            ->filter(request(['search']))
            ->with('images');
    
            $research = $query->paginate(6);
    
            return view('/research', ['researches'=> $research]);
        }

        $query = Article::orderBy('created_at','desc')
            ->where('status', 'published')
            ->where('tag', $article->tag)
            ->whereNotIn('article_id', [$article->article_id])
            ->take(3)
            ->with('images');
        $related = $query->get();

        $firstImage = $article->images->first();
        return view('post', [
            'article' => $article,
            'image' => $firstImage,
            'related_posts'=> $related,
        ]);
    }
}
