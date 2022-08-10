<?php

namespace App\Http\Controllers;

use App\Models\M_Class;
use App\Models\Subject;
use Illuminate\Http\Request;

class SubjectController extends Controller
{
    protected $classes;
    protected $subjects;
    protected $subject;
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $this->subjects = Subject::OrderBy('id','asc')->get();
        return view('backend.subject.manage',['subjects'=>$this->subjects]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $this->classes = M_Class::OrderBy('id','asc')->get();
        return view('backend.subject.form',['classes'=>$this->classes]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        Subject::saveData($request);
        return redirect(route('subjects.index'))->with('success','subject update successsfully');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Subject  $subject
     * @return \Illuminate\Http\Response
     */
    public function show(Subject $subject)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Subject  $subject
     * @return \Illuminate\Http\Response
     */
    public function edit( $subject)
    {
        $this->subject = Subject::where('slug',$subject)->first();
        return view('backend.subject.form',['subject'=>$this->subject,
            'classes'=> M_Class::all()]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Subject  $subject
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $subject)
    {
        Subject::uppdateData($request, $subject);
        return redirect(route('subjects.index'))->with('success','Update info successfully');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Subject  $subject
     * @return \Illuminate\Http\Response
     */
    public function destroy( $subject)
    {
        $this->subject = Subject::find($subject);
        if (file_exists($this->subject->sub_book_img))
        {
            unlink($this->subject->sub_book_img);
        }
        $this->subject->delete();
        return redirect()->back()->with('success','class row delete successfully');

    }
}
