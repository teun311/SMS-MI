<?php

namespace App\Http\Controllers;

use App\Models\M_Class;
use Illuminate\Http\Request;

class MClassController extends Controller
{
    protected $classes;
    protected $clas;

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $this->classes = M_Class::OrderBy('id','asc')->get();
        return view('backend.class.manage',['classes'=> $this->classes]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('backend.class.form');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        M_Class::saveData($request);
        return redirect(route('m_class.index'))->with('success','Class Create Successfully');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\M_Class  $m_Class
     * @return \Illuminate\Http\Response
     */
    public function show(M_Class $m_Class)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\M_Class  $m_Class
     * @return \Illuminate\Http\Response
     */
    public function edit($m_Class)
    {
        $this->clas = M_Class::where('slug',$m_Class)->first();
        return view('backend.class.form',['cls'=> $this->clas]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\M_Class  $m_Class
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $m_Class)
    {
        M_Class::updateData($request, $m_Class);
        return redirect(route('m_class.index'))->with('success','row Edit successfully');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\M_Class  $m_Class
     * @return \Illuminate\Http\Response
     */
    public function destroy( $m_Class)
    {
        $this->clas = M_Class::where('slug',$m_Class)->first();
        $this->clas->delete();
        return redirect()->back()->with('success','class row delete successfully');

    }
}
