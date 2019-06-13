<?php

namespace LaraDex\Http\Controllers;

use LaraDex\Student;

use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use Illuminate\Support\Facaes\Storage;
use LaraDex\Http\Requests\StoreStudentRequest;

class StudentController extends Controller
{

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        if(Auth::guest()){

            abort(401, 'Please login, to view the students');

        }else{
            $request->user()->authorizeRoles(['admin', 'user']);
            $students = Student::all();

            return view('students.index', compact('students'));
        }


    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('students.create');

    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreStudentRequest $request)
    {
        /** ------------------------------------------------------
         *  StoreStudentRequest.php
         *  Will be in charge of Students moel validations.
         *  --------------------------------------------------------
         *  $validatedData = $request->validate([
         *  'name' => 'required|max: 30',
         *  'slug' => 'required|unique:students|max: 30',
         *  'description' => 'required|max: 1000',
         *  'avatar' => 'required|image'
         *  ]);
         * */

        $student = new Student();

        if($request->hasFile('avatar')){
            $file = $request->file('avatar');
            $name = time().$file->getClientOriginalName();
            $student->avatar = $name;
            $file->move(public_path().'/images/', $name);
        }

        $student->name = $request->input('name');
        $student->slug = $request->input('slug');
        $student->description = $request->input('description');
        $student->save();


        return redirect()->route('students.index');


        //return 'Saved';
        //return $request->all();
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */

    /** WITHOUT IMPLICIT BINDING BY ID
     * public function show($id)
     * {
     * $student = Student::find($id);
     */

    /**WITH IMPLICIT BINDING BY ID
     * public function show(Student $student)
     * {
     */

    /**
     * public function show($slug){
     * $student = Student::where('slug', '=', $slug
     * ->firstOrFail();
     */


    public function show(Student $student)
    {
        return view('students.show', compact('student'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(Student $student)
    {
        //return $student;
        return view('students.edit', compact('student'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(StoreStudentRequest $request, Student $student)
    {
        /** ------------------------------------------------------
         *  StoreStudentRequest.php
         *  Will be in charge of Students moel validations.
         *  --------------------------------------------------------
         *  $validatedData = $request->validate([
         *  'name' => 'required|max: 30',
         *  'slug' => 'required|unique:students|max: 30',
         *  'description' => 'required|max: 1000',
         *  'avatar' => 'required|image'
         *  ]);
         * */
        //Save the original avatar to posterior deletion if new avatar exists
        $original_student_avatar = $student->avatar;

        $student->fill($request->all());

        if($request->hasFile('avatar')){
            //Delete original avatar
            $file_path = public_path().'/images/'.$original_student_avatar;
            \File::delete($file_path);

            $file = $request->file('avatar');
            $name = time().$file->getClientOriginalName();
            $student->avatar = $name;
            $file->move(public_path().'/images/', $name);

        }

        $student->save();

        return redirect()->route('students.show', [$student])->with('status', 'Student successfully updated.');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Student $student)
    {
        $file_path = public_path().'/images/'.$student->avatar;
        \File::delete($file_path);

        $student->delete();
        return redirect()->route('students.index');
    }
}
