<?php

namespace App\Models;

use App\Models\Scopes\Searchable;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class QuranTranslationProvider extends Model
{
    use HasFactory;
    use Searchable;

    protected $fillable = [
        'brand_name',
        'translated_by',
        'language',
        'slug',
        'status',
    ];

    protected $searchableFields = ['*'];

    protected $table = 'quran_translation_providers';

    public function quranTranslations()
    {
        return $this->hasMany(QuranTranslation::class);
    }
}
