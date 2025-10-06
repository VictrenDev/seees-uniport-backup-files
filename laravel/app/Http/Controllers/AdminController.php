<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Image;
use App\Models\Article;
use App\Http\Controllers\Controller;

class AdminController extends Controller
{   
    // Show content creation dashboard
    public function content() {
        $currentRoute = 'content';
        return view("admin.content", ['currentRoute'=>$currentRoute]);
    }
    
    public function edit(Article $article) {
        $currentRoute = 'content';
        if (!$article) {
            // Article doesn't exist, redirect back with a flash message
            return redirect()->route('home')->with('error', 'Article not found.');
        }

        $firstImage = $article->images->first();
        return view('admin.edit', [
            'article' => $article,
            'image' => $firstImage,
            'currentRoute'=>$currentRoute,
        ]);
    }

    // Show stat page and return stats to view
    public function stats() {
        $currentRoute = 'statistics';
        $userCount = User::count();
        $imageCount = Image::count();
        $publishedArticleCount = Article::where('status', 'published')->count();;
        $pendingArticleCount = Article::where('status', 'pending')->count();;
        return view("admin.statistics", ['stat'=>compact('userCount', 'imageCount', 'publishedArticleCount', 'pendingArticleCount'),
        'currentRoute'=>$currentRoute]);
    }

    // Return page manager
    public function pages() {
        $currentRoute = 'pages';
        
        return view("admin.pages", ['currentRoute'=>$currentRoute,
        'pages' => Article::orderBy('created_at','desc')->get()
        ]);
    }
}