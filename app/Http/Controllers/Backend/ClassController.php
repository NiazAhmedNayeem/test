<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Models\SClass;
use Illuminate\Http\Request;

class ClassController extends Controller
{
    public function index()
    {
        $data['classes'] = SClass::all();
        return view('backend.class.index', $data);
    }
    public function create()
    {
        return view('backend.class.create');
    }
    public function store(Request $request)
    {
        $class = new SClass();
        $class->name = $request->name;
        $class->about = $request->about;

        if ($request->hasFile('image')) {
            $fileName = time() . '.' . $request->image->getClientOriginalExtension();
            $request->image->move(public_path('upload/class/'), $fileName);
            $class->image = $fileName;
        }

        $class->save();
        return redirect()->route('admin.class.index')->with('message', 'Class create successfully, Thank you.');
    }
    public function edit($id)
    {
        $data['class'] = SClass::find($id);
        return view('backend.class.update', $data);
    }
    public function update(Request $request, $id)
    {
        $class = SClass::find($id);
        $class->name = $request->name;
        $class->about = $request->about;
        if ($request->hasFile('image')) {
            @unlink(public_path('upload/class/'. $class->image));
            $fileName = time() . '.' . $request->image->getClientOriginalExtension();
            $request->image->move(public_path('upload/class/'), $fileName);
            $class->image = $fileName;
        }
        $class->save();
        return redirect()->route('admin.class.index')->with('message', 'Class create successfully, Thank you.');
    }
    public function delete($id)
    {
        $class = SClass::find($id);
        @unlink(public_path('upload/class/'. $class->image));
        $class->delete();
        return redirect()->back()->with('message', 'Class Delete successfully.');

    }
}
