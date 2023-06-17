<?php

namespace App\Http\Controllers;

use App\Models\Student;
use Illuminate\Http\Request;

class StudentController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //Running the Select query through the model in Laravel
        $students = Student::all();
        return view('home', ['students' => $students]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'stud_name' => 'required',
            'stud_city' => 'required',
            'stud_contact' => 'required',
            'stud_image' => 'required|image|mimes:jpeg,jpg,png,svg,gif|max:2048',
        ]);
        //Running the Insert query through the model in Laravel
        $students = new Student;
        $students->stud_name = $request->stud_name;
        $students->stud_city = $request->stud_city;
        $students->stud_contact = $request->stud_contact;
        $imageName = time() . '.' . $request->stud_image->extension();
        $students->stud_image = $request->stud_image->move(public_path('Images'), $imageName);      

        $students->save();
        return redirect('student')->withSuccess('Data Inserted Successfully');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $students = Student::find($id);
        // echo "<pre>";
        // print_r($students);
        // "</pre>";
        return view('edit',['student' => $students]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        // echo $id;
        // print_r($request->all());
        // $request->validate([
        //     'stud_name' => 'required',
        //     'stud_city' => 'required',
        //     'stud_contact' => 'required',
        //     'stud_image' => 'required|image|mimes:jpeg,jpg,png,svg,gif|max:2048',
        // ]);
        // //Running the Update query through the model in Laravel
        if (isset($request->image)) {
            $imageName = time() . '.' . $request->image->extension();
            $request->image->move(public_path('Images'), $imageName);
            $img = "Images/" . $request->hiddenimg;
            if (file_exists(public_path($img))) {
                unlink(public_path($img));
            }
        } else {
            $imageName = $request->hiddenimg;
        }

        $students = Student::find($id);
        $students->stud_name = $request->name;
        $students->stud_city = $request->city;
        $students->stud_contact = $request->contact;
        $students->stud_image = $imageName;

        $students->save();
        return redirect('student')->withSuccess('Data Updated Successfully'); 
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //Running the Delete query through the model in Laravel
        Student::find($id)->delete();
        return redirect('student')->with('Data Deleted Successfully');
    }
    public function aboutus()
    {
        return view('aboutus');
    }
    public function contactus()
    {
        return view('contactus');
    }
    public function gallery()
    {
        return view('gallery');
    }
}
