<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class M_Class extends Model
{
    use HasFactory;

    protected $fillable = ['class_name','class_numeric','note','level','status','slug'];

    protected static $clas;
    public static function saveData($request)
    {
        self::$clas = new M_Class();
        self::$clas->class_name     = $request->class_name;
        self::$clas->class_numeric  = $request->class_numeric;
        self::$clas->note           = $request->note;
        self::$clas->level          = $request->level;
        self::$clas->status         = $request->status;
        self::$clas->slug           = str_replace(' ','-',$request->class_name);
        self::$clas->save();

    }

    public static function updateData($request, $id)
    {
        self::$clas = M_Class::where('slug',$id)->first();
        self::$clas->class_name     = $request->class_name;
        self::$clas->class_numeric  = $request->class_numeric;
        self::$clas->note           = $request->note;
        self::$clas->level          = $request->level;
        self::$clas->status         = $request->status;
        self::$clas->slug           = str_replace(' ','-',$request->class_name);
        self::$clas->save();
    }

}
