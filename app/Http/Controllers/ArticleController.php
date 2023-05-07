<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreFileRequest;
use App\Models\Article;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Support\Facades\Route;

class ArticleController extends Controller
{
    //
    public function index(Request $request)
    {
        $articles = (new Article())->getAllArticles(10);

        if ( Route::currentRouteName() == 'article-api') {
            return new Response([
                'data' => $articles
            ]);
        }

        return view('/article/index', compact('articles'));
    }

    public function create()
    {
        return view('/article/create');
    }

    public function store(StoreFileRequest $request)
    {
        $fileName = auth()->id() . '_' . time() . '.'. $request->file->extension();
        $request->file->move(public_path('uploads'), $fileName);

        $article = Article::create([
            'title' => $request->title,
            'content' => $request->content,
            'article_img' => $fileName,
            'creator' => auth()->id()
        ]);
        return back()->with('success', 'Create Article Success!');
    }
}
