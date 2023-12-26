<?php

namespace App\Http\Controllers\Api;

use App\Models\Task;
use App\Models\User;
use App\Models\Student;
use Illuminate\Http\Request;
use PhpParser\Node\Stmt\TryCatch;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Validator;

class UserController extends Controller
{
    /**
     * Store a newly created resource in storage.
     */
    public function insert(Request $request)
    {
        $validated = $request->validate([
            'title' => 'required',
            'description' => 'required',
        ]);

        if (!$validated) {
            return response()->json(['message' => 'Validation failed'], 422);
        }

        $save = new Task();
        $save->title = $request->input('title');
        $save->description = $request->input('description');
        $save->save();

        return response()->json(['message' => 'Data entered successfully'], 201);
    }

    /**
     * Display the specified resource.
     */
    public function show()
    {
        $student = Task::all();
        return response()->json($student);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $student = Task::find($id);
        return response()->json($student);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $student = Task::find($id);
        $student->title = $request->input('title');
        $student->description = $request->input('description');
        $student->save();
        return response()->json(['Data updated Successfully']);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        Task::destroy($id);
        return response()->json('Data deleted Successfully');
    }
    public function search($id)
    {
        $student = Task::where('id', $id)->get();
        return response()->json($student);
    }
    public function logout()
    {
        auth()->user()->tokens()->delete();
        return response([
            'message' => 'User deleted successfully!',
        ]);
    }
    public function login(Request $request)
    {
        $request->validate([
            'email' => 'required',
            'password' => 'required',
        ]);
        $user = User::where('email', $request->email)->first();
        if (!$user)
            return response([
                'message' => 'login credentials are invalid!'
            ], 401);
        $token = $user->createToken('mytoken')->plainTextToken;
        return response([
            'user' => $user,
            'token' => $token
        ], 201);
    }
}
