<?php

namespace App\Http\Controllers\Stage;

use App\Http\Controllers\Controller;
use App\Article;


class IndexController extends Controller
{
    public function index()
    {
        return view('stage.index.index', [
            'data' => Article::where('published_at', '<=', now())
                ->orderBy('published_at', 'desc')
                ->paginate(config('blog.article_per_page'))
        ]);
    }

    public function show($slug)
    {
        return view('stage.index.show', [
            'data' => Article::where('slug', $slug)
                ->firstOrFail()
        ]);
    }
}