<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Article;
use App\Models\Information;
use App\Models\Video;
use App\Models\CarouselImage;

use Illuminate\Http\Request;



class CategoryController extends Controller
{




    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $categories = Category::orderBy('id', 'desc')->paginate(6);
        return view('dashboard.category.index', compact('categories'));
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Category  $category
     * @return \Illuminate\Http\Response
     */
    public function show_public(Category $category)
    {
        $products = $category->products()->paginate(8);
        return view('website.category.index', compact('products'));
    }
    public function show_web()
    {
        // جلب أحدث 4 تصنيفات
        $categories = Category::orderBy('id', 'desc')->take(4)->get();

        // جلب أحدث 4 مقالات
        $articles = Article::orderBy('id', 'desc')->take(4)->get();

        // جلب أحدث 4 فيديوهات بتقييم 'width'
        $videos = Video::where('evaluation', 'width')
            ->orderBy('id', 'desc')
            ->take(4)
            ->get();

        // جلب جميع المعلومات
        $info = Information::orderBy('id', 'desc')->get();

        // جلب أحدث 10 صور للكروسل
        $images = CarouselImage::orderBy('id', 'desc')->take(10)->get();

        // تمرير البيانات إلى العرض
        return view('welcome', compact('categories', 'articles', 'videos', 'info', 'images'));
    }
    public function show_cat()
    {
        // جلب 4 عناصر فقط
        $categories = Category::orderBy('id', 'desc')->paginate(6);

        return view('website.category.all_category', compact('categories'));
    }



    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('dashboard.category.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //  dd($request->all());
        $request->validate([
            'category_name' => 'required|string|max:255',
            'category_name_ar' => 'required|string|max:255',
            // 'description' => 'required|string|max:255',
            // 'description_ar' => 'required|string|max:255',
            'image' => 'nullable|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
        ]);

        try {
            $data = $request->only(['category_name', 'description', 'description_ar', 'category_name_ar']);

            if ($request->hasFile('image')) {
                $imagePath = $request->file('image')->store('images/category', 'public');
                $data['image'] = $imagePath;
            }

            Category::create($data);
            return redirect()->route('category.index')->with('success', 'تمت إضافة الفئة بنجاح');
        } catch (\Exception $e) {
            return redirect()->back()->with('error', 'هناك مشكلة في عملية الإضافة');
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Category  $category
     * @return \Illuminate\Http\Response
     */
    public function show(Category $category)
    {
        $products = $category->products;
        return view('dashboard.category.show', compact('category', 'products'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Category  $category
     * @return \Illuminate\Http\Response
     */
    public function edit(Category $category)
    {
        return view('dashboard.category.edit', compact('category'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Category  $category
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Category $category)
    {
        // dd($request->all());
        try {
            $request->validate([
                'category_name' => 'required|string|max:255',
                'category_name_ar' => 'required|string|max:255',
                // 'description' => 'required|string|max:255',
                // 'description_ar' => 'required|string|max:255',
                'image' => 'nullable|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
            ]);

            $data = [
                'category_name' => $request->category_name,
                'category_name_ar' => $request->category_name_ar,
                'description' => $request->description,
                'description_ar' => $request->description_ar,
            ];

            if ($request->hasFile('image')) {
                if ($category->image && \Storage::disk('public')->exists($category->image)) {
                    \Storage::disk('public')->delete($category->image);
                }
                $imagePath = $request->file('image')->store('images/category', 'public');
                $data['image'] = $imagePath;
            }
            $category->update($data);

            return redirect()->route('category.index')->with('success', 'تم نحديث البيانات بنجاح');
        } catch (\Exception $e) {
            return redirect()->back()->with('error', 'هناك مشكلة في تعديل البيانات');
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Category  $category
     * @return \Illuminate\Http\Response
     */
    public function destroy(Category $category)
    {
        // return $category;
        try {
            if ($category->image && \Storage::disk('public')->exists($category->image)) {
                \Storage::disk('public')->delete($category->image);
            }

            $category->delete();
            return redirect()->back()->with('success', 'تم الحذف بنجاح');
        } catch (\Exception $e) {
            return redirect()->back()->with('error', 'هناك مشكلة في عملية الحذف');
        }
    }
}
