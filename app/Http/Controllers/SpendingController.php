<?php

namespace App\Http\Controllers;

use App\Spending;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class SpendingController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $spendings = Spending::orderBy('spendings_id', 'ASC')->get();
        return view('spending', compact('spendings'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('spending');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        Spending::create($request->all());
        return redirect()->route('Spending.index')->with('success', 'item created succesfully');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $spendings = Spending::find($id);
        return view('spending', compact('spendings'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $spendings = Spending::find($id);
        return view('spending', compact('spendings'));
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
        Spending::find($id)->update($request->all());
        return redirect()->route('Spending.index')->with('success', 'item updated succesfully');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        Spending::find($id)->delete();
        return redirect()->route('Spending.index')->with('success', 'Item Deleted successfully');
    }
}
