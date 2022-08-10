<?php

namespace App\Models;

use Faker\Extension\Helper;
use http\Env\Request;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
class Subject extends Model
{
    use HasFactory;

    protected $fillable = ['class_id','group_id','subject_name','subject_type','is_main_subject','pass_mark','final_mark',
        'level','subject_code','subject_author', 'sub_book_img','is_for_graduation','is_optional','note','slug'];

    protected static $subject;

    public static function saveData($request)
    {
        self::$subject = new Subject();
        self::$subject->class_id          = $request->class_id;
        self::$subject->group_id          = $request->group_id;
        self::$subject->subject_name      = $request->subject_name;
        self::$subject->subject_type      = $request->subject_type;
        self::$subject->is_main_subject   = $request->is_main_subject;
        self::$subject->pass_mark         = $request->pass_mark;
        self::$subject->final_mark        = $request->final_mark;
        self::$subject->level             = $request->level;
        self::$subject->subject_code      = $request->subject_code;
        self::$subject->subject_author    = $request->subject_author;

        self::$subject->sub_book_img      = saveImage($request->file('sub_book_img'),'backend/admin/subject/' ,
                                             'sub_book_img',self::$subject->sub_book_img );

        self::$subject->is_for_graduation = $request->is_for_graduation;
        self::$subject->is_optional       = $request->is_optional;
        self::$subject->note              = $request->note;
        self::$subject->slug              = str_replace(' ','-',$request->subject_name);
        self::$subject->save();
    }

    public static function uppdateData($request , $id)
    {
        self::$subject = Subject::find($id);
        self::$subject->class_id          = $request->class_id;
        self::$subject->group_id          = $request->group_id;
        self::$subject->subject_name      = $request->subject_name;
        self::$subject->subject_type      = $request->subject_type;
        self::$subject->is_main_subject   = $request->is_main_subject;
        self::$subject->pass_mark         = $request->pass_mark;
        self::$subject->final_mark        = $request->final_mark;
        self::$subject->level             = $request->level;
        self::$subject->subject_code      = $request->subject_code;
        self::$subject->subject_author    = $request->subject_author;

        self::$subject->sub_book_img      = saveImage($request->file('sub_book_img'),'backend/admin/subject/' ,
            'sub_book_img',self::$subject->sub_book_img );

        self::$subject->is_for_graduation = $request->is_for_graduation;
        self::$subject->is_optional       = $request->is_optional;
        self::$subject->note              = $request->note;
        self::$subject->save();
    }
    public function class()
    {
        return $this->belongsTo(M_Class::class);
    }
}
