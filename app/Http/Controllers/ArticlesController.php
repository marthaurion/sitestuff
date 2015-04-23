<?php namespace App\Http\Controllers;

use App\Article;
use App\Category;
use App\Tag;
use App\Http\Requests;
use App\Http\Requests\ArticleRequest;
use Auth;
use Route;


class ArticlesController extends Controller {

    protected $page_limit = 5;

    public function __construct()
    {
        $this->middleware('super', ['only' => ['create', 'store', 'edit', 'update']]);
    }

	public function index()
	{
		$articles = Article::latest('published_at')->published()->simplePaginate($this->page_limit);

		return view('articles.index', compact('articles'));
	}

    public function category($slug)
    {
        $category = Category::where('slug', '=', $slug)->first();
        $articles = $category->articlesAll()->latest('published_at')->published()->simplePaginate($this->page_limit);

        if(count($articles) < 1) abort(404);

        return view('articles.index', compact('articles'));
    }

    public function tags($slug)
    {
        $tag = Tag::where('slug', '=', $slug)->first();
        $articles = $tag->articles()->published()->latest('published_at')->simplePaginate($this->page_limit);

        if(count($articles) < 1) abort(404);

        return view('articles.index', compact('articles'));
    }

	public function show($slug)
	{
		$article = Article::published()->where('slug', '=', $slug)->firstOrFail();

		return view('articles.show', compact('article'));
	}

	public function create()
	{
		return view('articles.create');
	}

	public function store(ArticleRequest $request)
	{
        $this->createArticle($request);

        session()->flash('flash_message', 'Your article has been created!');
		return redirect('/');
	}

	public function edit($slug)
	{
		$article = Article::where('slug', '=', $slug)->firstOrFail();

		return view('articles.edit', compact('article'));
	}

	public function update($slug, ArticleRequest $request)
	{
		$article = Article::where('slug', '=', $slug)->firstOrFail();

		$article->update($request->all());

		$this->syncTags($article, $request->input('tag_list'));

		return redirect('/');
	}

	private function createArticle(ArticleRequest $request)
	{
		$article = Auth::user()->articles()->create($request->all());

		$this->syncTags($article, $request->input('tag_list'));

		return $article;
	}

	private function syncTags(Article $article, $tags)
	{
		if(!isset($tags)) $tags = [];
		$article->tags()->sync($tags);
	}
}
