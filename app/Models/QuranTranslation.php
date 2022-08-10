<?php

namespace App\Models;

use App\Models\Scopes\Searchable;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class QuranTranslation extends Model
{
    use HasFactory;
    use Searchable;

    protected $fillable = [
        'quran_chapter_id',
        'quran_verse_id',
        'quran_translation_provider_id',
        'translated_verse',
        'slug',
        'status',
    ];

    protected $searchableFields = ['*'];

    protected $table = 'quran_translations';

    public function quranChapter()
    {
        return $this->belongsTo(QuranChapter::class);
    }

    public function quranVerse()
    {
        return $this->belongsTo(QuranVerse::class);
    }

    public function quranTranslationProvider()
    {
        return $this->belongsTo(QuranTranslationProvider::class);
    }
}
