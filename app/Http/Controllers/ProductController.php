<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Product;
use Illuminate\Http\Request;

class ProductController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        // جلب المنتجات مع الفئة الخاصة بها مع ترتيبها تنازليًا
        $products = Product::with('category')->orderBy('id', 'desc')->paginate(9);

        return view('dashboard.product.index', compact('products'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        // جلب جميع الفئات لعرضها في النموذج
        $categories = Category::all();
        return view('dashboard.product.create', compact('categories'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        // التحقق من المدخلات
        $request->validate([
            'name' => 'required|string|max:255',
            'name_ar' => 'required|string|max:255',
            'description' => 'required|string|max:255',
            'description_ar' => 'required|string|max:255',
            'image' => 'nullable|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
            'category_id' => 'required|exists:categories,id',
        ]);

        try {
            // جلب البيانات من الطلب
            $data = $request->only([
                'name',
                'name_ar',
                'category_id',
                'description',
                'description_ar',
            ]);

            // رفع الصورة إذا كانت موجودة
            if ($request->hasFile('image')) {
                $imagePath = $request->file('image')->store('images/products', 'public');
                $data['image'] = $imagePath;
            }

            // إنشاء المنتج الجديد
            Product::create($data);

            return redirect()->route('products.index')->with('success', 'تم إضافة البيانات بنجاح');
        } catch (\Exception $e) {
            return redirect()->back()->with('error', 'هناك خطأ في  إضافة البيانات.');
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function show_public(Product $product)
    {
        // جلب المنتجات المرتبطة بنفس الفئة ما عدا المنتج الحالي
        $relatedProducts = Product::where('category_id', $product->category_id)
                                  ->where('id', '!=', $product->id)
                                  ->take(8)
                                  ->get();

        return view('website.product.show', compact('product', 'relatedProducts'));
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function show(Product $product)
    {
        return view('dashboard.product.show', compact('product'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function edit(Product $product)
    {
        // جلب جميع الفئات لعرضها في صفحة التعديل
        $categories = Category::all();
        return view('dashboard.product.edit', compact('product', 'categories'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Product $product)
    {
        try {
            // التحقق من المدخلات
            $request->validate([
                'name' => 'required|string|max:255',
                'name_ar' => 'required|string|max:255',
                'category_id' => 'required|exists:categories,id',
            ]);

            // تجهيز البيانات لتحديث المنتج
            $data = [
                'name' => $request->name,
                'name_ar' => $request->name_ar,
                'category_id' => $request->category_id,
                'description' => $request->description,
                'description_ar' => $request->description_ar,
            ];

            // معالجة الصورة الجديدة إذا تم رفعها
            if ($request->hasFile('image')) {
                if ($product->image && \Storage::disk('public')->exists($product->image)) {
                    \Storage::disk('public')->delete($product->image);
                }
                $imagePath = $request->file('image')->store('images/products', 'public');
                $data['image'] = $imagePath;
            }

            // تحديث المنتج
            $product->update($data);

            return redirect()->route('products.index')->with('success', 'تم تحديث البيانات بنجاح');
        } catch (\Exception $e) {
            return redirect()->back()->with('error', 'هناك مشكلة في عملية التحديث');
        }
    }

    /**
     * Toggle the favorite status of the product.
     *
     * @param  \App\Models\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function toggleFavorite(Product $product)
    {
        try {
            // تبديل حالة الإعجاب
            $product->favourit = !$product->favourit;
            $product->save();

            return redirect()->route('products.index')->with('success', 'تم تحديث حالة الإعجاب بنجاح');
        } catch (\Exception $e) {
            return redirect()->back()->with('error', 'هناك مشكلة في تحديث حالة الإعجاب');
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function destroy(Product $product)
    {
        try {
            // حذف الصورة إذا كانت موجودة
            if ($product->image && \Storage::disk('public')->exists($product->image)) {
                \Storage::disk('public')->delete($product->image);
            }

            // حذف المنتج
            $product->delete();

            return redirect()->back()->with('success', 'تمت عملية الحذف بنجاح');
        } catch (\Exception $e) {
            return redirect()->back()->with('error', 'هناك مشكلة في عملية الحذف');
        }
    }
}
