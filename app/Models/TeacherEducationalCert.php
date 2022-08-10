<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class TeacherEducationalCert extends Model
{
    use HasFactory;

    protected $fillable = ['teacher_id','file_path','file_extension'];

    protected static $teacherCert;
    protected static $cert;
    protected static $extension;
    protected static $fileName;
    protected static $filePath;
    protected static $dir;



    public static function saveCertificate($teacherId, $certificate)
    {
        self::$cert = $certificate;
        foreach (self::$cert as $cer)
        {
            if ($cer)
            {
               self::$extension = $cer->getClientOriginalExtension() ;
               self::$fileName  = rand(10,1000).'.'.self::$extension;
               self::$filePath  = 'admin/file/';
               $cer->move(self::$filePath,self::$fileName);
               self::$dir = self::$filePath . self::$fileName;

                self::$teacherCert = new TeacherEducationalCert();

                self::$teacherCert->teacher_id =$teacherId   ;
                self::$teacherCert->file_path = self::$dir  ;
                self::$teacherCert->file_extension = self::$extension  ;
                self::$teacherCert->save();
            }
        }



    }
}
