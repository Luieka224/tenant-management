<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;

class UserController extends Controller
{
    public function index(Request $request)
    {
        return $request->user();
    }

    public function getMyRooms()
    {
        $rooms = User::find(auth()->user()->id);

        return $rooms->rooms;
    }
}