<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Employee;
use App\Role;
use App\Branch;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Session;


class EmployeeController extends Controller
{
    public function __construct()
    {
        $this->middleware(function ($request, $next) {
            if (!Session::get('login')) {
                return redirect('Login')->with('alert', 'Kamu harus login dulu');
            } else {
                return $next($request);
            }
        });
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $branches = Branch::orderBy('branches_id', 'ASC')->get();
        $roles = Role::orderBy('roles_id', 'ASC')->get();
        $employees = Employee::orderBy('employees_id', 'ASC')->get();
        return view('employee', compact('employees', 'branches', 'roles'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('employee');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        // $messages = [
        //     'required' => 'Field is required.',
        //     'numeric' => 'Field must be number.'
        // ];

        // $this->validate($request, [
        //     'branches_name' => 'required', 
        //     'branches_address' => 'required', 
        //     'branches_phone' => 'required|numeric'], $messages);

        $password = Hash::make($request->input('password'));
        Employee::create([
            'branches_id' => $request->branches_id,
            'roles_id' => $request->roles_id,
            'employees_name' => $request->employees_name,
            'employees_phone' => $request->employees_phone,
            'employees_address' => $request->employees_address,
            'employees_salary' => $request->employees_salary,
            'username' => $request->username,
            'password' => $password
        ]);

        return redirect()->route('Employee.index')->with('success', 'create item!');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $employees = Employee::find($id);
        return view('employee', compact('employees'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $employees = Employee::find($id);
        return view('employee', compact('employees'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $id = $request->input('employees_id');
        Employee::find($id)->update($request->all());
        return redirect()->route('Employee.index')->with('success', 'update item!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $request, $id)
    {
        $id = $request->input('employees_id');
        Employee::find($id)->delete();
        return redirect()->route('Employee.index')->with('success', 'delete item!');
    }
}
