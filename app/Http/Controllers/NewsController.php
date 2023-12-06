<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Http\RedirectResponse;
use App\Models\News;

class NewsController extends Controller
{
    private $columns=['title',
    'content',
    'author',
     'published'];
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        // $news= News::all();
        $news = News::get();

        return view("news", ["news" => $news]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view("add-news");
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request): RedirectResponse
    {

        // validate task 7
        $data = $request->only($this->columns);
        $data['published'] = isset($data['published']) ? true : false;
        $request->validate([
            'title' => 'required|string',
            'content' => 'required|string|max:100|min:10|lowercase',
            'author' => 'required|string'

        ]);



        News::create($data);
        // $news=new News();
        // $news->title=$request->title;
        // $news->content=$request->content;
        // $news->author=$request->author;
        // $request->published?$news->published=1:$news->published=0;
        // $news->save();
        // return "data added successfully";
        return redirect('news');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $news = News::findOrFail($id);
        return view('single-news', ['news' => $news]);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $news = News::findOrFail($id);
        return view('update-news', ['news' => $news]);
    }

    /**
     * Update the specified resource in storage.
     */

    public function update(Request $request, string $id): RedirectResponse
    {
        $news = News::findOrFail($id);


        $news->update([
            'title' => $request->title,
            'content' => $request->content,
            'author' => $request->author,
            'published' => $request->has('published')
        ]);

        return redirect('news');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id): RedirectResponse
    {
        // News::findOrFail($id)->delete();
        News::where('id', $id)->delete();
        return redirect('news');

    }
    //task 7
    public function trashedNews()
    {
        $news = News::onlyTrashed()->get();
        return view('trashed-news', compact('news'));
    }

    public function restoreNews(string $id): RedirectResponse
    {
        News::where('id', $id)->restore();
        return redirect('news');
    }
    public function forcedDNews(string $id): RedirectResponse
    {
        News::where('id', $id)->forceDelete();
        return redirect('news');
    }


}
