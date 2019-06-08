<?php

namespace LaraDex\Http\Controllers;

use Illuminate\Http\Request;

class WorkController extends Controller
{
    public function index(Request $request){
        if($request->ajax()){
            return response()->json([
                ['id' => 1, 'name' => 'First Laravel HW'],
                ['id' => 2, 'name' => 'Second Laravel HW'],
                ['id' => 3, 'name' => 'Third Laravel HW']
            ]);
        }
        return view('works.index');
    }
}
