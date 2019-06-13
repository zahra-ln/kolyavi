<?php
namespace App\Http\Controllers;
use App\Patient;
use Illuminate\Http\Request;
class RecordController extends Controller
{
    public function index(Request $request)
    {
        $patients = Patient::all();
        if($request -> q){
            $patients=$patients ->where('id','LIKE','%'.$request->q,'%');
        }
        return response()->json($patients, 200);
    }
    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(Request $request,$id)
    {
        $patient = Patient::where('id', $id);
        return view("layouts/controller-edit.blade.php");
    }

    public function store(Request $request)
    {
        $patients = Patient::create($request->all());
        return response()->json($patients, 200);
    }
    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $patient = Patient::find($id);
        if(!$patient){
            return response()->json(['message'=>'Not found'],404);

        }
        return response()->json($patient, 200);
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
        $patient = Patient::find($id);
        $patient->name =$request->name ;
        $patient -> save();
        return response()->json(['message'=>'saved successfully'], 200);

    }
    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $patients = Patient::find($id)->delete();
        if(!$patients){
            return response()->json(['message'=>'Not found'],404);
        }
        return response()->json(['message'=>'deleted successfully'], 200);
    }
}
