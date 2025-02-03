<?php

namespace App\Interfaces\Doctors;
use App\Http\Requests\StoreDoctorRequest;
use Illuminate\Http\Request;

interface DoctorRepositoryInterface
{
    // get Doctor
    public function index();

    // create Doctor
    public function create();

    // store Doctor
    public function store(StoreDoctorRequest $request);

    // update Doctor
    public function update($request);

    // destroy Doctor
    public function destroy($request);

    public function edit($id);

    public function update_password(Request $request);


    public function update_status(Request $request);


    
}