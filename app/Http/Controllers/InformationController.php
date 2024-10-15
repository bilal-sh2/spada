<?php

namespace App\Http\Controllers;

use App\Models\Information;
use Illuminate\Http\Request;
use App\Models\CarouselImage;
use App\Models\Branch;


class InformationController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $infos = Information::orderBy('id', 'desc')->get();
        return view('dashboard.info.index', compact('infos'));
    }
    public function show_public()
    {
        $images = CarouselImage::all();
        $branches=Branch::all();
        $info = Information::orderBy('id', 'desc')->get();
        return view('landing.aboutus', compact('info','images','branches'));
    }
    public function show_contact()
    {
    
        $info = Information::orderBy('id', 'desc')->get();
        return view('landing.contact', compact('info'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('dashboard.info.create');
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
        // التحقق من صحة البيانات
        $request->validate([
            'address' => 'nullable|string|max:255',
            'address_ar' => 'nullable|string|max:255',
            'email' => 'nullable|email|max:255',
            'phone_number' => 'nullable|max:255',
            // 'about' => 'nullable|max:255',
        ]);

        try {
            // إنشاء السجل في قاعدة البيانات
            Information::create([
                'address' => $request->address,
                'email' => $request->email,
                'phone_number' => $request->phone_number,
                'about' => $request->about,
                'about_ar' => $request->about_ar,
                'address_ar' => $request->address_ar,
            ]);

            // إعادة التوجيه مع رسالة نجاح
            return redirect()->route('info.index')->with('success', 'تمت عملية الإضافة بنجاح');
        } catch (\Exception $e) {
            // إعادة التوجيه مع رسالة خطأ
            return redirect()->back()->with('error', 'هناك مشكلة في عملية الإضافة');
        }
    }


    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Information  $info
     * @return \Illuminate\Http\Response
     */
    public function show(Information $info)
    {
        return view('dashboard.info.show', compact('information'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Information  $info
     * @return \Illuminate\Http\Response
     */
    public function edit(Information $info)
    {
        return view('dashboard.info.edit', compact('info'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Information  $info
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Information $info)
    {
            // إنشاء السجل في قاعدة البيانات
            $info->update([
                'address' => $request->address,
                'address_ar' => $request->address_ar,
                'email' => $request->email,
                'phone_number' => $request->phone_number,
                'about' => $request->about,
                'about_ar' => $request->about_ar,
            ]);

            // إعادة التوجيه مع رسالة نجاح
            return redirect()->route('info.index')->with('success', 'تمت عملية التعديل بنجاح');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Information  $info
     * @return \Illuminate\Http\Response
     */
    public function destroy(Information $info)
    {
        try {
            $info->delete();
            return redirect()->back()->with('success', 'تم الحذف بنجاح');
        } catch (\Exception $e) {
            return redirect()->back()->with('error', 'هناك مشكلة في عملية الحذف');
        }
    }
}
