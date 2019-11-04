<?php

namespace App\Http\Controllers;
use App\Employee;
use App\Item_Category;
use Illuminate\Http\Request;

class UniqeCheckController extends Controller
{

    public function checkEmployee(Request $request)
    {
        if ($request->get('username')) {
            $user = Employee::all()->where('username', $request->get('username'))->first();
            if ($user) {
                echo 'not_unique';
            } else {
                echo 'unique';
            }
        }
    }
    public function checkItemCategory(Request $request)
    {
        if ($request->get('item_categories_name')) {
            $user = Item_Category::all()->where('item_categories_name', $request->get('item_categories_name'))->first();
            if ($user) {
                echo 'not_unique';
            } else {
                echo 'unique';
            }
        }
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
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
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
