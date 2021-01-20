<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\College;
use App\Models\Classes;

class ClassController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $class = Classes::with(['college'])->paginate(5);
        return view('class.index',compact('class'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $college =College::all();
        return view('class.create',compact('college'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {

        $request->validate([
            'title' => 'required',
            'price' => 'required',
            'email' => 'required|email',
            'contact_number' => 'required|numeric|min:10',
            'levels' => 'required',
            'description' => 'required',
            'syllabus'=>'required|mimes:pdf,doc|max:8000'
        ]);

        $class = new Classes;
        $class->college_id = $request->college;
        $class->title = $request->title;
        $class->contact_number = $request->contact_number;
        $class->email = $request->email;
        $class->price = $request->price;
        $class->levels = $request->levels;
        $class->description = $request->description;
        if($request->file('syllabus') != null){
        $newImageName="";
        $folderPath = 'syllabus/';
        $file=$request->file('syllabus');
        $newImageName = rand().'_'.$file->getClientOriginalName();
        $file->move($folderPath, $newImageName);
        $class->syllabus = $newImageName;
        }
        $class->save();
        return redirect('/')->with('message','Successfully created class.');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $college =College::all();
        $class = Classes::find($id);
        return view('class.edit',compact('college','class'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $request->validate([
            'title' => 'required',
            'price' => 'required',
            'email' => 'required|email',
            'contact_number' => 'required|numeric|min:10',
            'levels' => 'required',
            'description' => 'required',
            'syllabus'=>'mimes:pdf,txt|max:8000'
        ]);
        $class = Classes::find($id);
        $class->college_id = $request->college;
        $class->title = $request->title;
        $class->contact_number = $request->contact_number;
        $class->email = $request->email;
        $class->price = $request->price;
        $class->levels = $request->levels;
        $class->description = $request->description;
        if($request->file('syllabus') != null){
        $newImageName="";
        $folderPath = 'syllabus/';
        $file=$request->file('syllabus');
        $newImageName = rand().'_'.$file->getClientOriginalName();
        $file->move($folderPath, $newImageName);
        $class->syllabus = $newImageName;
        }
        $class->save();
        return redirect('/')->with('message','Successfully created class.');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $class = Classes::find($id);
        $class->delete();
        return redirect('/')->with('message','Record deleted Successfully.');
    }

    public function syllabusDownload(Request $request)
    {
       $class = Classes::where('id', $request->class_id)->firstOrFail();
       $path = public_path(). '/syllabus/'. $class->syllabus;
       return response()->download($path, $class
                ->original_filename, ['Content-Type' => $class->mime]);
    }
}
