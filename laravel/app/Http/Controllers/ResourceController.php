<?php

namespace App\Http\Controllers;

use App\Models\Article;
use Illuminate\View\View;
use Illuminate\Http\Request;

class ResourceController extends Controller
{
    // Returns all resource acrticles
    public function show(): View
    {
        $query = Article::orderBy('created_at','desc')
        ->where('status', 'published')
        ->where('tag', 'resource')
        ->filter(request(['search']))
        ->with('images');

        $resource = $query->paginate(6);

        return view('/library', ['resources'=> $resource]);
    }
}
