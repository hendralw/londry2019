<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Duration;
use Illuminate\Support\Facades\Validator;
use Response;

class DurationController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $durations = Duration::orderBy('durations_id', 'ASC')->get();
        return view('duration', compact('durations'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('duration');
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
        ];

        $this->validate($request, [
            'durations_name' => 'required',
        ], $messages);

        Duration::create($request->all());
        return redirect()->route('Duration.index')->with('success', 'create item!');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $durations = Duration::find($id);
        return view('duration', compact('durations'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $durations = Duration::find($id);
        return view('duration', compact('durations'));
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
        $id = $request->input('durations_id');
        Duration::find($id)->update($request->all());
        return redirect()->route('Duration.index')->with('success', 'update item!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        Duration::find($id)->delete();
        return redirect()->route('Duration.index')->with('success', 'delete item!');
    }
}
