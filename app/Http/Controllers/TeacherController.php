<?php

namespace App\Http\Controllers;

use App\Models\Teacher;
use App\Models\TeacherEducationalCert;
use App\Models\User;
use Illuminate\Http\Request;

class TeacherController extends Controller
{
    protected $teachers;
    protected $teacher;
    protected $teacherFiles;
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $this->teachers = Teacher::OrderBy('id','asc')->get();
        return view('backend.teacher.manage',['teachers' => $this->teachers]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('backend.teacher.form');
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
            'name'          => 'required',
            'email'         => 'required|email|unique:users,email',
            'phone'         => 'required',
            'user_name'     => 'required|unique:users,name',
            'password'      => 'required',
        ]);

            $userId = User::saveTeacher($request);

            $teacherId = Teacher::saveData($request,$userId);

            //return $teacherId;
            $certificate = $request->file('education_cert');
            TeacherEducationalCert::saveCertificate($teacherId , $certificate);
            return redirect(route('teachers.index'))->with('success','teacher create successfully');

//        $edu = $request->file('education_cert');
//
//        foreach ($edu as $ed)
//        {
//            if ($ed){
//              $this->extension = $ed->getClientOriginalExtension() ;
//              $this->fileName = rand(10,1000).'.'.$this->extension;
//              $this->filePath = 'admin/file/';
//             // $ed->move($this->filePath,$this->fileName);
//              $this->dir = $this->filePath .$this->fileName;
//              $this->extension($this->extension);
//              //  echo $this->extension."<br>";
//            }
//
//            echo $this->dir."<br>" ;

        }

       // return $edu[2]->getClientOriginalExtension();
//        foreach ($edu as $key=> $D) {
//           $E= $edu[$key]->getClientOriginalExtension()."<br>";
//           print_r($E) ;
//
//        }







//    public function extension($ex)
//    {
//        echo $ex .' ';
//    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Teacher  $teacher
     * @return \Illuminate\Http\Response
     */
    public function show(Teacher $teacher)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Teacher  $teacher
     * @return \Illuminate\Http\Response
     */
    public function edit( $teacher)
    {
        $this->teacher      = Teacher::where('id',$teacher)->first();
        $this->teacherFiles =TeacherEducationalCert::where('teacher_id',$teacher)->get();
       // return $this->teacherFiles;
        return view('backend.teacher.form',['teacher' => $this->teacher,'teacherCerts' =>$this->teacherFiles]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Teacher  $teacher
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $teacher)
    {
        $teacherId = $teacher;
        if ($request->file('education_cert'))
        {
            $certificate = $request->file('education_cert');
        }
        else{
            $certificate = '';
        }
        $this->teacher = Teacher::where('id',$teacher)->first();

        if ($request->password)
        {
            if (password_verify($request->password,$this->teacher->password))
            {
                $password = $request->new_password;
            }
            else{
                $password = $this->teacher->password;
                return redirect()->back()->with('error','wrong password');
            }

        }
        else{
            $password =$this->teacher->password;
        }
         Teacher::updateData($request,$teacher,$password);
        TeacherEducationalCert::saveCertificate($teacherId,$certificate);

        return redirect(route('teachers.index'))->with('success','Teacher update successfully');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Teacher  $teacher
     * @return \Illuminate\Http\Response
     */
    public function destroy(Teacher $teacher)
    {
        //
    }
}
