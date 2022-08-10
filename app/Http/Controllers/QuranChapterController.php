<?php

namespace App\Http\Controllers;

use App\Models\QuranChapter;
use Illuminate\Http\Request;
use Illuminate\Support\Str;

class QuranChapterController extends Controller
{
    protected $chapters;
    protected $chapter;
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $this->chapters = QuranChapter::orderBy('id','DESC')->get();
        return view('backend.quran.chapter.manage',['chapters' => $this->chapters ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('backend.quran.chapter.create');
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
            'arabic_name'         => 'required',
            'bangla_name'         => 'required',
            'english_name'        => 'required',
            'chapter_serial'      => 'required',
            'total_verse'         => 'required',
            'surah_origin'        => 'required',
        ]);
        //return Str::substr($request->english_name,0,2);
        QuranChapter::saveData($request);
        return redirect(route('chapters.index'))->with('success','Chapter create successfully');
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
    public function edit($slug)
    {
        $this->chapter = QuranChapter:: where('slug',$slug)->first();

        return view('backend.quran.chapter.create',['chapter' => $this->chapter]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $slug)
    {
       QuranChapter::updateData($request , $slug);
       return  redirect(route('chapters.index'))->with('success','Update successfully');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($slug)
    {
        $this->chapter = QuranChapter:: where('slug', $slug)->first();
        $this->chapter->delete();
        return redirect(route('chapters.index'))->with('success','delete chapter successfully');
    }
}
