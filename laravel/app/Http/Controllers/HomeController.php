<?php

namespace App\Http\Controllers;

use App\Models\Article;
use Illuminate\View\View;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    // Return categorized articles for index page
    public function show(): View
    {
        $event = Article::orderBy('article_id', 'desc')
            ->where('status', 'published')
            ->where(function ($query) {
                $query->where('tag', 'sport')
                    ->orWhere('tag', 'event')
                    ->orWhere('tag', 'campaign');
            })
            ->take(3)
            ->with('images')
            ->get();
    
        $research = Article::orderBy('article_id', 'desc')
            ->where('status', 'published')
            ->where(function ($query) {
                $query->where('tag', 'research')
                    ->orWhere('tag', 'project');
            })
            ->take(3)
            ->with('images')
            ->get();
    
        return view('/index', [
            'event' => $event,
            'research' => $research,
        ]);
    }    
}
