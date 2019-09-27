<?php

namespace App\Http\Controllers\API;

use App\Evaluations;
use App\Http\Controllers\Controller;
use App\User;
use App\UserType;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class EvaluationController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $evaluations = Evaluations::all();
        return response()->json($evaluations, 200);
    }
    
    /**
     * Display a listing of the resource.
     * @param int $page
     * @param int $size
     * @return \Illuminate\Http\Response
     */
    public function getAllPaginate(Request $request, $size)
    {
        $evaluations = DB::table('evaluations')->paginate($size);
        
        return response()->json($evaluations, 200);
    }
    
    
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        return response()->json(Evaluations::where('id', $id)->get());
    }
    
    /**
     * Store a newly created resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $teacher = $request->teacher;
        $student = $request->student;
        
        $evaluation = new Evaluations();
        $evaluation->score = $request->score;
        $evaluation->students()->save($student);
        $evaluation->teachers()->save($teacher);
    
        $evaluation->save();
        return response()->json($evaluation, 201);
    }
    
    
    /**
     * Update the specified resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Evaluations $evaluations)
    {
        $user = [];
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
