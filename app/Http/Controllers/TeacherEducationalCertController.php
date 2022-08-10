<?php

namespace App\Http\Controllers;

use App\Models\TeacherEducationalCert;
use Illuminate\Http\Request;

class TeacherEducationalCertController extends Controller
{
    protected $teacherFiles;
    protected $teacherFile;
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {

    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\TeacherEducationalCert  $teacherEducationalCert
     * @return \Illuminate\Http\Response
     */
    public function show( $teacherId)
    {

        $this->teacherFiles =TeacherEducationalCert::where('teacher_id',$teacherId)->get();
      //  return $this->teacherFiles;
        return view('backend.teacherFile.manage',[ 'teacherCerts' => $this->teacherFiles ,'teacherId'=>$teacherId]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\TeacherEducationalCert  $teacherEducationalCert
     * @return \Illuminate\Http\Response
     */
    public function edit(TeacherEducationalCert $teacherEducationalCert)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\TeacherEducationalCert  $teacherEducationalCert
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request,  $teacherId)
    {
        if ($request->file('education_cert'))
        {
            $certificate = $request->file('education_cert');
        }
        else{
            $certificate = '';
        }
        TeacherEducationalCert::saveCertificate($teacherId , $certificate);
        return redirect()->back()->with('success','add file successfully');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\TeacherEducationalCert  $teacherEducationalCert
     * @return \Illuminate\Http\Response
     */
    public function destroy( $teacherEducationalCertId )
    {
        $this->teacherFile = TeacherEducationalCert::find($teacherEducationalCertId);

        if (file_exists($this->teacherFile->file_path))
        {
            unlink($this->teacherFile->file_path);
        }
        $this->teacherFile->delete();

        return redirect()->back()->with('success','delete file Successfully');

    }
}
