<?php

namespace App\Http\Controllers;

use App\Models\Video;
use Illuminate\Http\Request;

class VideoController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $videos = Video::orderBy('id', 'desc')->paginate(9);
        return view('dashboard.video.index', compact('videos'));
    }

    public function show_videos()
    {
        $videos = Video::orderBy('id', 'desc')->paginate(9);
        return view('website.video.index', compact('videos'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('dashboard.video.create');
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
            'description' => 'required|string|max:255',
            'description_ar' => 'required|string|max:255',
            'evaluation' => 'required|string|max:255',
            // 'video' => 'nullable|max:20480', // التحقق من الفيديو
        ]);

        try {
            $data = $request->only(['name', 'description', 'description_ar', 'evaluation','name_ar']);

            if ($request->hasFile('video')) {
                $videoPath = $request->file('video')->store('videos', 'public'); // تخزين الفيديو
                $data['video'] = $videoPath; // تخزين مسار الفيديو
            }


            Video::create($data);
            return redirect()->route('video.index')->with('success', 'تمت عملية الإضافة بنجاح');
        } catch (\Exception $e) {
            return redirect()->back()->with('error', 'هناك مشكلة في عملية الإضافة' . $e->getMessage());
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Video  $video
     * @return \Illuminate\Http\Response
     */
    public function show_public(Video $video)
    {
        return view('website.video.show', compact('video'));
    }
    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Video  $video
     * @return \Illuminate\Http\Response
     */
    public function show(Video $video)
    {
        return view('dashboard.video.show', compact('video'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Video  $video
     * @return \Illuminate\Http\Response
     */
    public function edit(Video $video)
    {
        return view('dashboard.video.edit', compact('video'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Video  $video
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Video $video)
    {
        try {
            $request->validate([
                'name' => 'required|string|max:255',
                'name_ar' => 'required|string|max:255',
                'description' => 'required|string|max:255',
                'description_ar' => 'required|string|max:255',
                'evaluation' => 'required|string|max:255',
                // 'video' => 'nullable|mimes:mp4,avi,mov,wmv|max:20480', // التحقق من الفيديو
            ]);

            $data = [
                'name' => $request->name,
                'description' => $request->description,
                'description_ar' => $request->description_ar,
                'name_ar' => $request->name_ar,
                'evaluation' => $request->evaluation,
            ];

            if ($request->hasFile('video')) {
                // حذف الفيديو القديم إذا كان موجودًا
                if ($video->video && \Storage::disk('public')->exists($video->video)) {
                    \Storage::disk('public')->delete($video->video);
                }
                // تخزين الفيديو الجديد
                $videoPath = $request->file('video')->store('videos', 'public');
                $data['video'] = $videoPath;
            }
            $video->update($data);

            return redirect()->route('video.index')->with('success', 'تم نحديث البيانات بنجاح');
        } catch (\Exception $e) {
            return redirect()->back()->with('error', 'هناك مشكلة في تعديل البيانات');
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Video  $video
     * @return \Illuminate\Http\Response
     */
    public function destroy(Video $video)
    {
        try {
            // تحقق من وجود الفيديو وحذفه إذا كان موجودًا
            if ($video->video && \Storage::disk('public')->exists($video->video)) {
                \Storage::disk('public')->delete($video->video);
            }

            $video->delete();
            return redirect()->back()->with('success', 'تم الحذف بنجاح');
        } catch (\Exception $e) {
            return redirect()->back()->with('error', 'هناك مشكلة في عملية الحذف');
        }
    }
}
