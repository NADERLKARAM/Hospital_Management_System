<?php

namespace App\Http\Controllers\Dashboard;

use App\Http\Controllers\Controller;
use App\Http\Requests\StoreDoctorRequest;
use App\Interfaces\Doctors\DoctorRepositoryInterface;
use App\Models\Doctor;
use Illuminate\Http\Request;

class DoctorController extends Controller
{

    private $Doctors;

    public function __construct(DoctorRepositoryInterface $Doctors)
    {
        $this->Doctors = $Doctors;
    }


    public function index()
    {
        return $this->Doctors->index();
    }


    public function create(){
        return $this->Doctors->create();
    }

    public function store(StoreDoctorRequest $request)
    {
        return $this->Doctors->store($request);
    }
}