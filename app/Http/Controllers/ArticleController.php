<?php

namespace App\Http\Controllers;

use App\Article;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Gate;
use Illuminate\Support\Facades\Storage;
use PDF;

class ArticleController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
        $this->middleware(function ($request, $next) {
            if (Gate::allows('isUser')) return $next($request);
            abort(403, 'Anda tidak memiliki cukup hak akses');
        });
    }

    public function cetak(Article $article)
    {
        $articles = Article::findOrFail($article->id);
        $pdf = PDF::loadview('articles.articlesPDF', compact('articles'));
        return $pdf->stream();
        // return $pdf->download('laporan-pegawai-pdf');
        // return view('articles.articlesPDF', compact('articles'));
    }

    public function index()
    {
        $articles = Article::all();
        return view('articles.home', compact('articles'));
    }


    public function create()
    {

        $articles = Article::all();
        return view('articles.create', compact('articles'));
    }

    public function store(Request $request)
    {
        // Validate the request...
        if ($request->file('file')) {
            $files = $request->file('file')->store('img/article', 'public');
        }
        $request->validate([
            'file' => 'required|mimes:png,jpg,jpeg|max:2048'
        ]);
        $article = new Article();

        $article->title = $request->title;
        $article->author = $request->author;
        $article->body = $request->body;
        $article->image = $files;
        $article->save();
        return redirect()->route('article')
            ->with('success', 'Article created successfully.');
        //Redirect ke halaman books/index.blade.php dengan pesan success
    }

    public function show(Article $article)
    {
        return view('articles.detail', compact('article'));
    }


    public function edit(Article $article)
    {
        return view('articles.edit', compact('article'));
    }

    public function update(Request $request, Article $article)
    {
        $article = Article::find($article->id);
        $article->title = $request->title;
        $article->body = $request->body;
        $article->author = $request->author;

        if (
            $article->image && file_exists(storage_path('app/public/' . $article->image))
        ) {
            Storage::delete('public/' . $article->image);
        }
        $nama_image = $request->file('image')->store('images', 'public');
        $article->image = $nama_image;

        $article->save();
        return redirect()->route('article');
    }

    public function destroy(Article $article)
    {
        $article = Article::findOrFail($article->id);
        $article->delete();
        return redirect()->route('article')
            ->with('danger', 'Article deleted successfully.'); //Redirect ke halaman books/index.blade.php dengan pesan success
    }
}
