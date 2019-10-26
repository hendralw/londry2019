<?php

namespace App\Http\Controllers;

use App\Unit_Item;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class UnitItemController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $unit_items = Unit_Item::orderBy('unit_items_id', 'ASC')->get();
        return view('unit_item', compact('unit_items'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('unit_item');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        Unit_Item::create($request->all());
        return redirect()->route('Unit_Item.index')->with('success', 'item created succesfully');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $unit_items = Unit_Item::find($id);
        return view('unit_item', compact('unit_items'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $unit_items = Unit_Item::find($id);
        return view('unit_item', compact('unit_items'));
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
        $id = $request->input('unit_items_id');
        Unit_Item::find($id)->update($request->all());
        return redirect()->route('Unit_Item.index')->with('success', 'item updated succesfully');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        Unit_Item::find($id)->delete();
        return redirect()->route('Unit_Item.index')->with('success', 'Item Deleted successfully');
    }
}
