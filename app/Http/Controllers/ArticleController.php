<?php

namespace App\Http\Controllers;

use App\Article;
use App\Http\Resources\Article as ArticleResource;
use Illuminate\Http\Request;

class ArticleController extends Controller
{
    //get all articles
    public function index()
    {
        $articles = Article::latest()->paginate(5);
        return ArticleResource::collection($articles);
    }

    //add article
    public function store(Request $request)
    {
        $article = $request->isMethod('put') ?
        Article::findOrFail($request->article_id) : new Article();

        $article->id = $request->input('article_id');
        $article->title = $request->input('title');
        $article->body = $request->input('body');

        if ($article->save()){
            return new ArticleResource($article);
        }
    }

    //get one article
    public function show($id)
    {
        $article = Article::findOrFail($id);
        return new ArticleResource($article);
    }

    public function update(Request $request, $id)
    {
        //
    }

    public function destroy($id)
    {
        // Get article
        $article = Article::findOrFail($id);

        if ($article->delete()) {
            return new ArticleResource($article);
        }

        return null;
    }
}
