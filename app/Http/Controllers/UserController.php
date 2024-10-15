<?php

namespace App\Http\Controllers;
use App\Models\User;
use Illuminate\Http\Request;

class UserController extends Controller
{
    public function showProfile()
    {
        $user = auth()->user(); // جلب بيانات المستخدم الحالي
        return view('dashboard.user.show', compact('user')); // إرسال بيانات المستخدم إلى العرض
    }

    public function updateProfile(Request $request)
    {
        // التحقق من المدخلات
        $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|string|email|max:255|unique:users,email,' . auth()->id(),
            'password' => 'nullable|string|min:8|confirmed',
        ]);

        // جلب المستخدم الحالي
        $user = auth()->user();

        // تحديث البيانات
        $user->name = $request->input('name');
        $user->email = $request->input('email');

        // تحديث كلمة المرور إذا تم إدخالها
        if ($request->filled('password')) {
            $user->password = bcrypt($request->input('password'));
        }

        // حفظ التعديلات
        $user->save();

        // إعادة التوجيه مع رسالة نجاح
        return redirect()->route('profile.show')->with('success', 'تم تحديث بيانات المستخدم  بنجاح');
    }

}
