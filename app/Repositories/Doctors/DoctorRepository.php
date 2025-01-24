<?php
namespace App\Repositories\Doctors;




use App\Http\Requests\StoreDoctorRequest;
use App\Interfaces\Doctors\DoctorRepositoryInterface;
use App\Models\Doctor;
use App\Models\Image;
use App\Models\Section;
use App\Traits\UploadTrait;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class DoctorRepository implements DoctorRepositoryInterface
{
    use UploadTrait;

    public function index()
    {
        $doctors = Doctor::all();
        return view('Dashboard.Doctors.index',compact('doctors'));
    }

    public function create()
    {

        $sections = Section::all();

        return view('Dashboard.Doctors.add', compact('sections'));
    }


  
    public function store(StoreDoctorRequest $request)
    {
        DB::beginTransaction();
    
        try {
            $doctors = new Doctor();
            $doctors->email = $request->email;
            $doctors->password = Hash::make($request->password);
            $doctors->section_id = $request->section_id;
            $doctors->phone = $request->phone;
            $doctors->price = $request->price;
            $doctors->status = 1;
            $doctors->save();
    
            // Store translations
            $doctors->name = $request->name;
            $doctors->appointments = implode(",", $request->appointments);
            $doctors->save();
    
            // Upload image
            $this->verifyAndStoreImage($request, 'photo', 'doctors', 'upload_image', $doctors->id, 'App\Models\Doctor');
    
            DB::commit();
            session()->flash('add', 'تم إضافة الطبيب بنجاح.');
            return redirect()->route('Doctors.create');
        } catch (\Exception $e) {
            DB::rollback();
            return redirect()->back()->withErrors(['error' => $e->getMessage()]);
        }
    }

    
    public function update($request)
    {
    
    }

    public function destroy($request)
    {
    }



}