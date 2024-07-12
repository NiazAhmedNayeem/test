<?php

namespace App\Http\Controllers\Backend;

use App\Models\Student;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\SClass;
use Illuminate\Support\Facades\Validator;

class StudentController extends Controller
{
    public function index()
    {
        $data['classes'] = SClass::where('status', 1)->get();
        $data['students'] = Student::all();
        return view('backend.student.index', $data);
    }
    public function create()
    {
        $data['classes'] = SClass::where('status', 1)->get();
        return view('backend.student.create', $data);
    }
    public function store(Request $request)
    {
        // Define validation rules
        $validator = Validator::make($request->all(), [
            'name' => 'required|string|max:255',
            'email' => 'required|email|max:255',
            'dob' => 'required',
            'image' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
            'about' => 'required|string',
        ]);

        // Check if validation fails
        if ($validator->fails()) {
            return redirect()->back()->withErrors($validator)->withInput();
        }



        $student = new Student();
        $student->class_id = $request->class_id;
        $student->name = $request->name;
        $student->dob = $request->dob;
        $student->email = $request->email;
        $student->phone = $request->phone;
        $student->about = $request->about;

        if ($request->hasFile('image')) {
            $fileName = time() . '.' . $request->image->getClientOriginalExtension();
            $request->image->move(public_path('upload/student/'), $fileName);
            $student->image = $fileName;
        }    

        $student->save();

        return redirect()->back()->with('message', 'Student create successfully, Thank you.');
    }

    public function edit($id)
    {
        $data['classes'] = SClass::where('status', 1)->get();   
        $data['student'] = Student::find($id);
        return view('backend.student.update', $data);
    }

    public function update(Request $request, $id)
    {
        // Define validation rules
        $validator = Validator::make($request->all(), [
            'name' => 'required|string|max:255',
            'email' => 'required|email|max:255',
            'dob' => 'required',
            // 'image' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
            'about' => 'required|string',
        ]);

        // Check if validation fails
        if ($validator->fails()) {
            return redirect()->back()->withErrors($validator)->withInput();
        }



        $student = Student::find($id);
        $student->class_id = $request->class_id;
        $student->name = $request->name;
        $student->dob = $request->dob;
        $student->email = $request->email;
        $student->phone = $request->phone;
        $student->about = $request->about;

        if ($request->hasFile('image')) {
            @unlink(public_path('/upload/student/'. $student->image));
            $fileName = time() . '.' . $request->image->getClientOriginalExtension();
            $request->image->move(public_path('upload/student/'), $fileName);
            $student->image = $fileName;
        }   

        $student->save();

        return redirect()->route('admin.student.index')->with('message', 'Student info update successfully, Thank you.');
    }

    public function delete($id)
    {
        $student = Student::find($id);
        @unlink(public_path('upload/student/'. $student->image));
        $student->delete();
        return redirect()->back()->with('message', 'Student delete successfully. Thank you.');
    }
}
