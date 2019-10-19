<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\List_Item;
use Illuminate\Http\Request;

class ListItemController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $list_items = List_Item::orderBy('list_items_id', 'ASC')->get();
        return view('item', compact('list_items'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('item');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        List_Item::create($request->all());
        return redirect()->route('List_Item.index')->with('success', 'item created succesfully');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\List_Item  $list_Item
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $list_items = List_Item::find($id);
        return view('item', compact('list_items'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\List_Item  $list_Item
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $list_items = List_Item::find($id);
        return view('item', compact('list_items'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\List_Item  $list_Item
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        List_Item::find($id)->update($request->all());
        return redirect()->route('List_Item.index')->with('success', 'item updated succesfully');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\List_Item  $list_Item
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        List_Item::find($id)->delete();
        return redirect()->route('List_Item.index')->with('success', 'Item Deleted successfully');
    }
}
