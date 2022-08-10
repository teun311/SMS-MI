<?php

namespace App\Http\Controllers;

use App\Models\M_Section;
use Illuminate\Http\Request;

class MSectionController extends Controller
{
    protected $sections;
    protected $section;
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $this->sections = M_Section::OrderBy('id','asc')->get();
        return view('backend.section.manage',['sections' =>$this->sections]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('backend.section.form');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        M_Section::saveData($request);
        return redirect(route('m_section.index'))->with('success','Section create successfully');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\M_Section  $m_Section
     * @return \Illuminate\Http\Response
     */
    public function show(M_Section $m_Section)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\M_Section  $m_Section
     * @return \Illuminate\Http\Response
     */
    public function edit( $m_Section)
    {
        $this->section = M_Section::where('slug',$m_Section)->first();
        return view('backend.section.form',['section'=>$this->section]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\M_Section  $m_Section
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $m_Section)
    {
        M_Section::updateDate($request, $m_Section);
        return redirect(route('m_section.index'))->with('success','row update successfully');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\M_Section  $m_Section
     * @return \Illuminate\Http\Response
     */
    public function destroy( $m_Section)
    {
        $this->section = M_Section::where('slug',$m_Section)->first();
        $this->section->delete();
        return redirect(route('m_section.index'))->with('success','row delete successfully ');

    }
}
