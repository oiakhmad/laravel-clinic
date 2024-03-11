<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Doctor;
use Illuminate\Support\Facades\DB;

class DoctorController extends Controller
{
    //
    public function index(Request $request)
    {

        $doctors = DB::table('doctors')
            ->when($request->input('name'), function ($query, $name) {
                return $query->where('name', 'like', '%' . $name . '%');
            })
            ->orderBy('id', 'desc')
            ->paginate(10);
        return view('pages.doctors.index', [
            'type_menu' => 'doctors',
            'doctors'=>  $doctors,
        ]);
    }
     public function create(Request $request)
    {
        return view('pages.doctors.create', ['type_menu' => 'doctors']);
    }

    public function store(Request $request)
    {

        $request->validate([
            'name'=>'required',
            'specialist'=>'required',
            'email'=>'required|email',
            'sip'=>'required',
            'phone'=>'required',
          ]);

        $doctor = new Doctor();
        $doctor->name = $request->name;
        $doctor->specialist = $request->specialist;
        $doctor->email = $request->email;
        $doctor->phone = $request->phone;
        $doctor->sip = $request->sip;
        $doctor->address = $request->address;

        $doctor->save();

     return redirect()->route('doctors.index')->with('success', 'Doctor successfully created');
    }

    public function edit($id)
    {
        $doctor = Doctor::find($id);
        return view('pages.doctors.edit',compact('doctor'));
    }

    public function update(Request $request, $id)
    {
          $request->validate([
            'name'=>'required',
            'specialist'=>'required',
            'email'=>'required|email',
            'sip'=>'required',
            'phone'=>'required',
          ]);

        $doctor = Doctor::find($id);
        $doctor->name = $request->name;
        $doctor->specialist = $request->specialist;
        $doctor->email = $request->email;
        $doctor->phone = $request->phone;
        $doctor->sip = $request->sip;
        $doctor->address = $request->address;

        $doctor->save();
        return redirect()->route('doctors.index')->with('success', 'Doctor successfully updated');
    }

    public function destroy(Doctor $doctor)
    {
        $doctor->delete();
        return redirect()->route('doctors.index')->with('success', 'Doctor successfully deleted');
    }
}
