<?php

namespace App\Http\Controllers\API;

use App\User;
use App\Http\Controllers\Controller;
use App\UserType;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $users = User::all();
        return response()->json($users, 200);
    }
    
    /**
     * Display a listing of the resource.
     * @param int $page
     * @param int $size
     * @return \Illuminate\Http\Response
     */
    public function getAllPaginate(Request $request, $size)
    {
        $users = DB::table('users')->paginate($size);
        
        return response()->json($users, 200);
    }
    
    
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        return response()->json(User::where('id', $id)->get());
    }
    
    /**
     * Store a newly created resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $name = $request->name;
        $email = $request->email;
        $yaExisteUsuario = DB::table('users')->where('name', '=', $name)->orWhere('email', '=', $email)->count();
        
        if ($yaExisteUsuario > 0) {
            return response()->json(array("message" => "El usuario o email ya existen "), 400);
        }
        
        $user = new User();
        $user->name = $request->name;
        $user->email = $request->email;
        $user->password = $request->password;
        
        $aRoleAllowed = array("ROLE_STUDENT" => UserType::ROLE_STUDENT, "ROLE_TEACHER" => UserType::ROLE_TEACHER,);
        if (is_null($request->role) || $request->role == "" || !in_array($request->role, $aRoleAllowed)) {
            $user->role = UserType::ROLE_STUDENT;
        } else {
            $user->role = $request->role;
        }
        
        $user->save();
        return response()->json($user, 201);
    }
    
    
    /**
     * Update the specified resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, User $user)
    {
        $input = $request->all();
        
        $user->name = $input['name'];
        $user->email = $input['email'];
        $user->password = $input['password'];
        $user->role = $input['role'];
        
        $user->save();
        
        return response()->json($user, 200);
        
    }
    
    /**
     * Remove the specified resource from storage.
     *
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
