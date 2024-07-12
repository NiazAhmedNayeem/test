<?php

namespace App\Http\Controllers\Backend\Api;

use App\Models\Student;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Auth\Events\Validated;
use Illuminate\Support\Facades\Validator;

class StudentController extends Controller
{
    public function index()
    {
        $students = Student::all();

        if($students->count() > 0){
            return response()->json([
                'status' => 200,
                'students' => $students,
            ], 200);
        }else{
            return response()->json([
                'status' => 202,
                'students' => 'No record found',
            ], 202);
        }
        
    }

    public function store(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'name' => 'required|string|max:225',
            'class_id' => 'required|string|max:225',
            'email' => 'required|email|max:225',
            'phone' => 'required|string|max:225',
            // 'image' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
            'about' => 'required|string|max:225'
        ]);

        if($validator->fails()){
            return response()->json([
                'status' => 422,
                'errors' => $validator->messages(),
            ], 422);
        }else{
            $student = Student::create([
                'name' => $request->name,
                'class_id' => $request->class_id,
                'email' => $request->email,
                'phone' => $request->phone,
                'about' => $request->about,
            ]);

            if($student){
                return response()->json([
                    'status' => 200,
                    'message' => 'Student create successfully, Thank you.',
                ], 200);
            }else{
                return response()->json([
                    'status' => 500,
                    'message' => 'Something went wrong',
                ], 500);
            }
        }
    }
}
