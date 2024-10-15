<?php

namespace App\Http\Controllers;

use App\Models\Branch;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class BranchController extends Controller
{
    /**
     * عرض جميع الفروع.
     */
    public function index()
    {
        $branches = Branch::all();
        return view('dashboard.branches.index', compact('branches')); // نفترض أنك ستعرض الفروع في صفحة ويب
    }

    /**
     * عرض نموذج إنشاء فرع جديد.
     */
    public function create()
    {
        return view('dashboard.branches.create');
    }

    /**
     * تخزين فرع جديد.
     */
    public function store(Request $request)
    {
        $validated = $request->validate([
            'name' => 'required|string|max:255',
            'branch_name_ar' => 'nullable|string|max:255',
            'latitude' => 'required|numeric',
            'longitude' => 'required|numeric',
            'description' => 'nullable|string',
            'description_ar' => 'nullable|string',
            'image' => 'nullable|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
        ]);

        if ($request->hasFile('image')) {
            $imagePath = $request->file('image')->store('branches', 'public');
            $validated['image'] = $imagePath;
        }

        $branch = Branch::create($validated);

        return redirect()->route('branches.index')->with('success', 'تم إنشاء الفرع بنجاح.');
    }

    /**
     * عرض نموذج تعديل فرع موجود.
     */
    public function edit($id)
    {
        $branch = Branch::findOrFail($id);
        return view('dashboard.branches.edit', compact('branch'));
    }

    /**
     * تحديث فرع موجود.
     */
    public function update(Request $request, $id)
    {
        $branch = Branch::findOrFail($id);

        $validated = $request->validate([
            'name' => 'sometimes|required|string|max:255',
            'branch_name_ar' => 'nullable|string|max:255',
            'latitude' => 'sometimes|required|numeric',
            'longitude' => 'sometimes|required|numeric',
            'description' => 'nullable|string',
            'description_ar' => 'nullable|string',
            'image' => 'nullable|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
        ]);

        if ($request->hasFile('image')) {
            // حذف الصورة القديمة إذا كانت موجودة
            if ($branch->image && Storage::disk('public')->exists($branch->image)) {
                Storage::disk('public')->delete($branch->image);
            }

            // تخزين الصورة الجديدة
            $imagePath = $request->file('image')->store('branches', 'public');
            $validated['image'] = $imagePath;
        }

        $branch->update($validated);

        return redirect()->route('branches.index')->with('success', 'تم تحديث الفرع بنجاح.');
    }

    /**
     * حذف فرع موجود.
     */
    public function destroy($id)
    {
        $branch = Branch::findOrFail($id);

        // حذف الصورة المرتبطة بالفرع إذا كانت موجودة
        if ($branch->image && Storage::disk('public')->exists($branch->image)) {
            Storage::disk('public')->delete($branch->image);
        }

        $branch->delete();

        return redirect()->route('branches.index')->with('success', 'تم حذف الفرع بنجاح.');
    }

    /**
     * عرض صفحة الخريطة.
     */
    public function viewMap()
    {
        return view('dashboard.branches.map');
    }
}
