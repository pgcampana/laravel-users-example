<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\article;
use App\Http\Controllers\Controller;

class ArticlesController extends Controller
{

	public function __construct() {
		//$this->middleware('auth', ['only' => 'index']);
	}

	/**
	 * Display a listing of the resource.
	 *
	 * @return Response
	 */
	public function index(Request $request)
	{
		$articles = article::latest()->get();
		if ($request->ajax() || $request->wantsJson()) {
			return new JsonResponse($users);
		}
		return view('articles.index', compact('articles'));
	}

	/**
	 * Show the form for creating a new resource.
	 *
	 * @return Response
	 */
	public function create()
	{
		return view('articles.create');
	}

	/**
	 * Store a newly created resource in storage.
	 *
	 * @param  Request  $request
	 * @return Response
	 */
	public function store(UserRequest $request)
	{
		$input = $request->all();
		$article = Article::create([
				'title' => $input['titolo'],
				'text' => $input['Descrizione'],
		]);

		if ($request->ajax() || $request->wantsJson()) {
			return new JsonResponse($article);
		}

		flash()->success('salvato con successo!');

		return redirect('article');
	}

	/**
	 * Display the specified resource.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function show(User $article)
	{
		return view('article.show', compact('articles'));
	}

	/**
	 * Show the form for editing the specified resource.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function edit(Article $article)
	{
		return view('article.edit', compact('articles'));
	}

	/**
	 * Update the specified resource in storage.
	 *
	 * @param  Request  $request
	 * @param  int  $id
	 * @return Response
	 */
	public function update(UserRequest $request, Article $article)
	{
		$input = $request->all();
		$article->update([
				'title' => $input['titolo'],
				'text'	=> $input['Descrizione'],
		]);


		if ($request->ajax() || $request->wantsJson()) {
			return new JsonResponse($user);
		}

		flash()->success('aggiornato con successo!');

		return redirect('article');
	}

	/**
	 * Remove the specified resource from storage.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function destroy(Request $request, Article $article)
	{
		$article->delete();
		if ($request->ajax() || $request->wantsJson()) {
			return new JsonResponse($article);
		}
		return redirect('article');
	}
}
