<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Branch;
use Illuminate\Support\Facades\Validator;
use Response;
use Illuminate\Support\Facades\Session;


class BranchController extends Controller
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
        return view('branch', compact('branches'));
    }


    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('branch');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $messages = [
            'required' => 'Field is required.',
            'numeric' => 'Field must be number.'
        ];

        $this->validate($request, [
            'branches_name' => 'required', 
            'branches_address' => 'required', 
            'branches_phone' => 'required|numeric'], $messages);

        Branch::create($request->all());
        return redirect()->route('Branch.index')->with('success', 'create item!');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $branches = Branch::find($id);
        return view('branch', compact('branches'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $branches = Branch::find($id);
        return view('branch', compact('branches'));
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
        $id = $request->input('branches_id');
        Branch::find($id)->update($request->all());
        return redirect()->route('Branch.index')->with('success', 'update item!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $request, $id)
    {
        $id = $request->input('branches_id');
        Branch::find($id)->delete();
        return redirect()->route('Branch.index')->with('success', 'delete item!');
    }
}
