<?php

namespace App\Http\Controllers;

use App\Models\Employee;
use Illuminate\Http\Request;
use App\Models\Employee_2;
use Illuminate\Support\Facades\Redirect;

class EmployeeController_2 extends Controller
{
    //
    public function show($id = null)
    {
        /* if ($id) {
            $employee = Employee::where('id', $id)->first();
        } else {
            $employee = null;
        } */

        return view('employee_2', ['employee' => $id ? Employee::where('id', $id)->first() : null]);
    }

    public function store(Request $request)
    {
        /* var_dump($request->all()); */
        $employee = new Employee_2($request->all());
        /* $employee->first_name = $request->input('first_name');
        $employee->last_name = $request->input('last_name');
        $employee->department = $request->input('department'); */

        $employee->department = serialize($request->input('department'));


        $employee->save();

        return Redirect::route('show_employee', ['id' => $employee->id]);
    }
}
