<?php

namespace App\Http\Controllers;

use App\Spending_Category;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class SpendingCategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $spending_categories = Spending_Category::orderBy('spending_categories_id', 'ASC')->get();
        return view('spending_category', compact('spending_categories'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('spending_category');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        Spending_Category::create($request->all());
        return redirect()->route('Spending_Category.index')->with('success', 'item created succesfully');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $spending_categories = Spending_Category::find($id);
        return view('spending_category', compact('spending_categories'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $spending_categories = Spending_Category::find($id);
        return view('spending_category', compact('spending_categories'));
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
        Spending_Category::find($id)->update($request->all());
        return redirect()->route('Spending_Category.index')->with('success', 'item updated succesfully');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        Spending_Category::find($id)->delete();
        return redirect()->route('Spending_Category.index')->with('success', 'Item Deleted successfully');
    }
}
