<?php

namespace App\Http\Controllers;

use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Routing\Controller as BaseController;
use App\Models\Category;
use App\Models\CarouselImage;

class Controller extends BaseController
{
    use AuthorizesRequests, DispatchesJobs, ValidatesRequests;

    public function show_web()
    {
        // جلب أحدث 10 تصنيفات
        $categories = Category::orderBy('id', 'desc')->take(10)->get();

        // جلب أحدث 10 صور للكروسل
        $images = CarouselImage::all(); // عرض 10 صور في كل صفحة

        return view('welcome', compact('categories', 'images')); // تمرير المتغيرات إلى العرض
    }
}
