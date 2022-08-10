<?php

namespace App\Http\Controllers;

use App\Models\QuranChapter;
use App\Models\QuranVerse;
use Illuminate\Http\Request;

class QuranVerseController extends Controller
{
    protected $verses;
    protected $verse;
    protected $chapters;
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $this->verses = QuranVerse:: orderBy('id','DESC')->get();
        return view('backend.quran.verse.manage',['verses' => $this->verses]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $this->chapters = QuranChapter:: orderBy('id','DESC')->get();
        return view('backend.quran.verse.create',['chapters' => $this->chapters]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        QuranVerse::saveData($request);
        return redirect(route('verses.index'))->with('success','verse insert successfully');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $this->verse = QuranVerse:: where('slug',$id)->first();
        return view('backend.quran.verse.detail' ,[ 'verse' => $this->verse]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($slug)
    {
        $this->verse = QuranVerse:: where('slug', $slug)->first();
        return view('backend.quran.verse.create',[
            'verse'     => $this->verse ,
            'chapters' => QuranChapter:: orderBy('id','DESC')->get()
        ]);
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
        QuranVerse::updateData($request , $slug);
        return redirect(route('verses.index'))->with('success','verse update successfully');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($slug)
    {
        $this->verse = QuranVerse::where('slug',$slug)->first();
        if (file_exists($this->verse->audio))
        {
            unlink($this->verse->audio);
        }
        $this->verse->delete();
        return redirect(route('verses.index'))->with('success','Delete row successfully');
    }
}
