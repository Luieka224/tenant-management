<?php

namespace App\Http\Controllers;

use App\Models\Building;
use Illuminate\Http\Request;

class BuildingController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $building = Building::paginate(10);

        return response($building, 200);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([
            'name'=> 'bail|required',
            'address' => 'required'
        ]);

        Building::create($request->all());

        return response('Success', 200);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        try {
            Building::findOrFail($id);
        } catch (\Exception $ex) {
            return response(
                [
                    'message'=>'Building ID does not exist!',
                    'exception'=>$ex->getMessage()
                ], 404);
        }

        return response(Building::find($id), 200);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Building  $building
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Building $building)
    {
        $building->update($request->all());

        return response('Successs', 200);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        try {
            Building::findOrFail($id);
        } catch (\Exception $ex) {
            return response(
                [
                    'message'=>'Building ID does not exist!',
                    'exception'=>$ex->getMessage()
                ], 404);
        }

        Building::find($id)->delete();

        return response('Success', 200);
    }
}
