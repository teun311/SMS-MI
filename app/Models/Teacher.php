<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Teacher extends Model
{
    use HasFactory;

    protected $fillable = [
        'user_id',
        'name',
        'email',
        'phone',
        'designation',
        'dob',
        'gender',
        'religion',
        'join_date',
        'img',
        'address',
        'subject',
        'high_edu',
        'created_by',
        'user_name',
        'password',
        'slug',
        'status'];
    protected static $teacher;

    public static function saveData($request ,$userId )
    {
        self::$teacher = new Teacher();
        self::$teacher->user_id     = $userId  ;
        self::$teacher->name        = $request->name  ;
        self::$teacher->email       = $request->email  ;
        self::$teacher->phone       = $request->phone  ;
        self::$teacher->designation = $request->designation  ;
        self::$teacher->dob         = $request->dob  ;
        self::$teacher->gender      = $request->gender  ;
        self::$teacher->religion    = $request->religion  ;
        self::$teacher->join_date   = $request->join_date  ;
        self::$teacher->img         = saveImage($request->file('img'),'admin/techer/','img',self::$teacher->img ) ;
        self::$teacher->address     = $request->address  ;
        self::$teacher->subject     = $request->subject  ;
        self::$teacher->high_edu    = $request->high_edu  ;
        self::$teacher->created_by  = $request->created_by  ;
        self::$teacher->user_name   = $request->user_name  ;
        self::$teacher->password    = bcrypt($request->password ) ;
        self::$teacher->slug        = str_replace(' ','-', $request->name ) ;
        self::$teacher->status      = $request->status  ;
        self::$teacher->save();
        return self::$teacher->id;
    }
    public static function updateData($request,$slug,$password)
    {
        self::$teacher = Teacher::where('id',$slug)->first();
        self::$teacher->name        = $request->name  ;
        self::$teacher->email       = $request->email  ;
        self::$teacher->phone       = $request->phone  ;
        self::$teacher->designation = $request->designation  ;
        self::$teacher->dob         = $request->dob  ;
        self::$teacher->gender      = $request->gender  ;
        self::$teacher->religion    = $request->religion  ;
        self::$teacher->join_date   = $request->join_date  ;
        self::$teacher->img         = saveImage($request->file('img'),'admin/techer/','img',self::$teacher->img ) ;
        self::$teacher->address     = $request->address  ;
        self::$teacher->subject     = $request->subject  ;
        self::$teacher->high_edu    = $request->high_edu  ;
        self::$teacher->created_by  = $request->created_by  ;
        self::$teacher->user_name   = $request->user_name  ;
        self::$teacher->password    = $password ;
        self::$teacher->slug        = str_replace(' ','-', $request->name ) ;
        self::$teacher->status      = $request->status  ;
        self::$teacher->save();
    }
}
