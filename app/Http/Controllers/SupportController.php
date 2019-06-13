<?php

namespace App\Http\Controllers;

use App\Support;
use Illuminate\Http\Request;

class SupportController extends Controller
{
    public function index()
    {
        $support = Support::where('completed', '!=', 1)->where('deleted', 0)->get();
        return response()->json($support, 200);
    }

    public function create()
    {

    }

    public function store(Request $request)
    {
        $supports = Support::create($request->all());
        return response()->json($supports, 200);
    }
    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $supports = Support::where('id', $id)->first();
        return response()->json($supports, 200);
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
        $supports = Support::find($id)->delete();
        return response()->json([], 200);
    }
}
