<?php

namespace App\Http\Controllers;

use App\Spending;
use App\Branch;
use App\Spending_Category;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;

class SpendingController extends Controller
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
        $spendings = Spending::orderBy('spendings_id', 'ASC')->get();
        $branches = Branch::orderBy('branches_id', 'ASC')->get();
        $spending_categories = Spending_Category::orderBy('spending_categories_id', 'ASC')->get();
        return view('spending', compact('spendings', 'branches', 'spending_categories'));
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
        $id = $request->input('spendings_id');
        Spending::find($id)->update($request->all());
        return redirect()->route('Spending.index')->with('success', 'item updated succesfully');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
<<<<<<< HEAD
    public function destroy(Request $request, $id)
=======
    public function destroy(Request $request,$id)
>>>>>>> master
    {
        $id = $request->input('spendings_id');
        Spending::find($id)->delete();
        return redirect()->route('Spending.index')->with('success', 'Item Deleted successfully');
    }
}
