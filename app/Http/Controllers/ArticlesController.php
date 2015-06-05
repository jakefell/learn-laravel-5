<?php namespace App\Http\Controllers;

use App\Article;
use App\Http\Requests;
use App\Http\Controllers\Controller;

use App\Http\Requests\ArticleRequest;
use App\Tag;
use Auth;
use Illuminate\Http\Request;

class ArticlesController extends Controller {

    /**
     * Create a new ArticlesController instance.
     */
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
        $tags = Tag::lists('name', 'id');

        return view('articles.create')
            ->with('tags', $tags);
    }

    /**
     * Save a new article
     *
     * @param ArticleRequest $request
     * @return Response
     */
    public function store(ArticleRequest $request)
    {
        $this->createArticle($request);

        flash()->success('Your articles has been created!');

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
        $tags = Tag::lists('name', 'id');

        return view('articles.edit')
            ->with([
                'article' => $article,
                'tags' => $tags
            ]);
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
        $this->updateArticle($article, $request);

        return redirect('articles');
    }


    /**
     * Sync up the list of tags in the database.
     *
     * @param Article $article
     * @param array $tags
     */
    private function syncTags(Article $article, array $tags)
    {
        $article->tags()->sync($tags);
    }

    /**
     * Save a new article.
     *
     * @param ArticleRequest $request
     * @return \Illuminate\Database\Eloquent\Model
     */
    private function createArticle(ArticleRequest $request)
    {
        $article = Auth::user()->articles()->create($request->all());

        $this->syncTags($article, $request->input('tag_list'));

        return $article;
    }

    /**
     * Update an article.
     *
     * @param Article $article
     * @param ArticleRequest $request
     */
    private function updateArticle(Article $article, ArticleRequest $request)
    {
        $article->update($request->all());

        $this->syncTags($article, $request->input('tag_list'));
    }
}
