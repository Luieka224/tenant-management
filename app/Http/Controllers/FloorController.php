<?php

namespace App\Http\Controllers;

use App\Models\Floor;
use Illuminate\Http\Request;

class FloorController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $floor = Floor::paginate(10);

        return response($floor, 200);
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
            'building_id' => 'bail|required',
            'number' => 'required'
        ]);

        Floor::create($request->all());

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
            Floor::findOrFail($id);
        } catch (\Exception $ex) {
            return response(
                [
                    'message'=>'Floor ID does not exist!',
                    'exception'=>$ex->getMessage()
                ], 404);
        }

        return response(Floor::findOrFail($id), 200);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Floor  $floor
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Floor $floor)
    {
        $floor->update($request->all());

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
            Floor::findOrFail($id);
        } catch (\Exception $ex) {
            return response(
                [
                    'message'=>'Floor ID does not exist!',
                    'exception'=>$ex->getMessage()
                ], 404);
        }

        Floor::find($id)->delete();

        return response('Success', 200);
    }
}