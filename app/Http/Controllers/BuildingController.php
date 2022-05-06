<?php

namespace App\Http\Controllers;

use App\Models\Building;
use Illuminate\Http\Request;
use Illuminate\Database\QueryException;
use Exception;

class BuildingController extends Controller
{
    public function create(Request $req) {

        $req->validate([
            'name' => 'required',
            'address' => 'required',
        ]);

        $building = new Building();

        $building->name = $req->name;
        $building->address = $req->address;

        $building->save();

        return response('Success', 200);
    }

    public function read() {
        $building = Building::paginate(10);
        
        return response($building, 200);
    }

    public function update(Request $req, $id) {
        try {
            $building = Building::find($id);
        } catch(\Throwable $ex) {
            return response($ex->getMessage, 400);
        }
        
        $building->update($req->all());

        return response('Success', 200);
    }

    public function delete($id) {
        try {
            $building = Building::find($id);
            $building->delete();
        } catch(Exception $ex) {
            return response('Invalid request', 400);
        }      

        return response('Success', 200);
    }
}