<?php

namespace App\Models;

use App\Models\Scopes\Searchable;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Support\Str;

class QuranChapter extends Model
{
    use HasFactory;
    use Searchable;

    protected $fillable = [
        'arabic_name',
        'bangla_name',
        'english_name',
        'chapter_serial',
        'total_verse',
        'surah_origin',
        'slug',
        'status',
    ];

    protected $searchableFields = ['*'];
    protected static $chapter;

    protected $table = 'quran_chapters';


    public static function saveData($request)
    {
        self::$chapter = new QuranChapter();
        self::insert($request);
    }
    public static function updateData($request , $slug)
    {
        self::$chapter = QuranChapter:: where('slug',$slug)->first();
        self::insert($request);
    }
    public static function insert($request)
    {
        self::$chapter->arabic_name = $request->arabic_name;
        self::$chapter->bangla_name = $request->bangla_name;
        self::$chapter->english_name = $request->english_name;
        self::$chapter->chapter_serial = $request->chapter_serial;
        self::$chapter->total_verse = $request->total_verse;
        self::$chapter->surah_origin = $request->surah_origin;
        //self::$chapter->slug = str_replace(' ', '-', $request->english_name);
        //self::$chapter->slug = Str::slug($request->english_name ,'_');
        self::$chapter->slug = time().Str::substr($request->english_name,0,2);
        self::$chapter->status = $request->status;

        self::$chapter->save();
    }

    public function quranVerses()
    {
        return $this->hasMany(QuranVerse::class);
    }

    public function quranTranslations()
    {
        return $this->hasMany(QuranTranslation::class);
    }
}
