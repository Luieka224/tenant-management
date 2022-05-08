<?php

namespace App\Http\Controllers;

use App\Models\Room;
use Illuminate\Http\Request;

class RoomController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $rooms = Room::paginate(10);

        return response($rooms, 200);
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
            'floor_id' => 'bail|required|integer',
            'user_id' => 'integer',
            'room_type_id' => 'integer',
            'number' => 'required|integer',
            'no_of_bed' => 'required|integer',
            'price' => 'required|gte:0',
            'is_available' => 'required|boolean',
        ]);

        Room::create($request->all());

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
            Room::findOrFail($id);
        } catch (\Exception $ex) {
            return response(
                [
                    'message'=>'Room ID does not exist!',
                    'exception'=>$ex->getMessage()
                ], 404);
        }

        return response(Room::findOrFail($id), 200);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Room  $room
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Room $room)
    {
        $room->update($request->all());

        return response('Successs', 200);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        try {
            Room::findOrFail($id);
        } catch (\Exception $ex) {
            return response(
                [
                    'message'=>'Room ID does not exist!',
                    'exception'=>$ex->getMessage()
                ], 404);
        }

        Room::find($id)->delete();

        return response('Success', 200);
    }
}
