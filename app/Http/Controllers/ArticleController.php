<?php

namespace App\Http\Controllers;

use App\Models\Article;
use Illuminate\Http\Request;

class ArticleController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $articles = Article::orderBy('id', 'desc')->paginate(6);
        return view('dashboard.article.index', compact('articles'));
    }
    public function show_articles()
    {
        $articles = Article::orderBy('id', 'desc')->paginate(6);
        return view('website.article.index', compact('articles'));
    }

    // public function show_web()
    // {
    //     $articles = Article::orderBy('id', 'desc')->take(3)->get();
    //     return view('welcome', compact('articles'));
    // }
    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('dashboard.article.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        // dd($request->all());
        $request->validate([
            'name' => 'required|string|max:255',
            'name_ar' => 'required|string|max:255',
            // 'description' => 'required|string|max:255',
            // 'description_ar' => 'required|string|max:255',
            // 'image' => 'nullable|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
        ]);

        try {
            $data = $request->only(['name', 'description', 'description_ar', 'name_ar']);

            if ($request->hasFile('image')) {
                $imagePath = $request->file('image')->store('images/article', 'public');
                $data['image'] = $imagePath;
            }

            Article::create($data);
            return redirect()->route('article.index')->with('success', 'تمت عملية الإضافة بنجاح');
        } catch (\Exception $e) {
            return redirect()->back()->with('error', 'هناك مشكلة في عملية الإضافة');
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Article  $article
     * @return \Illuminate\Http\Response
     */
    public function show_public(Article $article)
    {
        return view('website.article.show', compact('article'));
    }
    public function show(Article $article)
    {
        return view('dashboard.article.show', compact('article'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Article  $article
     * @return \Illuminate\Http\Response
     */
    public function edit(Article $article)
    {
        return view('dashboard.article.edit', compact('article'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Article  $article
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Article $article)
    {
        // dd($request->all());
        try {
            $request->validate([
                'name' => 'required|string|max:255',
                'name_ar' => 'required|string|max:255',
                // 'description' => 'required|string|max:255',
                // 'description_ar' => 'required|string|max:255',
                // 'image' => 'nullable|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
            ]);

            $data = [
                'name' => $request->name,
                // 'description' => $request->description,
                // 'description_ar' => $request->description_ar,
                'name_ar' => $request->name_ar,
            ];

            if ($request->hasFile('image')) {
                if ($article->image && \Storage::disk('public')->exists($article->image)) {
                    \Storage::disk('public')->delete($article->image);
                }
                $imagePath = $request->file('image')->store('images/article', 'public');
                $data['image'] = $imagePath;
            }
            $article->update($data);

            return redirect()->route('article.index')->with('success', 'تم نحديث البيانات بنجاح');
        } catch (\Exception $e) {
            return redirect()->back()->with('error', 'هناك مشكلة في تعديل البيانات');
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Article  $article
     * @return \Illuminate\Http\Response
     */
    public function destroy(Article $article)
    {
        try {
            if ($article->image && \Storage::disk('public')->exists($article->image)) {
                \Storage::disk('public')->delete($article->image);
            }

            $article->delete();
            return redirect()->back()->with('success', 'تم الحذف بنجاح');
        } catch (\Exception $e) {
            return redirect()->back()->with('error', 'هناك مشكلة في عملية الحذف');
        }
    }
}
