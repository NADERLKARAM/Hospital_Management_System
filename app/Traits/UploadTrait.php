<?php

namespace App\Traits;

use App\Models\Image;
use Illuminate\Http\Request;
use Illuminate\Support\Str;

trait UploadTrait
{
    /**
     * التحقق من الصورة وحفظها
     *
     * @param Request $request
     * @param string $inputname
     * @param string $foldername
     * @param string $disk
     * @param int $imageable_id
     * @param string $imageable_type
     * @return string|null
     */
    public function verifyAndStoreImage(Request $request, $inputname, $foldername, $disk, $imageable_id, $imageable_type)
    {
        // التحقق من وجود ملف مرفق في الطلب
        if ($request->hasFile($inputname)) {
            // التحقق من صلاحية الملف المرفق
            if (!$request->file($inputname)->isValid()) {
                // عرض رسالة خطأ إذا كانت الصورة غير صالحة
                flash('Invalid Image!')->error()->important();
                return redirect()->back()->withInput();
            }

            // الحصول على الملف واسم الصورة الجديد
            $photo = $request->file($inputname);
            $name = Str::slug($request->input('name')); // اسم مهيأ بشكل جيد
            $filename = $name . '.' . $photo->getClientOriginalExtension(); // الاسم مع الامتداد

            // إنشاء سجل في جدول الصور
            $image = new Image();
            $image->filename = $filename;
            $image->imageable_id = $imageable_id;
            $image->imageable_type = $imageable_type;
            $image->save();

            // حفظ الصورة فعليًا في التخزين
            return $request->file($inputname)->storeAs($foldername, $filename, $disk);
        }

        // إذا لم يتم رفع صورة
        return null;
    }
}