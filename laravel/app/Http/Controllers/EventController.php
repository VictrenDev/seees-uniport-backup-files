<?php

namespace App\Http\Controllers;

use App\Models\Article;
use Illuminate\View\View;
use Illuminate\Http\Request;

class EventController extends Controller
{
    // Returns all event and news acrticles
    public function show(): View
    {
        $query = Article::orderBy('created_at', 'desc')
            ->where('status', 'published')
            ->where(function ($query) {
                $query->where('tag', 'event')
                    ->orWhere('tag', 'campaign')
                    ->orWhere('tag', 'news')
                    ->orWhere('tag', 'seminar');
            })
            ->filter(request(['search']))
            ->with('images');
        
        $event = $query->paginate(6);
        
        return view('/events', ['events' => $event]);
    }
}
