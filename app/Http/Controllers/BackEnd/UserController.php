<?php

namespace App\Http\Controllers\BackEnd;

use App\Http\Controllers\Controller;
use App\Http\Requests\UpdateUserRequest;
use App\Http\Requests\UserRequest;
use App\Models\User;
use Illuminate\Http\Request;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
        return view('backend.user.index', [
            'users' => User::latest()->paginate(5)
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(UserRequest $request)
    {
        //
        $data = $request->validated();

        User::create($data);

        return back()->with('success', 'User Has Been Registered...');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateUserRequest $request, string $id)
    {
        //
        $data = $request->validated();

        // check if password filled
        if($data['password'] != "") {
            $data["password"] = bcrypt($data["password"]);
            User::find($id)->update($data);
        } else {
            User::find($id)->update([
                'name' => $request->name,
                'email' => $request->email
            ]);
        }

        

        return back()->with('success', 'User Has Been Updated...');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
        User::find($id)->delete();

        return back()->with('success', 'User Has Been Deleted...');
    }
}
