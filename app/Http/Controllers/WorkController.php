<?php

namespace LaraDex\Http\Controllers;

use LaraDex\Work;
use LaraDex\Student;
use Illuminate\Http\Request;

class WorkController extends Controller
{
    public function index(Request $request){
        if($request->ajax()){
            $works = Work::all();
            return response()->json($works, 200);
            //200 = status or error that produces check it in the vue and laravel pages
            /*return response()->json([
                ['id' => 1, 'name' => 'First Laravel HW'],
                ['id' => 2, 'name' => 'Second Laravel HW'],
                ['id' => 3, 'name' => 'Third Laravel HW']
            ], 200);*/
        }
        return view('works.index');
    }

    public function store(Student $student, Request $request){
        if($request->ajax()){
            $work = new Work();
            $work->name = $request->input('name');
            $work->picture = $request->input('picture');
            $work->student()->associate($student)->save();
            //$work->save();

            return response()->json([
                //"student" => $student,
                "message" => "Work created successfully.",
                "work" => $work
            ], 200);
        }
    }
}
