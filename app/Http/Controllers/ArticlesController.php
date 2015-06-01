<?php namespace App\Http\Controllers;

use App\Article;
use App\Http\Requests;
use App\Http\Controllers\Controller;

use App\Http\Requests\ArticleRequest;
use Auth;
use Illuminate\Http\Request;

class ArticlesController extends Controller {

    public function __construct()
    {
        $this->middleware('auth', ['only' => 'create']);
    }

    /**
     * Show all articles
     *
     * @return Response
     */
    public function index()
    {
        $articles = Article::latest('published_at')
            ->published()->get();

        return view('articles.index')
            ->with('articles', $articles);
    }

    /**
     * Show a single article
     *
     * @param Article $article
     * @return Response
     */
    public function show(Article $article)
    {
        return view('articles.show')
            ->with('article', $article);
    }

    /**
     * Show the page to create a new article
     *
     * @return Response
     */
    public function create()
    {
        return view('articles.create');
    }

    /**
     * Save a new article
     *
     * @param ArticleRequest $request
     * @return Response
     */
    public function store(ArticleRequest $request)
    {
        $article = new Article($request->all());

        Auth::user()->articles()->save($article);

        return redirect('articles');
    }

    /**
     * Edit an existing article
     *
     * @param Article $article
     * @return Response
     */
    public function edit(Article $article)
    {
        return view('articles.edit')
            ->with('article', $article);
    }

    /**
     * Update an article
     *
     * @param Article $article
     * @param ArticleRequest $request
     * @return Response
     */
    public function update(Article $article, ArticleRequest $request)
    {
        $article->update($request->all());

        return redirect('articles');
    }
}
