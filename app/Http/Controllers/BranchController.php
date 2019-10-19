<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Branch;

class BranchController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        // $query = $request->get('query');
        // $query = str_replace(" ", "%", $query);
        // $branches = Branch::where('branches_id', 'like', '%' . $query . '%')
        //     ->orWhere('branches_name', 'like', '%' . $query . '%')
        //     ->orWhere('branches_address', 'like', '%' . $query . '%')
        //     ->orWhere('branches_phone', 'like', '%' . $query . '%')
        //     ->paginate(1);
        // if ($request->ajax()) {

        //     return view('searchb', compact('branches'))->render();
        // } else {
        $branches = Branch::orderBy('branches_id', 'ASC')->get();
        return view('branch', compact('branches'));
        // }
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
        Branch::create($request->all());
        return redirect()->route('Branch.index')->with('success', 'item created succesfully');
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
        return redirect()->route('Branch.index')->with('success', 'item updated succesfully');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        Branch::find($id)->delete();
        return redirect()->route('Branch.index')->with('success', 'Item Deleted successfully');
    }
}
