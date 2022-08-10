<?php

namespace App\Models;

use App\Models\Scopes\Searchable;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Support\Str;

class QuranVerse extends Model
{
    use HasFactory;
    use Searchable;

    protected $fillable = [
        'quran_chapter_id',
        'verse_arabic',
        'verse_bangla',
        'verse_english',
        'audio',
        'slug',
        'status',
    ];

    protected $searchableFields = ['*'];

    protected $table = 'quran_verses';

    protected static $verse;

    public static function saveData($request)
    {
        self::$verse = new QuranVerse();
        self::insert($request );

    }
    public static function updateData($request , $slug )
    {
        self::$verse = QuranVerse::where('slug',$slug)->first();
        self::insert($request);
    }
    public static function insert($request , $verse = null)
    {
        self::$verse->quran_chapter_id  = $request->quran_chapter_id;
        self::$verse->verse_arabic      = $request->verse_arabic;
        self::$verse->verse_bangla      = $request->verse_bangla;
        self::$verse->verse_english     = $request->verse_english;
        self::$verse->audio             = saveImage($request->file('audio'),'quran/verses/','audio',self::$verse->audio);
        self::$verse->slug              = time().Str::substr($request->verse_english,0,2);
        self::$verse->status            = $request->status;
        self::$verse->save();
    }

    public function quranChapter()
    {
        return $this->belongsTo(QuranChapter::class);
    }

    public function quranTranslations()
    {
        return $this->hasMany(QuranTranslation::class);
    }
}
