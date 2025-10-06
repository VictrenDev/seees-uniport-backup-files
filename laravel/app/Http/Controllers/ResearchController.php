<?php

namespace App\Http\Controllers;

use App\Models\Article;
use Illuminate\View\View;
use Illuminate\Http\Request;

class ResearchController extends Controller
{
    // Returns all research acrticles
    public function show(): View
    {
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
}
