<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class M_Section extends Model
{
    use HasFactory;

    protected $fillable = ['section_name','capacity','note','status','slug'];

    protected static $section;

    public static function saveData($request)
    {
        self::$section = new M_Section();

        self::$section->section_name  = $request->section_name;
        self::$section->capacity      = $request->capacity;
        self::$section->note          = $request->note;
        self::$section->status        = $request->status;
        self::$section->slug          = str_replace(' ','-',$request->section_name);
        self::$section->save();
    }
    public static function  updateDate($request, $id)
    {
        self::$section = M_Section::find($id);

        self::$section->section_name  = $request->section_name;
        self::$section->capacity      = $request->capacity;
        self::$section->note          = $request->note;
        self::$section->status        = $request->status;
        self::$section->slug          = str_replace(' ','-',$request->section_name);
        self::$section->save();
    }
}
