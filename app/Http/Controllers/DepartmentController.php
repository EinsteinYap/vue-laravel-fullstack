<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Department;

use Session;

class DepartmentController extends Controller
{
    // function __construct() 
    // {
    //     $this->middleware('auth:api');
    // }

    // below code is related to vue js crud

    public function getDepartments()
    {
        return response()->json(Department::latest()->get());
    }
    
    public function storeDepartment(Request $request)
    {
        $request->validate([
            'name'          => ['required']
        ]);

        Department::create([
            'user_id'           => 1,
            'name'              => $request->name,
        ]);

        return response()->json('success');
    }

    public function updateDepartment(Request $request, $id)
    {
        $request->validate([
            'name'          => ['required']
        ]);
        
        Department::where('id', $id)->update([
            'name'              => $request->name,
        ]);

        return response()->json('success');
    }
    
    public function deleteDepartment($id)
    {
        Department::where('id', $id)->delete();
        return response()->json('success');
    }



    // below code is related to laravel crud

    public function index()
    {
        $departments = Department::all();
        return view('management.departments.index', compact('departments'));
    }

    public function create()
    {
        return view('management.departments.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'name'          => ['required']
        ]);

        Department::create([
            'user_id'           => 1,
            'name'              => $request->name,
        ]);

        Session::flash('success-message', 'Department created successfully!');
        return redirect()->route('departmentsIndex');
    }

    public function edit($id)
    {
        $department = Department::find($id);
        return view('management.departments.edit', compact('department'));
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'name'          => ['required']
        ]);
        
        Department::where('id', $id)->update([
            'name'              => $request->name,
        ]);

        Session::flash('success-message', 'Department updated successfully!');
        return redirect()->route('departmentsIndex');
    }

    public function delete($id)
    {
        Department::where('id', $id)->delete();
        Session::flash('success-message', 'Department deleted successfully!');
        return redirect()->route('departmentsIndex');
    }
}
