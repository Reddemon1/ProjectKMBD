<?php

namespace App\Http\Controllers;

use App\Models\Article;
use App\Http\Requests\StoreArticleRequest;
use App\Http\Requests\UpdateArticleRequest;
use Illuminate\Support\Facades\Storage;

class ArticleController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $datas = Article::all();
        return view("admin/article/allarticle", compact('datas'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view("admin/article/addarticle");
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreArticleRequest $request)
    {
        $validated = $request->validated();

        $filePath = $request->file('image')->store('articles', 'public');

        $validated['image'] = "storage/" . $filePath;

        Article::create($validated);

        return redirect(route('all-articles'));
    }

    public function edit($id)
    {
        $article = Article::find($id);
        return view('admin.article.editarticle', compact('article'));
    }
    public function show($id)
    {
        $data = Article::find($id);
        return view('articledetail',compact('data'));
    }
    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateArticleRequest $request, $id)
    {
        $article = Article::find($id);
        $validated = $request->validated();
        if($request->image != NULL){
            Storage::delete($article->image);
            $filePath = $request->file('image')->store('articles', 'public');
            $validated['image'] = "storage/" . $filePath;
        }

        $article->update($validated);
        return redirect(route('all-articles'));
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        $data = Article::findOrFail($id);
        // echo asset($data->image);
        Storage::delete($data->image);
        $data->delete();

        return redirect(route('all-articles'));
    }
}
