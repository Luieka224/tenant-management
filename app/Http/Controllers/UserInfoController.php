<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\UserInfo;

class UserInfoController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return UserInfo::all();
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $validated = $request->validate([
            'user_id' => 'integer|unique:user_infos,user_id|required',
            'last_name' => 'string|max:255|required',
            'first_name' => 'string|max:255|required',
            'middle_name' => 'string|max:255|nullable',
            'balance' => 'numeric|nullable',
            'last_paid' => 'date|nullable'
        ]);

        return UserInfo::create($validated);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\UserInfo $userInfo
     * @return \Illuminate\Http\Response
     */
    public function show(UserInfo $userInfo)
    {
        return $userInfo;
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\UserInfo $userInfo
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, UserInfo $userInfo)
    {
        $validated = $request->validate([
            'last_name' => 'string|max:255|nullable',
            'first_name' => 'string|max:255|nullable',
            'middle_name' => 'string|max:255|nullable',
            'balance' => 'numeric|nullable',
            'last_paid' => 'date|nullable'
        ]);

        return $userInfo->update($validated);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\UserInfo $userInfo
     * @return \Illuminate\Http\Response
     */
    public function destroy(UserInfo $userInfo)
    {
        return abort(403);
    }
}
