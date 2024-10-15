<?php

namespace App\Http\Controllers;

use App\Models\CarouselImage;
use Illuminate\Http\Request;

class CarouselImageController extends Controller
{
    /**
     * عرض قائمة جميع صور الكاروسيل مع تجزئة.
     */
    public function index()
    {
        $images = CarouselImage::paginate(10); // عرض 10 صور في كل صفحة
        return view('dashboard.carousel.index', compact('images'));
    }

    /**
     * عرض نموذج إضافة صورة جديدة.
     */
    public function create()
    {
        return view('dashboard.carousel.create');
    }

    /**
     * تخزين صورة جديدة في قاعدة البيانات.
     */
    public function store(Request $request)
    {
        $request->validate([
            'image' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
        ]);

        if ($request->hasFile('image')) {
            // تخزين الصورة في مجلد 'public/images/carousel'
            $imagePath = $request->file('image')->store('images/carousel', 'public');

            // إنشاء سجل جديد في قاعدة البيانات
            CarouselImage::create([
                'image' => $imagePath,
            ]);

            return redirect()->route('carousel.index')->with('success', 'تم إضافة الصورة بنجاح');
        }

        return back()->with('error', 'فشل في إضافة الصورة');
    }

    /**
     * حذف صورة من قاعدة البيانات ونظام الملفات.
     */
    public function destroy(CarouselImage $carousel)
    {
        // التحقق من وجود الصورة في نظام الملفات قبل حذفها
        if (\Storage::disk('public')->exists($carousel->image)) {
            \Storage::disk('public')->delete($carousel->image);
        }

        // حذف السجل من قاعدة البيانات
        $carousel->delete();

        return redirect()->route('carousel.index')->with('success', 'تم حذف الصورة بنجاح');
    }
}
